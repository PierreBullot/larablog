<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try
        {
            $user = Socialite::driver('github')->user();
        }
        catch (Exception $e)
        {
            return redirect('auth/github');
        }
        
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('home');
    }
    
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
		//~ dd ($githubUser); die;
        if ($authUser = \App\User::where('email', $githubUser->email)->first())
        {
            return $authUser;
        }

        return \App\User::create([
			'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'role' => 'user',
            'password' => $githubUser->id
        ]);
    }
}
