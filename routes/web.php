<?php
// Adding homepage
Route::get('/', 'HomeController@index');

// Adding profile page
Route::get('/profile/index', 'UserController@index')->name('profile')->middleware('auth');
Route::get('/profile/edit', 'UserController@edit')->name('profile_edit');
Route::put('/profile/update/{id}', 'UserController@update')->name('profile_update');
Route::get('/profile/reservations', 'ReservationsController@show')->name('profile_reservations');
Route::delete('/profile/reservations/{id}/delete', 'ReservationsController@destroy')->name('reservation_delete');
Route::delete('/profile/{id}/delete', 'UserController@destroy')->name('account_delete');

// Adding news page
Route::get('/news', function () {
    return view('news');
})->name('news');

// Adding laundry laundry page
Route::get('/laundry', 'ProductsController@index')->name('laundry')->middleware('auth');
Route::get('/laundry/{product}','ProductsController@show')->name('laundry_show');
Route::post('/laundry/reserve', 'ReservationsController@create');
Route::get('/laundry/filterproducts', 'ProductsController@filter');

// Adding support page
Route::get('/support', 'ContactController@contact')->name('support');
Route::post('/support', 'ContactController@contactSupport')->name('contactsupport');

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
Route::put('admin/users/{id}/verify', 'AdminController@verifyUser');
Route::get('/admin/reservations', 'AdminController@reservationShow')->name('reservations');
Route::delete('/admin/reservations/delete', 'AdminController@reservationDeleteAll');
Route::put('/admin/{id}/changeState', 'AdminController@activeState');
Route::get('/admin/usersearch', 'AdminController@searchStuff');
Route::delete('/products/delete/{id}', 'AdminController@reservationDelete')->name('reservation_delete');


//Route::get('/laundry', 'ReservationsController@index');

Auth::routes();


