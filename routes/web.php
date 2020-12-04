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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/dentist', 'DentistController@index')->name('dentist')->middleware('dentist');
Route::get('/patient', 'PatientController@index')->name('patient')->middleware('patient');
Route::get('/patientregister', 'Auth\PatientRegisterController@showForm');
Route::post('/patientregister', 'Auth\PatientRegisterController@postForm')->name('patient.register');
Route::get('/dentistregister', 'Auth\DentistRegisterController@showForm');
Route::post('/dentistregister', 'Auth\DentistRegisterController@postForm')->name('dentist.register');
Route::get('/receptionistregister', 'Auth\ReceptionistRegisterController@showForm');
Route::post('/receptionistregister', 'Auth\ReceptionistRegisterController@postForm')->name('receptionist.register');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'patient','middleware'=>'patient'], function(){
    Route::get('/dashboard', 'PatientController@index')->name('p-dashboard');
    Route::get('/profile', 'PatientController@showprofile')->name('p-profile');
    Route::post('/profile/update/{id}', 'PatientController@updateprofile')->name('basicinfoupdate');
    Route::post('/profile/email/{id}', 'PatientController@emailupdate')->name('p-emailupdate');
    Route::post('/profile/username/{id}', 'PatientController@usernameupdate')->name('p-usernameupdate');
    Route::post('/profile/image/{id}', 'PatientController@profileimageupdate')->name('p-imageupdate');
    Route::get('/appointment', 'PatientController@appointment')->name('p-appointment');
    Route::post('/save-appointment', 'PatientController@store')->name('p-appointmentsave');
    Route::get('/appointment-edit/{id}', 'PatientController@edit')->name('p-appointmentedit');
    Route::put('/appointment-update/{id}', 'PatientController@update')->name('p-appointmentupdate');
    Route::get('/appointment-delete/{id}', 'PatientController@destroy')->name('p-appointmentdelete');
});

Route::group(['prefix'=>'receptionist', 'middleware'=>'receptionist'], function(){
    Route::get('/dashboard', 'ReceptionistController@index')->name('r-dashboard');
    Route::get('/profile', 'ReceptionistController@profile')->name('r-profile');
    Route::post('/profile/update/{id}', 'ReceptionistController@updateprofile')->name('rbasicinfoupdate');
    Route::post('/profile/email/{id}', 'ReceptionistController@emailupdate')->name('emailupdate');
    Route::post('/profile/username/{id}', 'ReceptionistController@usernameupdate')->name('usernameupdate');
    Route::post('/profile/image/{id}', 'ReceptionistController@profileimageupdate')->name('imageupdate');
    Route::get('/appointment', 'ReceptionistController@appointment')->name('r-appointment');
    Route::post('/appointment-save', 'ReceptionistController@store')->name('r-appointmentsave');
    Route::resource('/services', 'ServiceController');
    Route::get('/invoice', 'InvoiceController@index')->name('invoice');
    Route::post('/invoice-store', 'InvoiceController@store')->name('invoice.store');
    Route::get('/refresh-list', 'InvoiceController@refreshlist')->name('refresh.list');
    Route::get('/ajaxservice-list', 'InvoiceController@ajaxlist')->name('ajaxservice.list');
    Route::get('/ajax-form', 'InvoiceController@ajaxform')->name('ajax.form');
    Route::post('/getrate', 'InvoiceController@getrate')->name('invoicerate');
    Route::get('/invoice/show','InvoiceController@invoice')->name('showinvoice');
    Route::get('/patients', 'ReceptionistController@patient')->name('patients');
    Route::get('/patients/action', 'ReceptionistController@action')->name('live_search.action');
    Route::get('/addpatients', 'ReceptionistController@addpatient')->name('addpatients');
    Route::post('/new-patients', 'ReceptionistController@storepatient')->name('storepatient');

    // invoice route
    Route::post('/bill','InvoiceController@savetobill')->name('save.bill');
    Route::get('/bill/print','InvoiceController@billprint')->name('print');

    // patient name
    Route::get('/patient/name','InvoiceController@getpatientname');
});

Route::group(['prefix'=>'dentist','middleware'=>'dentist'], function(){
    Route::get('/dashboard','DentistController@index')->name('dentist.dashboard');
    Route::get('/profile','DentistController@profile')->name('dentist.profile');
    Route::post('/profile/update/{id}','DentistController@update')->name('dentist.profile.update');
    Route::post('/timetable/update/{id}','DentistController@update_timetable')->name('dentist.timetable.update');
    Route::post('/timetables/create/{id}','DentistController@create_timetables')->name('dentist.timetable.create');
    Route::post('/changepassword/update/{id}','DentistController@password_update')->name('dentist.change.password');
    Route::get('/appointment','DentistController@appointment')->name('dentist.appointment');
    Route::get('/appointment/today','DentistController@today')->name('dentist.today.appointment');
    Route::get('/appointment/tommorow','DentistController@tommorow')->name('dentist.tommorow.appointment');
    Route::get('/appointment/finished','DentistController@finish')->name('dentist.finished.appointment');
    Route::get('/appointment/cancelled','DentistController@cancelled')->name('dentist.cancelled.appointment');
    


    Route::post('/image/{id}','DentistController@imageUpload')->name('image.upload');
    // 
    Route::post('/update/dentist/appointment/{id}','DentistController@updateappointment')->name('update.dentist.appointment');
});

// admin routes
Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/patients', 'AdminController@patient')->name('a-patients');
    Route::get('/doctors', 'AdminController@doctor')->name('a-doctor');
    Route::get('/receptionists', 'AdminController@receptionist')->name('a-receptionist');
});