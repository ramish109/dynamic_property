<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\PackageUser;
use App\Models\Package;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{ 
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
 
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        Mail::send('emails.forgetPassword', ['token' => '$token'], function($message) {

            $message->to('ramish.ansari@inertiasoft.net');

            $message->subject('Reset Password');

        });
        $test = Mail::send('emails.forgetPassword', ['token' => '$token'], function($message) {

            $message->to('luqman.ahmed.inertia@gmail.com');

            $message->subject('Reset Password');

        });
         dd($test);
        //     try {
        //     Mail::send('auth.verify', [
        //      'msg' => "Inertiasoft Data mail",
        //      'name' => $data['username'],
        //      'email' => $data['email'],
          
        //     //  'msg' => 'msg',
        //     //  'name' => 'name',
        //     //  'email' => 'wasdevinertiasoft@gmail.com',

        //     ],
          
        //       function ($mail) use($data) {
        //          $mail->from($data['email'], $data['username']);
        //          $mail->to('support@domain.com')->subject('Contact Message');
        //       }
          
        //      );
        //   // Catch the error
        //   } catch(\Swift_TransportException $e){
        //       if($e->getMessage()) {
        //          dd($e->getMessage());
        //       }             
        //   }
         
        $random = random_int(100000, 999999);
        // try {
        //     Mail::send('auth.verify', [
        //     'msg' => $random,
        //     'name' => "User Mail System",
        //     'email' => $data['email'],
        //     ],
          
        //       function ($mail) use($data) {
        //          $mail->from('support@domain.com', 'Dynamic Property');
        //          $mail->to($data['email'])->subject('Email Verification');
        //       }
          
        //     );

        //   // Catch the error
        // } catch(\Swift_TransportException $e){
        //     if($e->getMessage()) {
        //         dd($e->getMessage());
        //     }             
        // }


        if( $data['type'] === 'builder'){
         
            return User::create([
                'username' => $data['username'],
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'email' => $data['email'],
                'email_verified_token' => $random,
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
            ]);
            
        }elseif( $data['type'] === 'individual'){

            return User::create([
                'username' => $data['username'],
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'email' => $data['email'],
                'email_verified_token' => $random,
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
            ]);
            
        }elseif( $data['type'] === 'owner'){

            // dd($request->all());
            return User::create([
                'username' => $data['username'],
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'email' => $data['email'],
                'email_verified_token' => $random,
                'password' => Hash::make($data['password']),
                'type' => $data['type'],
            ]);
            
        }else{

            return User::create([
                'username' => $data['username'],
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'email' => $data['email'],
                'email_verified_token' => $random,
                'password' => Hash::make($data['password']),
            ]);

        }

    }
}
