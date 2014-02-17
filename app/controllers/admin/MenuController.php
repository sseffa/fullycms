<?php namespace App\Controllers\Admin;

use BaseController;
use View;
use Validator;
use Redirect;
use Input;
use Menu;
use URL;
use Route;
use Request;
use Exception;
use Response;
use Notification;

class MenuController extends BaseController {

    protected $menu;

    public function __construct(Menu $menu) {

        $this->menu = $menu;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $items = $this->menu->orderBy('order', 'asc')->get();
        $menus = $this->menu->getMenuHTML($items);
        return View::make('backend.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $options = $this->menu->getMenuOptions();
        return View::make('backend.menu.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = Input::all();

        if ($formData['type'] == 'module') {

            $option = $formData['option'];
            $url = $this->menu->getUrl($option);
            $formData['url'] = $url;
        }

        $host = $_SERVER['SERVER_NAME'];
        $urlInfo = parse_url($formData['url']);

        $rules = array(
            'title' => 'required',
            'url'   => 'required'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::route('admin.menu.create')->withErrors($validation)->withInput();
        }

        $this->menu->fill($formData);
        $this->menu->order = $this->menu->getMaxOrder() + 1;

        if (isset($urlInfo['host']))
            $url = ($host == $urlInfo['host']) ? $urlInfo['path'] : $formData['url'];
        else
            $url = ($formData['type'] == 'module') ? $formData['url'] : "http://" . $formData['url'];

        $this->menu->url = $url;
        $this->menu->save();

        Notification::success('Menu was successfully added');
        return Redirect::route('admin.menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        return View::make('menu.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $options = $this->menu->getMenuOptions();
        $menu = $this->menu->find($id);
        return View::make('backend.menu.edit', compact('menu', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

      $formData = Input::all();

        if ($formData['type'] == 'module') {

            $option = $formData['option'];
            $url = $this->menu->getUrl($option);
            $formData['url'] = $url;
        }

        $host = $_SERVER['SERVER_NAME'];
        $urlInfo = parse_url($formData['url']);

        $rules = array(
            'title' => 'required',
            'url'   => 'required'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::route('admin.menu.create')->withErrors($validation)->withInput();
        }

        $this->menu=$this->menu->find($id);
        $this->menu->fill($formData);

        if (isset($urlInfo['host']))
            $url = ($host == $urlInfo['host']) ? $urlInfo['path'] : $formData['url'];
        else
            $url = ($formData['type'] == 'module') ? $formData['url'] : "http://" . $formData['url'];

        $this->menu->url = $url;
        $this->menu->save();

        Notification::success('Menu was successfully updated');
        return Redirect::route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        if ($this->menu->hasChildItems($id)) {

            //throw new Exception("This menu has sub-menus. Can't delete!");
            Notification::info("There are sub menus of this menu. Can't be deleted!");
            return Redirect::action('App\Controllers\Admin\MenuController@index');
        }

        $this->menu = $this->menu->find($id);
        $this->menu->delete();
        Notification::success('Menu was successfully deleted');
        return Redirect::action('App\Controllers\Admin\MenuController@index');
    }

    public function confirmDestroy($id) {

        $menu = $this->menu->find($id);
        return View::make('backend.menu.confirm-destroy', compact('menu'));
    }

    public function save() {

        $this->menu->changeParentById($this->menu->parseJsonArray(json_decode(Input::get('json'), true)));
        return Response::json(array('result' => 'success'));
    }

    public function togglePublish($id) {

        $this->menu = $this->menu->find($id);
        $this->menu->is_published = ($this->menu->is_published) ? false : true;
        $this->menu->save();
        return Response::json(array('result' => 'success', 'changed' => ($this->menu->is_published) ? 1 : 0));
    }
}
