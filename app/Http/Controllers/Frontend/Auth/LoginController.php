<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/my-profile';
    public function showLoginForm()
    {
        return view('auth.sign-in');
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
