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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WelcomeController@index');
Route::get('/about','WelcomeController@about');
Route::get('/sub-category/{id}','WelcomeController@sub_category');
Route::post('/medicine','WelcomeController@medicine');
Route::get('/medicine-details/{id}','WelcomeController@medicine_details');




//Route::get('/user-registration','WelcomeController@user_registration');
//Route::get('/user-login','WelcomeController@user_login');



 Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');





Route::get('/admin-panel','AdminController@index');
Route::post('/admin-login','AdminController@admin_login_check');
Route::get('/dashboard','SuperAdminController@index');




// Start Category
Route::get('/add-category','SuperAdminController@add_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/manage-category','SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}','SuperAdminController@unpublished_category');
Route::get('/published-category/{id}','SuperAdminController@published_category');
Route::get('/edit-category/{id}','SuperAdminController@edit_category');
Route::post('/update-category','SuperAdminController@update_category');
Route::get('/delete-category/{id}','SuperAdminController@delete_category');
// End Category


// Start Sub Category
Route::get('/add-sub-category','SuperAdminController@add_sub_category');
Route::post('/save-sub-category','SuperAdminController@save_sub_category');
Route::get('/manage-sub-category','SuperAdminController@manage_sub_category');
Route::get('/unpublished-sub-category/{id}','SuperAdminController@unpublished_sub_category');
Route::get('/published-sub-category/{id}','SuperAdminController@published_sub_category');
Route::get('/edit-sub-category/{id}','SuperAdminController@edit_sub_category');
Route::post('/update-sub-category','SuperAdminController@update_sub_category');
Route::get('/delete-sub-category/{id}','SuperAdminController@delete_sub_category');
//End Sub Category



//Start Relation between Category and Sub Category
Route::get('/add-relation','SuperAdminController@add_relation');
Route::post('/save-relation','SuperAdminController@save_relation');
Route::get('/manage-relation','SuperAdminController@manage_relation');
Route::get('/unpublished-relation/{id}','SuperAdminController@unpublished_relation');
Route::get('/published-relation/{id}','SuperAdminController@published_relation');
Route::get('/edit-relation/{id}','SuperAdminController@edit_relation');
Route::post('/update-relation','SuperAdminController@update_relation');
Route::get('/delete-relation/{id}','SuperAdminController@delete_relation');
//End Relation between Category and Sub Category



//Start Medicine
Route::get('/add-medicine','SuperAdminController@add_medicine');
Route::post('/save-medicine','SuperAdminController@save_medicine');
Route::get('/manage-medicine','SuperAdminController@manage_medicine');
Route::get('/unpublished-medicine/{id}','SuperAdminController@unpublished_medicine');
Route::get('/published-medicine/{id}','SuperAdminController@published_medicine');
Route::get('/edit-medicine/{id}','SuperAdminController@edit_medicine');
Route::post('/update-medicine','SuperAdminController@update_medicine');
Route::get('/delete-medicine/{id}','SuperAdminController@delete_medicine');
//End Medicine


//Start prescription
Route::get('/add-prescription','SuperAdminController@add_prescription');
Route::post('/save-prescription','SuperAdminController@save_prescription');
Route::get('/manage-prescription','SuperAdminController@manage_prescription');
Route::get('/unpublished-prescription/{id}','SuperAdminController@unpublished_prescription');
Route::get('/published-prescription/{id}','SuperAdminController@published_prescription');
Route::get('/edit-prescription/{id}','SuperAdminController@edit_prescription');
Route::post('/update-prescription','SuperAdminController@update_prescription');
Route::get('/delete-prescription/{id}','SuperAdminController@delete_prescription');
//End prescription



Route::get('/admin-logout','SuperAdminController@admin_logout');
