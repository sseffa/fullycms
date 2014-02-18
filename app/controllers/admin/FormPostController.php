<?php namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Validator;
use FormPost;
use Response;
use Notification;

class FormPostController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $formPosts = FormPost::orderBy('created_at', 'DESC')
                            ->paginate(15);
        return View::make('backend.form_post.index', compact('formPosts'))->with('active', 'form-post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $formPost = FormPost::findOrFail($id);
        return View::make('backend.form_post.show', compact('formPost'))->with('active', 'form-post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $formPost = FormPost::findOrFail($id);
        $formPost->delete();
        Notification::success('Post was successfully deleted');
        return Redirect::action('App\Controllers\Admin\FormPostController@index');
    }

    public function confirmDestroy($id) {

        $formPost = FormPost::findOrFail($id);
        return View::make('backend.form_post.confirm-destroy', compact('formPost'))->with('active', 'form-post');
    }

    public function toggleAnswer($id) {

        $formPost = FormPost::findOrFail($id);
        $formPost->is_answered = ($formPost->is_answered) ? false : true;
        $formPost->save();
        return Response::json(array('result' => 'success', 'changed' => ($formPost->is_answered) ? 1 : 0));
    }
}
