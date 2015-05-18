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

    public function getCreate(){
        $user = Auth::account()->check();
        if ($user) {
           
            $headers = array();
            $headers['Expires'] = 'Tue, 1 Jan 1980 00:00:00 GMT';
            $headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
            $headers['Pragma'] = 'no-cache';
            return Response::make(View::make('main.lawyerRegistration'), 200, $headers);
            // return View::make('main.lawyer');
        }else{
            return Redirect::route('admin-sign-in');
        }
    }
    public function postCreate(){
        $validator=Validator::make(Input::all(),
            array(
                'email'             =>'required|max:50|email|unique:users',
                'username'          =>'required|max:20|min:3|unique:users',
                'password'          =>'required|min:6',
                'password_again'    =>'required|same:password'
            )
        );

        if ($validator->fails()) {
            return Redirect::route('account-create')
            ->withErrors($validator)
            ->withInput();
        }else{

            $email      =Input::get('email');
            $username   =Input::get('username');
            $password   =Input::get('password');

            $code       =str_random(60);

            $user       =User::create(array(
                'email'     =>$email,
                'username'  =>$username,
                'password'  =>Hash::make($password),
                'code'      =>$code,
                'active'    =>0
            ));

            if($user){

                Mail::send('emails.auth.activate', array('link'=>URL::route('account-activate',$code), 'username'=>$username), function($message) use ($user){
                    $message->to($user->email,$user->username)->subject('Activate your account');
                });

                return Redirect::route('admin-home')
                        ->with('global', 'Your account has been created! We have sent you and email to activate your account');
            }
        }
    }

    public function getActivate($code){
        $user=User::where('code', '=', $code)->where('active', '=', 0);

        if($user->count()){
            $user=$user->first();

            $user->active = 1;
            $user->code   ='';

            if($user->save()){
                return Redirect::route('home')
                        ->with('global', 'Activated! You can now sign in!');
            }
        }

        return Redirect::route('home')
                ->with('global', 'We could not activate your account. Try again later!');
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
    
    public function executeCheck(){
        $isAvailable = true;
        $input = Input::get('email');
        $users = User::all();
        foreach ($users as $u){
            if(Str::is(Str::lower($u->email),Str::lower($input))){
                $isAvailable = false;
                break;
            }
        }
        echo json_encode(array(
    'valid' => $isAvailable,
));
    }

}
