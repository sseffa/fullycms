<?php namespace Fully\Http\Controllers;

use Input;
use Validator;
use Redirect;

/**
 * Class MaillistController
 * @author Sefa Karagöz
 */
class MaillistController extends Controller {

    /**
     * @return mixed
     */
    public function getMaillist() {

        return view('frontend.maillist.maillist');
    }

    /**
     * @return mixed
     */
    public function postMaillist() {

        $formData = array(
            'email' => Input::get('email'),
        );

        $rules = array(
            'email' => 'required|email|unique:maillist,email',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('MaillistController@getMaillist')->withErrors($validation)->withInput();
        }

        $maillist = new Maillist();
        $maillist->email = $formData['email'];
        $maillist->save();

        //Notification::success('success');

        return Redirect::action('HomeController@index');
    }

    /**
     *
     */
    public function sendMail() {

        $formData=array();
        $mailer = new Mailer;
        $mailer->send('emails.newsletter', 'noreply@fullycms.com', 'Title', $formData);
    }
}
