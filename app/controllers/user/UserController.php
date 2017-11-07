<?php
class UserController extends BaseController {

    protected $user;

    public function __construct(User $user)
    {
        parent::__construct ();
        $this->user = $user;
    }

    public function getIndex()
    {
        list ( $user, $redirect ) = $this->user->checkAuthAndRedirect ( 'user' );
        if ($redirect)
        {
            return $redirect;
        }
        return View::make ( 'site/user/index', compact ( 'user' ) );
    }

    public function getLogin() {
        $user = Auth::user ();
        if (! empty ( $user->id ))
        {
            return Redirect::to ( '/' );
        }
        return View::make ( 'site/user/login' );
    }

    public function postLogin() {
        $input = array (
                'email' => Input::get ( 'email' ),
                'username' => Input::get ( 'email' ),
                'password' => Input::get ( 'password' ),
                'remember' => Input::get ( 'remember' )
        );
        
        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Check that the user is confirmed.
        if (Confide::logAttempt ( $input, true )) {
            return Redirect::intended ( '/' );
        } else {
            // Check if there was too many login attempts
            if (Confide::isThrottled ( $input )) {
                $err_msg = Lang::get ( 'confide::confide.alerts.too_many_attempts' );
            } elseif ($this->user->checkUserExists ( $input ) && ! $this->user->isConfirmed ( $input )) {
                $err_msg = Lang::get ( 'confide::confide.alerts.not_confirmed' );
            } else {
                $err_msg = Lang::get ( 'confide::confide.alerts.wrong_credentials' );
            }

            return Redirect::to ( 'user/login' )->withInput ( Input::except ( 'password' ) )->with ( 'error', $err_msg );
        }
    }

    public function getLogout()
    {
        Confide::logout ();
        return Redirect::to ( '/' );
    }

    public function processRedirect($url1, $url2, $url3) {
        $redirect = '';
        if (! empty ( $url1 ))
        {
            $redirect = $url1;
            $redirect .= (empty ( $url2 ) ? '' : '/' . $url2);
            $redirect .= (empty ( $url3 ) ? '' : '/' . $url3);
        }
        return $redirect;
    }
}
