<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Redirect;
use Sentry;
use View;
use Input;
use Validator;
use Fully\Models\Group;


/**
 * Class GroupController
 * @package App\Controllers\Admin
 * @author Sefa Karagöz
 */
class GroupController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $groups = Group::orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('backend.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return view('backend.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = array(
            'name'        => Input::get('name'),
            'permissions' => Input::get('permissions')
        );

        $rules = array(
            'name' => 'required|min:3'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {

            return Redirect::action('App\Controllers\Admin\GroupController@create')->withErrors($validation)->withInput();
        }

        try {
            // Create the group
            $group = Sentry::createGroup($formData);
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            echo 'Group already exists';
        }

        Notification::success('Group was successfully added');

        return Redirect::action('App\Controllers\Admin\GroupController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $group = Sentry::findGroupById($id);
        return view('backend.group.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $group = Sentry::findGroupById($id);
        return view('backend.group.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        $formData = array(
            'name'        => Input::get('name'),
            'permissions' => Input::get('permissions')
        );

        try {
            // Find the group using the group id
            $group = Sentry::findGroupById($id);

            // Update the group details
            $group->name = $formData['name'];
            $group->permissions = $formData['permissions'];

            // Update the group
            if ($group->save()) {
                // Group information was updated
            } else {
                // Group information was not updated
            }
        } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
            echo 'Name field is required';
        } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
            //echo 'Group already exists.';
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            echo 'Group was not found.';
        }

        Notification::success('Group was successfully updated');

        return Redirect::action('App\Controllers\Admin\GroupController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $group = Sentry::findGroupById($id);
        $group->delete();

        Notification::success('Group was successfully deleted');
        return Redirect::action('App\Controllers\Admin\GroupController@index');
    }

    /**
     * @param $id
     */
    public function confirmDestroy($id) {

        $group = Sentry::findGroupById($id);
        return view('backend.group.confirm-destroy', compact('group'));
    }
}
