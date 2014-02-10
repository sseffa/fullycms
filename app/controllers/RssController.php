<?php

class RssController extends BaseController {

    public function index() {

        $items = \News::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $data = array();
        foreach ($items as $k => $v) {
            $data[] = array('title' => $v->title, 'description' => $v->content, 'link' => url($v->url));
        }

        $feed = Feeder::feed($data);
        return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
    }
}
