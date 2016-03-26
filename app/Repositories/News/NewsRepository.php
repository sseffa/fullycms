<?php

namespace Fully\Repositories\News;

use Config;
use Fully\Models\News;
use Response;
use Image;
use File;
use Fully\Repositories\RepositoryAbstract;
use Fully\Repositories\CrudableInterface;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class NewsRepository.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class NewsRepository extends RepositoryAbstract implements NewsInterface, CrudableInterface
{
    /**
     * @var
     */
    protected $perPage;

    /**
     * @var \News
     */
    protected $news;

    /**
     * @var
     */
    protected $width;

    /**
     * @var
     */
    protected $height;

    /**
     * @var
     */
    protected $imgDir;

    /**
     * Rules.
     *
     * @var array
     */
    protected static $rules = [
        'title' => 'required',
        'content' => 'required',
        'datetime' => 'required|date',
    ];

    public function __construct(News $news)
    {
        $config = Config::get('fully');
        $this->perPage = $config['per_page'];
        $this->width = $config['modules']['news']['image_size']['width'];
        $this->height = $config['modules']['news']['image_size']['height'];
        $this->imgDir = $config['modules']['news']['image_dir'];
        $this->news = $news;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->news->orderBy('created_at', 'DESC')
            ->where('is_published', 1)->where('lang', $this->getLang())
            ->get();
    }

    /**
     * @return mixed
     */
    public function lists()
    {
        return $this->news->get()->where('lang', $this->getLang())->lists('title', 'id');
    }

    /*
    public function paginate($perPage = null, $all = false) {

        if ($all)
            return $this->news->orderBy('created_at', 'DESC')
                ->paginate(($perPage) ? $perPage : $this->perPage);

        return $this->news->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate(($perPage) ? $perPage : $this->perPage);
    }
    */

    /**
     * Get paginated news.
     *
     * @param int  $page  Number of news per page
     * @param int  $limit Results per page
     * @param bool $all   Show published or all
     *
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        $result = new \StdClass();
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $query = $this->news->orderBy('created_at', 'DESC')->where('lang', $this->getLang());

        if (!$all) {
            $query->where('is_published', 1);
        }

        $news = $query->skip($limit * ($page - 1))
            ->take($limit)
            ->get();

        $result->totalItems = $this->totalNews($all);
        $result->items = $news->all();

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->news->findOrFail($id);
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->news->where('slug', $slug)->first();
    }

    /**
     * @param $attributes
     *
     * @return bool|mixed
     *
     * @throws \Fully\Exceptions\Validation\ValidationException
     */
    public function create($attributes)
    {
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        if ($this->isValid($attributes)) {

            //--------------------------------------------------------

            $file = null;

            if (isset($attributes['image'])) {
                $file = $attributes['image'];
            }

            if ($file) {
                $destinationPath = public_path().$this->imgDir;
                $fileName = $file->getClientOriginalName();
                $fileSize = $file->getClientSize();

                $upload_success = $file->move($destinationPath, $fileName);

                if ($upload_success) {

                    // resizing an uploaded file
                    Image::make($destinationPath.$fileName)
                        ->resize($this->width, $this->height)
                        ->save($destinationPath.$fileName);

                    $this->news->file_name = $fileName;
                    $this->news->file_size = $fileSize;
                    $this->news->path = $this->imgDir.$fileName;
                }
            }

            //--------------------------------------------------------

            $this->news->lang = $this->getLang();
            $this->news->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('News validation failed', $this->getErrors());
    }

    /**
     * @param $id
     * @param $attributes
     *
     * @return bool|mixed
     *
     * @throws \Fully\Exceptions\Validation\ValidationException
     */
    public function update($id, $attributes)
    {
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        $this->news = $this->find($id);

        if ($this->isValid($attributes)) {

            //-------------------------------------------------------
            if (isset($attributes['image'])) {
                $file = $attributes['image'];

                // delete old image
                $destinationPath = public_path().$this->imgDir;
                File::delete($destinationPath.$this->news->file_name);

                $destinationPath = public_path().$this->imgDir;
                $fileName = $file->getClientOriginalName();
                $fileSize = $file->getClientSize();

                $upload_success = $file->move($destinationPath, $fileName);

                if ($upload_success) {

                    // resizing an uploaded file
                    Image::make($destinationPath.$fileName)
                        ->resize($this->width, $this->height)
                        ->save($destinationPath.$fileName);

                    $this->news->file_name = $fileName;
                    $this->news->file_size = $fileSize;
                    $this->news->path = $this->imgDir.$fileName;
                }
            }
            //-------------------------------------------------------

            $this->news->resluggify();
            $this->news->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('News validation failed', $this->getErrors());
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->news->find($id)->delete();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function togglePublish($id)
    {
        $news = $this->news->find($id);
        $news->is_published = ($news->is_published) ? false : true;
        $news->save();

        return Response::json(array('result' => 'success', 'changed' => ($news->is_published) ? 1 : 0));
    }

    /**
     * Get total news count.
     *
     * @param bool $all
     *
     * @return mixed
     */
    protected function totalNews($all = false)
    {
        if (!$all) {
            return $this->news->where('is_published', 1)->where('lang', $this->getLang())->count();
        }

        return $this->news->where('lang', $this->getLang())->count();
    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getLastNews($limit)
    {
        return $this->news->orderBy('created_at', 'desc')->where('lang', $this->getLang())->take($limit)->offset(0)->get();
    }
}
