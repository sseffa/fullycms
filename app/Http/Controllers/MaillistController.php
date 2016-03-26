<?php

namespace Fully\Http\Controllers;

use Illuminate\Http\Request;

use Flash;
use Validator;
use Redirect;

/**
 * Class MaillistController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class MaillistController extends Controller
{
    /**
     * @return mixed
     */
    public function getMaillist()
    {
        return view('frontend.maillist.maillist');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postMaillist(Request $request)
    {
        $formData = [
            'email' => $request->get('email'),
        ];

        $rules = [
            'email' => 'required|email|unique:maillist,email',
        ];

        $validation = Validator::make($formData, $rules);

        if($validation->fails())
        {
            return Redirect::action('MaillistController@getMaillist')->withErrors($validation)->withInput();
        }

        $maillist = new Maillist();
        $maillist->email = $formData['email'];
        $maillist->save();

        Flash::info('success');

        return Redirect::action('HomeController@index');
    }

    public function sendMail()
    {
        $formData = [];
        $mailer = new Mailer();
        $mailer->send('emails.newsletter', 'noreply@fullycms.com', 'Title', $formData);
    }
}
