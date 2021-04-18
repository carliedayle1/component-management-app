<?php
use App\Http\Middleware\CheckAccountType;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Component routes

Route::get('/components', 'ComponentsController@index');
Route::get('/components/create', 'ComponentsController@create')->middleware('auth', CheckAccountType::class);

Route::get('/components/report/{component}', 'ComponentsController@report')->middleware('auth', CheckAccountType::class);

Route::get('/components/borrow/{component}', 'ComponentsController@borrow')->middleware('auth', CheckAccountType::class);

Route::get('/components/edit/{component}', 'ComponentsController@edit')->middleware('auth', CheckAccountType::class);

Route::get('/components/archives', 'ComponentsController@archive')->middleware('auth', CheckAccountType::class);

Route::get('/components/transactions', 'ComponentsController@transactions')->middleware('auth', CheckAccountType::class);

Route::post('/generateqr', 'ComponentsController@generateQR');
Route::post('/components/create', 'ComponentsController@store');
Route::put('/components/update/{component}', 'ComponentsController@update');
Route::delete('/components/delete/{component}', 'ComponentsController@destroy');
Route::post('/components/restore/{archive}', 'ComponentsController@restore');

// Report routes

Route::get('/reports', 'ReportsController@index');
Route::get('/reports/{report}', 'ReportsController@view');
Route::get('/reports/edit/{report}', 'ReportsController@edit');
Route::get('/reports-archives', 'ReportsController@archives');
Route::get('/reports-transactions', 'ReportsController@transactions');

Route::post('/reports/create/{component}', 'ReportsController@store');
Route::put('/reports/update/{report}', 'ReportsController@update');
Route::delete('/reports/delete/{report}', 'ReportsController@destroy');
Route::post('/reports/restore/{archive}', 'ReportsController@restore');

// User routes

Route::get('/users', 'UsersController@index');
Route::get('/users/create', 'UsersController@create');
Route::get('/users/edit/{user}', 'UsersController@edit');
Route::get('/profile', 'HomeController@profile');
Route::put('/profile/update/{user}', 'HomeController@updateProfile');

Route::put('/users/update/{user}', 'UsersController@update');
Route::delete('/users/delete/{user}', 'UsersController@destroy');


// Rooms routes

Route::get('/rooms', 'RoomsController@index');
Route::get('/rooms/{room}', 'RoomsController@view');
Route::get('/rooms/create', 'RoomsController@create');
Route::post('/rooms/create', 'RoomsController@store');

//Borrow routes

Route::get('/borrowlogs', 'BorrowController@logs');
Route::get('/borrows/edit/{borrow}', 'BorrowController@edit')->middleware('auth', CheckAccountType::class);;
Route::get('/borrow/notify', 'BorrowController@notify')->middleware('auth', CheckAccountType::class);;

Route::post('/borrow/store/{component}', 'BorrowController@store');
Route::put('/borrow/update/{borrow}', 'BorrowController@update');



// Notification routes

Route::get('/notifications', 'HomeController@notifications');
Route::get('/read', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return back();
});

// Export routes

Route::post('/exports/components', 'ExportsController@component');
Route::post('/exports/borrows', 'ExportsController@borrows');
Route::post('/exports/reports', 'ExportsController@report');
Route::post('/exports/users', 'ExportsController@user');







