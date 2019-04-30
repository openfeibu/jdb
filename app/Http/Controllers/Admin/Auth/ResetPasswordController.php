<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Traits\AdminUser\RoutesAndGuards;
use App\Traits\AdminUser\Auth\AuthenticatesUsers;
use App\Traits\Theme\ThemeAndViews;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Response\Auth\Response as AuthResponse;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use RoutesAndGuards, ThemeAndViews, ValidatesRequests, AuthenticatesUsers,ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->response   = resolve(AuthResponse::class);
        $this->setRedirectTo();
        $this->middleware('guest:' . $this->getGuard(), ['except' => ['logout', 'verify', 'locked', 'sendVerification']]);
        $this->setTheme();
    }
}
