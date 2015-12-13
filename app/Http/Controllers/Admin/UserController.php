<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Redirect;
use Sentry;
use View;
use Input;
use Flash;
use Validator;
use Fully\Models\User;
use Fully\Models\Group;

/**
 * Class UserController
 * @package App\Controllers\Admin
 * @author Sefa Karagöz
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $users = User::orderBy('created_at', 'DESC')->paginate(10);

        return view('backend.user.index', compact('users'))->with('active', 'user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $groups = Group::lists('name', 'id');

        return view('backend.user.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $formData = array(
            'first-name'       => Input::get('first_name'),
            'last-name'        => Input::get('last_name'),
            'email'            => Input::get('email'),
            'password'         => Input::get('password'),
            'confirm-password' => Input::get('confirm_password'),
            'groups'           => Input::get('groups')
        );

        $rules = array(
            'first-name'       => 'required|min:3',
            'last-name'        => 'required|min:3',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:4',
            'confirm-password' => 'required|same:password'
        );

        $validation = Validator::make($formData, $rules);

        if($validation->fails())
        {

            return Redirect::action('\Fully\Http\Controllers\Admin\UserController@create')->withErrors($validation)->withInput();
        }

        $user = Sentry::createUser(array(
            'email'      => $formData['email'],
            'password'   => $formData['password'],
            'first_name' => $formData['first-name'],
            'last_name'  => $formData['last-name'],
            'activated'  => 1,
        ));

        if(isset($formData['groups']))
        {

            foreach($formData['groups'] as $group => $id)
            {

                // Find the group using the group id
                $adminGroup = Sentry::findGroupById($id);

                $user->addGroup($adminGroup);
            }
        }
        Flash::message('User was successfully added');

        return Redirect::action('App\Controllers\Admin\UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

        $user = Sentry::findUserById($id);
        return view('backend.user.show', compact('user'))->with('active', 'user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $user = Sentry::findUserById($id);

        $userGroups = $user->getGroups()->lists('name', 'id');

        $groups = Group::lists('name', 'id');
        return view('backend.user.edit', compact('user', 'groups', 'userGroups'))->with('active', 'user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $formData = array(
            'first-name' => Input::get('first_name'),
            'last-name'  => Input::get('last_name'),
            'email'      => Input::get('email'),
            'groups'     => Input::get('groups')
        );

        try
        {
            $user = Sentry::findUserById($id);
            $user->email = $formData['email'];
            $user->first_name = $formData['first-name'];
            $user->last_name = $formData['last-name'];
            $user->save();

            if(!isset($formData['groups']))
            {
            }

            foreach((object)$formData['groups'] as $group => $id)
            {

                // Find the group using the group id
                $adminGroup = Sentry::findGroupById($id);

                // Assign the group to the user
                if($user->addGroup($adminGroup))
                {
                    // Group assigned successfully
                }
                else
                {
                    // Group was not assigned
                }
            }
        } catch(Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        } catch(Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }

        Flash::message('User was successfully updated');

        return langRedirectRoute('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        $user = Sentry::findUserById($id);
        $user->delete();

        Flash::message('User was successfully deleted');
        return langRedirectRoute('admin.user.index');
    }

    public function confirmDestroy($id)
    {

        $user = User::find($id);
        return view('backend.user.confirm-destroy', compact('user'))->with('active', 'user');
    }
}
