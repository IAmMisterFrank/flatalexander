<?php
// Adding homepage
Route::get('/', 'HomeController@index');

// Adding profile page
Route::get('/profile', 'UserController@index')->name('profile')->middleware('auth');

// Adding news page
Route::get('/news', function () {
    return view('news');
})->name('news');

// Adding laundry laundry page
Route::get('/laundry', 'ProductsController@index')->name('laundry')->middleware('auth');
Route::get('/laundry/{product}','ProductsController@show');
Route::post('/laundry/reserve', 'ReservationsController@create');

// Adding support page
Route::get('/support', function () {
    return view('support');
})->name('support');

// Adding regulations page
Route::get('/regulations', function () {
    return view('regulations');
})->name('regulations');

// Adding admin page
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/create-prod', 'ProductsController@create')->name('create-prod');
Route::post('/products', 'ProductsController@store');
Route::get('/products/{product}','AdminController@productShow');
Route::get('/admin/users', 'AdminController@userShow')->name('users');
Route::get('/admin/reservations', 'AdminController@reservationShow')->name('reservations');

//Route::get('/laundry', 'ReservationsController@index');

Auth::routes();


