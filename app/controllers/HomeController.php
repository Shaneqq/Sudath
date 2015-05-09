<?php

class HomeController extends BaseController {

   

    public function lawyerSignIn() {
        if(Auth::user()){
             return Redirect::route('lawyer-home');
        }else{
        return View::make('login');
        }
    }
    
    public function adminSignIn(){
          return View::make('login');
    }

    public function lawyerHome() {
        $user = Auth::user();
        if ($user) {
            $headers = array();
            $headers['Expires'] = 'Tue, 1 Jan 1980 00:00:00 GMT';
            $headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
            $headers['Pragma'] = 'no-cache';
            return Response::make(View::make('main.lawyer'), 200, $headers);
            // return View::make('main.lawyer');
        }else{
            return Redirect::route('home');
        }
    }

    public function postSignIn() {
        $auth = Auth::attempt(array(
                    'email' => Input::get('username'),
                    'password' => Input::get('password')
        ));

        if ($auth) {

            return Redirect::route('lawyer-home');

            // echo"passed";
        } else {
            return Redirect::route('home')
                            ->with('incorrectpassword', true);
        }
    }

    public function getSignOut() {
        //   $user = Auth::user();
        Auth::logout();
        // Cache::flushAll();
        //Session::flush();
        return Redirect::route('home');
    }

}
