<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');
Route::get('/resetServer', [App\Http\Controllers\HomeController::class, 'resetServer'])->name('resetServer');
Route::get('/resetServer/{master}', [App\Http\Controllers\HomeController::class, 'resetServer'])->name('resetServer.master');
Route::get('generator_builder', [\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController::class, 'builder'])->name('io_generator_builder');
Route::get('field_template', [\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController::class, 'fieldTemplate'])->name('io_field_template');
Route::get('relation_field_template', [\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController::class, 'relationFieldTemplate'])->name('io_relation_field_template');
Route::post('generator_builder/generate', [\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController::class, 'generate'])->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', [\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController::class, 'rollback'])->name('io_generator_builder_rollback');
Route::post(
    'generator_builder/generate-from-file',
    [\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController::class, 'generateFromFile']
)->name('io_generator_builder_generate_from_file');




Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('login/admin', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginFormAdmin'])->name('admin.login');
Route::post('admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login']);
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('admin/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

// Registration Routes...
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);
//End Auth


Route::resource('masterNumbers', 'MasterNumberController');
Route::resource('messages', 'MessageController');
Route::resource('users', 'UserController');
Route::resource('countries', 'CountryController');
Route::resource('messageInfos', 'MessageInfoController');
Route::resource('settings', 'SettingController');
Route::resource('perMinSends', 'perMinSendController');
Route::get('/send', [App\Http\Controllers\MessageInfoController::class, 'send'])->name('send');
Route::resource('topups', 'topupController');
Route::resource('sMTPS', 'SMTPController');

Route::get('/sendEmail', [App\Http\Controllers\HomeController::class, 'sendEmail']);

Route::get('/smtpEmport', [App\Http\Controllers\SMTPController::class, 'smtpEport'])->name('sMTPS.emport');
Route::get('/emport_store', [App\Http\Controllers\SMTPController::class, 'emport_store'])->name('s_m_t_p_s.emport_store');