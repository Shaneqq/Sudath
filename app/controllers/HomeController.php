<?php

class HomeController extends BaseController {

   

    public function lawyerSignIn() {
        if(Auth::user()->check()){
             return Redirect::route('lawyer-home');
        }else{
        return View::make('login');
        }
    }
    
    public function adminSignIn(){
            if(Auth::account()->check()){
             return Redirect::route('admin-home');
        }else{
        return View::make('adminlogin');
        }
    }

    public function lawyerHome() {
        $user = Auth::user()->check();
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
    
    public function adminHome() {
        $user = Auth::account()->check();
        if ($user) {
           
            $headers = array();
            $headers['Expires'] = 'Tue, 1 Jan 1980 00:00:00 GMT';
            $headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
            $headers['Pragma'] = 'no-cache';
            return Response::make(View::make('main.admin'), 200, $headers);
            // return View::make('main.lawyer');
        }else{
            return Redirect::route('admin-sign-in');
        }
    }

    public function postSignIn() {
        $auth = Auth::user()->attempt(array(
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
    public function adminPostSignIn() {
        $auth = Auth::account()->attempt(array(
                    'email' => Input::get('username'),
                    'password' => Input::get('password')
        ));

        if ($auth) {

            return Redirect::route('admin-home');

            // echo"passed";
        } else {
            return Redirect::route('admin-sign-in')
                            ->with('incorrectpassword', true);
        }
    }

    public function getSignOut() {
        //   $user = Auth::user();
        Auth::user()->logout();
        // Cache::flushAll();
        //Session::flush();
        return Redirect::route('home');
    }
    public function adminGetSignOut() {
        //   $user = Auth::user();
        Auth::account()->logout();
        // Cache::flushAll();
        //Session::flush();
        return Redirect::route('home');
    }

}
