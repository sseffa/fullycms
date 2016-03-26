<?php

namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use View;
use Fully\Models\FormPost;
use Response;

/**
 * Class FormPostController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class FormPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $formPosts = FormPost::orderBy('created_at', 'DESC')->where('lang', getLang())->paginate(15);

        return view('backend.form_post.index', compact('formPosts'))->with('active', 'form-post');
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
        $formPost = FormPost::findOrFail($id);

        return view('backend.form_post.show', compact('formPost'))->with('active', 'form-post');
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
        $formPost = FormPost::findOrFail($id);
        $formPost->delete();
        Flash::message('Post was successfully deleted');

        return langRedirectRoute('admin.form-post.index');
    }

    public function confirmDestroy($id)
    {
        $formPost = FormPost::findOrFail($id);

        return view('backend.form_post.confirm-destroy', compact('formPost'))->with('active', 'form-post');
    }

    public function toggleAnswer($id)
    {
        $formPost = FormPost::findOrFail($id);
        $formPost->is_answered = ($formPost->is_answered) ? false : true;
        $formPost->save();

        return Response::json(array('result' => 'success', 'changed' => ($formPost->is_answered) ? 1 : 0));
    }
}
