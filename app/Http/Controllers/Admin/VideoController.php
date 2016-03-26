<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Flash;
use Input;
use Config;
use Response;
use VideoApi;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\Video\VideoInterface;
use Fully\Exceptions\Validation\ValidationException;
use Fully\Repositories\Video\VideoRepository as Video;

/**
 * Class VideoController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class VideoController extends Controller
{
    protected $video;
    protected $perPage;

    public function __construct(VideoInterface $video)
    {
        $this->video = $video;
        $this->perPage = config('fully.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->video->paginate(Input::get('page', 1), $this->perPage, true);
        $videos = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try
        {
            $this->video->create(Input::all());
            Flash::message('Video was successfully added');

            return langRedirectRoute('admin.video.index');
        } catch(ValidationException $e)
        {
            return langRedirectRoute('admin.video.create')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->video->find($id);

        return view('backend.video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->video->find($id);

        return view('backend.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        try
        {
            $this->video->update($id, Input::all());
            Flash::message('Video was successfully updated');

            return langRedirectRoute('admin.video.index');
        } catch(ValidationException $e)
        {
            return langRedirectRoute('admin.video.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->video->delete($id);
        Flash::message('Video was successfully deleted');

        return langRedirectRoute('admin.video.index');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id)
    {
        $video = $this->video->find($id);

        return view('backend.video.confirm-destroy', compact('video'));
    }

    public function getVideoDetail()
    {
        $videoId = Input::get('video_id');
        $type = Input::get('type');

        if($type == 'youtube')
        {
            $response = VideoApi::setType($type)->setKey(Config::get('fully.youtube_api_key'))->getVideoDetail($videoId);
        }
        else
        {
            $response = VideoApi::setType($type)->getVideoDetail($videoId);
        }

        return Response::json($response);
    }
}
