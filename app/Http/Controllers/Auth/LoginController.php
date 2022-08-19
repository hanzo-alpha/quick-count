<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

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
  protected string $redirectTo = RouteServiceProvider::HITUNG;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // Login
    public function showLoginForm(){
      $pageConfigs = ['bodyCustomClass' => 'bg-full-screen-image blank-page'];

        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
      ]);
    }

  /**
   * Log the user out of the application.
   *
   * @param  Request  $request
   * @return Application|RedirectResponse|Response|Redirector
   */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

      return $this->loggedOut($request) ?: redirect('/');
    }

    /**
     * The user has been authenticated.
     *
     * @param  Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $request->session()->put([
            '_is_superadmin' => $user->is_superadmin,
            '_last_login' => $user->last_login,
        ]);

        $user->update([
            'last_login' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
