<?php

namespace Fully\Http\Controllers;

use Illuminate\Http\Request;

use Fully\Services\Mailer;
use Fully\Models\FormPost;
use Validator;
use Redirect;

/**
 * Class FormPostController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class FormPostController extends Controller
{
    protected $formPost;

    public function __construct(FormPost $formPost)
    {
        $this->formPost = $formPost;
    }

    public function getContact()
    {
        return view('frontend.contact.form');
    }

    public function postContact(Request $request)
    {
        $formData = [
            'sender_name_surname' => $request->get('sender_name_surname'),
            'sender_email'        => $request->get('sender_email'),
            'sender_phone_number' => $request->get('sender_phone_number'),
            'subject'             => $request->get('subject'),
            'post'                => $request->get('message'),
        ];

        $rules = [
            'sender_name_surname' => 'required',
            'sender_email'        => 'required|email',
            'sender_phone_number' => 'required',
            'subject'             => 'required',
            'post'                => 'required',
        ];

        $validation = Validator::make($formData, $rules);

        if($validation->fails())
        {
            return Redirect::action('FormPostController@getContact')->withErrors($validation)->withInput();
        }

        /*
        Mail::send('emails.contact-form.form', $formData, function ($message) {
            $message->from($request->get('sender_email'), $request->get('sender_name_surname'));
            $message->to('noreply@fullycms.com', 'Lorem Lipsum')->subject($request->get('subject'));
        });
        */

        /*
        $mailer = new Mailer;
        $mailer->send('emails.contact-form.form', 'admin@fullycms.com', $request->get('subject'), $formData);
        */

        $formPost = new FormPost();
        $formPost->sender_name_surname = $formData['sender_name_surname'];
        $formPost->sender_email = $formData['sender_email'];
        $formPost->sender_phone_number = $formData['sender_phone_number'];
        $formPost->subject = $formData['subject'];
        $formPost->message = $formData['post'];
        $formPost->lang = getLang();

        $formPost->save();

        return Redirect::action('FormPostController@getContact')->with('message', 'Success');
    }
}
