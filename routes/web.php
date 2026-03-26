<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::resource('/', 'sksController');
Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('verified');;
Route::resource('/users', 'UserController')->middleware('verified');
Route::resource('/designation', 'designation_controller')->middleware('verified');
Route::resource('/concern', 'concernController')->middleware('verified');
Route::resource('/main_settings', 'MainSettingController')->middleware('verified');
Route::resource('/social_medias', 'socialMediaController')->middleware('verified');
Route::resource('/categories', 'categoryController')->middleware('verified');
Route::resource('/sub_categories', 'SubCategoryController')->middleware('verified');
Route::resource('/menus', 'menusController')->middleware('verified');
Route::resource('/sub_menus', 'subMenuController')->middleware('verified');
Route::resource('/user_permissions', 'user_permissionController')->middleware('verified');
Route::resource('/desg_permissions', 'desg_permissionController')->middleware('verified');
Route::resource('/ads', 'adsController')->middleware('verified');
Route::resource('/news', 'newsController')->middleware('verified');
Route::resource('/edit_news', 'editNewsController')->middleware('verified');
Route::resource('/update_news', 'updateNewsController')->middleware('verified');
Route::resource('/set_as', 'setAsController')->middleware('verified');
Route::resource('/set_as_cat', 'setAsCatController')->middleware('verified');
Route::resource('/set_as_sub_cat', 'setAsSubCatController')->middleware('verified');
Route::resource('/set_as_breaking_news', 'setAsBreakingNewsController')->middleware('verified');
// ajax request controller
Route::get('/ajax/concern', 'ajaxController@concern')->middleware('verified');
Route::get('/ajax/edit_user', 'ajaxController@edit_user')->middleware('verified');
Route::get('/ajax/desg', 'ajaxController@desg')->middleware('verified');
Route::get('/ajax/get_sub_menu', 'ajaxController@get_sub_menu')->middleware('verified');
Route::get('/ajax/get_sub_category', 'ajaxController@get_sub_category')->middleware('verified');
Route::get('/ajax/get_news_under_cat', 'ajaxController@get_news_under_cat')->middleware('verified');
Route::get('/ajax/get_news_under_sub_cat', 'ajaxController@get_news_under_sub_cat')->middleware('verified');
Route::get('/ajax/get_traffic_data', 'ajaxController@get_traffic_data')->middleware('verified');
Route::get('/ajax/make_slug', 'ajaxController@make_slug')->middleware('verified');
Route::get('/ajax/get_all_tags','ajaxControllerForMainSite@get_all_tags');
Route::get('/ajax/caption_news_section','ajaxControllerForMainSite@caption_news_section');
Route::get('/ajax/set_as','ajaxController@set_as');
Route::get('/news_details/{id}','ajaxControllerForMainSite@news_details');
Route::get('/news_categories/{id}','ajaxControllerForMainSite@news_categories');
Route::get('/news_sub_categories/{id2}','ajaxControllerForMainSite@cns');
Route::get('/ajax/sastho_seba_section','ajaxControllerForMainSite@sastho_seba_section');
Route::get('/ajax/s_caption_news','ajaxControllerForMainSite@s_caption_news');
Route::get('/ajax/popular_news','ajaxControllerForMainSite@popular_news');
Route::get('/ajax/last_news','ajaxControllerForMainSite@last_news');
Route::get('/ajax/t_n_c','ajaxControllerForMainSite@t_n_c');
Route::get('/ajax/t_n_c2','ajaxControllerForMainSite@t_n_c2');
Route::get('/ajax/m_n_t','ajaxControllerForMainSite@m_n_t');
Route::get('/ajax/m_n_t2','ajaxControllerForMainSite@m_n_t2');
Route::get('/ajax/get_picture','ajaxControllerForMainSite@get_picture');
Route::get('/ajax/get_video','ajaxControllerForMainSite@get_video');
Route::get('/ajax/last_sec','ajaxControllerForMainSite@last_sec');
Route::get('/ajax/last_sec_c','ajaxControllerForMainSite@last_sec_c');
Route::get('/ajax/last_sec_b','ajaxControllerForMainSite@last_sec_b');
Route::get('/ajax/last_sec_e','ajaxControllerForMainSite@last_sec_e');
Route::get('/ajax/last_one','ajaxControllerForMainSite@last_one');
Route::get('/ajax/last_one_s','ajaxControllerForMainSite@last_one_s');
Route::get('/search_result','ajaxControllerForMainSite@search_result');
Route::get('/news_tags/{id}','ajaxControllerForMainSite@search_result');
Route::get('/get_all_hospital_news','ajaxControllerForMainSite@search_result');
Route::resource('api/all_users', 'neoController');
// ajax request controller
Auth::routes(['verify' => true]);