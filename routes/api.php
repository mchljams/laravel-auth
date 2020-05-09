<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // Password Confirmation Routes...
    $this->get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    $this->post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Email Verification Routes...
    $this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    $this->get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    $this->post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});
