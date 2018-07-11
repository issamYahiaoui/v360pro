<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/tours';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function login(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required'
        ]);


        // Set up the login attempt
        $credentials = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),

        ];

        $user = User::where('phone', $request->get('phone'))->first() ;
        if ($user){
            if ($user->role === "customer"){
                $agent = $user->agent() ;
                if ($agent->country !== $this->getCountryFromCode($request->get('code'))){
                    $this->incrementLoginAttempts($request);

                    return $this->sendFailedLoginResponse($request);
                }
            }
        }


        // Attempt to auth the user
        if (Auth::attempt($credentials)) {
            // Login success
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    private function getCountryFromCode($code){
        switch ($code)
        {
            case '+65' :
                return 'Singapore' ;

            case '+62' :
                return 'Indonesia' ;

            case '+60' :
                return 'Malaysia';


        }

    }

    protected function authenticated(Request $request, $user)
    {
        return redirect($this->redirectTo);
    }
}
