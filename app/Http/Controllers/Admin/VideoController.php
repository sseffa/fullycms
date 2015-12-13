<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Fully\Repositories\Video\VideoInterface;
use Redirect;
use VideoApi;
use View;
use Input;
use Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Fully\Repositories\Video\VideoRepository as Video;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class VideoController
 * @package App\Controllers\Admin
 * @author Sefa Karagöz
 */
class VideoController extends Controller {

    protected $video;

    public function __construct(VideoInterface $video) {

        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        //$videos = $this->video->paginate();

        $page = Input::get('page', 1);
        $perPage = 10;
        $pagiData = $this->video->paginate($page, $perPage, true, true);

        $videos = new LengthAwarePaginator($pagiData->items, $pagiData->totalItems, $perPage, [
            'path' => Paginator::resolveCurrentPath()
        ]);

        $videos->setPath("");

        return view('backend.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        try {
            $this->video->create(Input::all());
            //Notification::success('Video was successfully added');
            return langRedirectRoute('admin.video.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.video.create')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id) {

        $video = $this->video->find($id);
        return view('backend.video.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id) {

        $video = $this->video->find($id);
        return view('backend.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id) {

        try {
            $this->video->update($id, Input::all());
            //Notification::success('Video was successfully updated');
            return langRedirectRoute('admin.video.index');
        } catch (ValidationException $e) {

            return langRedirectRoute('admin.video.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) {

        $this->video->delete($id);
        //Notification::success('Video was successfully deleted');
        return langRedirectRoute('admin.video.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function confirmDestroy($id) {

        $video = $this->video->find($id);
        return view('backend.video.confirm-destroy', compact('video'));
    }

    public function getVideoDetail() {

        $videoId = Input::get("video_id");
        $type = Input::get("type");

        $response = VideoApi::setType($type)->getVideoDetail($videoId);
        return Response::json($response);
    }
}
