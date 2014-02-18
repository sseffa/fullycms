<?php namespace Sefa\Repositories\PhotoGallery;

use PhotoGallery;
use File;
use Config;
use Photo;
use Image;
use Response;
use Sefa\Repositories\BaseRepositoryInterface as BaseRepositoryInterface;
use Sefa\Exceptions\Validation\ValidationException;
use Sefa\Repositories\AbstractValidator as Validator;

class PhotoGalleryRepository extends Validator implements BaseRepositoryInterface {

    protected $width;
    protected $height;
    protected $imgDir;
    protected $perPage;
    protected $photoGallery;

    /**
     * Rules
     *
     * @var array
     */
    protected static $rules = [
        'title' => 'required|min:3|unique:categories'
    ];

    /**
     * Image rules
     * @var array
     */
    protected static $photoRules = [
        'file' => 'mimes:jpg,jpeg,png|max:10000'
    ];

    public function __construct(PhotoGallery $photoGallery) {

        $config = Config::get('sfcms');
        $this->perPage = $config['modules']['per_page'];
        $this->width = $config['modules']['photo_gallery']['thumb_size']['width'];
        $this->height = $config['modules']['photo_gallery']['thumb_size']['height'];
        $this->imgDir = $config['modules']['photo_gallery']['image_dir'];
        $this->photoGallery = $photoGallery;
    }

    public function all() {

        return $this->photoGallery->get();
    }

    public function lists() {

        return $this->photoGallery->get()->lists('title', 'id');
    }

    public function paginate($perPage = null) {

        return $this->photoGallery->paginate(($perPage) ? $perPage : $this->perPage);
    }

    public function find($id) {

        return $this->photoGallery->with('photos')->findOrFail($id);
    }

    public function create($attributes) {

        if ($this->isValid($attributes)) {

            $this->photoGallery->fill($attributes)->save();
            return $this->photoGallery->id;
        }

        throw new ValidationException('Photo Gallery validation failed', $this->getErrors());
    }

    public function update($id, $attributes) {

        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        $this->photoGallery = $this->find($id);

        if ($this->isValid($attributes)) {

            $this->photoGallery->fill($attributes)->save();
            return true;
        }

        throw new ValidationException('Photo Gallery validation failed', $this->getErrors());
    }

    public function destroy($id) {

        $photo_gallery = $this->photoGallery->find($id);

        foreach ($photo_gallery->photos as $photo) {

            $destinationPath = public_path() . $this->imgDir;
            File::delete($destinationPath . $photo->file_name);
            File::delete($destinationPath . "thumb_" . $photo->file_name);
            $photo->delete();
        }

        $photo_gallery->delete();
    }

    public function togglePublish($id) {

        $photo_gallery = $this->photoGallery->findOrFail($id);

        $photo_gallery->is_published = ($photo_gallery->is_published) ? false : true;
        $photo_gallery->save();

        return Response::json(array('result' => 'success', 'changed' => ($photo_gallery->is_published) ? 1 : 0));
    }

    public function upload($id, $attributes) {

        if ($this->isValid($attributes, self::$photoRules)) {

            $file = $attributes['file'];

            $destinationPath = public_path() . $this->imgDir;
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getClientSize();

            $upload_success = $file->move($destinationPath, $fileName);

            if ($upload_success) {

                // resizing an uploaded file
                Image::make($destinationPath . $fileName)
                    ->resize($this->width, $this->height)
                    ->save($destinationPath . "thumb_" . $fileName);

                $photo_gallery = $this->photoGallery->find($id);
                $image = new Photo;
                $image->file_name = $fileName;
                $image->file_size = $fileSize;
                $image->title = explode(".", $fileName)[0];
                $image->path = $this->imgDir . $fileName;
                $image->type = "gallery";
                $photo_gallery->photos()->save($image);
                return true;
            }
        }
        throw new ValidationException('Upload photo validation failed', $this->getErrors());
    }

    public function deletePhoto($fileName) {

        Photo::where('file_name', '=', $fileName)->delete();
        $destinationPath = public_path() . $this->imgDir;
        File::delete($destinationPath . $fileName);
        File::delete($destinationPath . "thumb_" . $fileName);
        return Response::json('success', 200);
    }
}
