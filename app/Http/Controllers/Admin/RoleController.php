<?php

namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Redirect;
use View;
use Illuminate\Support\Str;
use Input;
use Flash;
use Validator;
use Fully\Models\Role;

/**
 * Class RoleController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::orderBy('created_at', 'DESC')->paginate(10);

        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $permissions = array();

        foreach (Input::get('permissions') as $k => $v) {
            $permissions[$k] = ($v == '1') ? true : false;
        }

        $formData = array(
            'slug' => Str::slug(Input::get('name')),
            'name' => Input::get('name'),
            'permissions' => $permissions,
        );

        $rules = array(
            'name' => 'required|min:3',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('Admin\RolesController@create')->withErrors($validation)->withInput();
        }

        Role::create($formData);
        Flash::message('Role was successfully added');

        return Redirect::action('App\Controllers\Admin\RoleController@index');
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
        $role = Role::find($id);

        return view('backend.role.show', compact('role'));
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
        $role = Role::find($id);

        return view('backend.role.edit', compact('role'));
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
        $permissions = array();

        foreach (Input::get('permissions') as $k => $v) {
            $permissions[$k] = ($v == '1') ? true : false;
        }

        $formData = array(
            'slug' => Str::slug(Input::get('name')),
            'name' => Input::get('name'),
            'permissions' => $permissions,
        );

        $role = Role::find($id);
        $role->slug = $formData['slug'];
        $role->name = $formData['name'];
        $role->permissions = $permissions;

        $role->save();

        Flash::message('Role was successfully updated');

        return Redirect::action('App\Controllers\Admin\RoleController@index');
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
        $role = Role::find($id);
        $role->delete();

        Flash::message('Role was successfully deleted');

        return Redirect::action('App\Controllers\Admin\RoleController@index');
    }

    /**
     * @param $id
     *
     * @return View
     */
    public function confirmDestroy($id)
    {
        $role = Role::find($id);

        return view('backend.role.confirm-destroy', compact('role'));
    }
}
