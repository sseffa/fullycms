<?php

namespace Fully\Repositories\Project;

use Config;
use Fully\Models\Project;
use Image;
use File;
use Fully\Repositories\RepositoryAbstract;
use Fully\Repositories\CrudableInterface;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class ProjectRepository.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class ProjectRepository extends RepositoryAbstract implements ProjectInterface, CrudableInterface
{
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
    protected $thumbWidth;

    /**
     * @var
     */
    protected $thumbHeight;

    /**
     * @var
     */
    protected $imgDir;

    /**
     * @var
     */
    protected $perPage;

    /**
     * @var \Project
     */
    protected $project;

    /**
     * Rules.
     *
     * @var array
     */
    protected static $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    public function __construct(Project $project)
    {
        $config = Config::get('fully');
        $this->perPage = $config['per_page'];
        $this->width = $config['modules']['project']['image_size']['width'];
        $this->height = $config['modules']['project']['image_size']['height'];
        $this->thumbWidth = $config['modules']['project']['thumb_size']['width'];
        $this->thumbHeight = $config['modules']['project']['thumb_size']['height'];
        $this->imgDir = $config['modules']['project']['image_dir'];
        $this->project = $project;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->project->where('lang', $this->getLang())->get();
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->project->where('slug', $slug)->first();
    }

    /**
     * Get paginated projects.
     *
     * @param int  $page  Number of projects per page
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

        $query = $this->project->orderBy('created_at', 'DESC')->where('lang', $this->getLang());

        $projects = $query->skip($limit * ($page - 1))
            ->take($limit)
            ->get();

        $result->totalItems = $this->totalProjects();
        $result->items = $projects->all();

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->project->findOrFail($id);
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

                    // thumb
                    Image::make($destinationPath.$fileName)
                        ->resize($this->thumbWidth, $this->thumbHeight)
                        ->save($destinationPath.'thumb_'.$fileName);

                    $this->project->file_name = $fileName;
                    $this->project->file_size = $fileSize;
                    $this->project->path = $this->imgDir;
                }
            }

            //--------------------------------------------------------
            $this->project->lang = $this->getLang();
            $this->project->fill($attributes)->save();
            $this->project->resluggify();

            return true;
        }

        throw new ValidationException('Project validation failed', $this->getErrors());
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
        $this->project = $this->find($id);

        if ($this->isValid($attributes)) {
            $file = null;

            if (isset($attributes['image'])) {
                $file = $attributes['image'];
            }

            //-------------------------------------------------------
            if ($file) {

                // delete old image
                $destinationPath = public_path().$this->imgDir;
                File::delete($destinationPath.$this->project->file_name);

                $destinationPath = public_path().$this->imgDir;
                $fileName = $file->getClientOriginalName();
                $fileSize = $file->getClientSize();

                $upload_success = $file->move($destinationPath, $fileName);

                if ($upload_success) {

                    // resizing an uploaded file
                    Image::make($destinationPath.$fileName)
                        ->resize($this->width, $this->height)
                        ->save($destinationPath.$fileName);

                    // thumb
                    Image::make($destinationPath.$fileName)
                        ->resize($this->thumbWidth, $this->thumbHeight)
                        ->save($destinationPath.'thumb_'.$fileName);

                    $this->project->file_name = $fileName;
                    $this->project->file_size = $fileSize;
                    $this->project->path = $this->imgDir;
                }
            }
            //-------------------------------------------------------

            $this->project->resluggify();
            $this->project->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Project validation failed', $this->getErrors());
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->project = $this->project->find($id);
        $this->project->delete();
    }

    /**
     * Get total project count.
     *
     * @return mixed
     */
    protected function totalProjects()
    {
        return $this->project->where('lang', $this->getLang())->count();
    }
}
