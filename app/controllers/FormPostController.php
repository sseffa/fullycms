<?php

class FormPostController extends BaseController {

    protected $formPost;

    public function __construct(FormPost $formPost) {

        $this->formPost = $formPost;
    }

    public function getContact() {

        return View::make('frontend.contact.form');
    }

    public function postContact() {

        $rules = array(
            'sender_name_surname' => 'required',
            'sender_email'        => 'required|email',
            'sender_phone_number' => 'required',
            'subject'             => 'required',
            'message'             => 'required'
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->fails()) {
            return Redirect::action('FormPostController@getContact')->withErrors($validation)->withInput();
        }

        /*
        Mail::send('emails.contact-form.form', $formData, function ($message) {

            $message->from(Input::get('sender_email'), Input::get('sender_name_surname'));
            $message->to('karagozsefa@gmail.com', 'Sefa Karagöz')->subject(Input::get('subject'));
        });
        */

        $this->formPost->fill(Input::all());
        $this->formPost->created_ip = Request::getClientIp();
        $this->formPost->save();

        return Redirect::action('FormPostController@getContact')->with('notification', 'Success');
    }
}
