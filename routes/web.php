<?php

use App\Task;

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/', 'HomeController@index')->name('home');

// BACKEND ROUTES
// Route::get('/', 'PostsController@index')->name('home');
// Route::get('/posts/{post}', 'PostsController@show');
// BACKEND POSTS
Route::get('/posts/my_posts', 'PostsController@lists')->name('your_posts');
Route::get('/posts/list', 'PostsController@index')->name('posts');
Route::get('/posts/create', 'PostsController@create')->name('create_posts');
Route::get('/posts/list/{post}', 'PostsController@show')->name('display_posts');
Route::get('/posts/edit/{post}', 'PostsController@edit')->name('edit_posts');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::post('/posts/update/{post}', 'PostsController@update')->name('update_posts');
Route::delete('/posts/delete/{post}', 'PostsController@destroy')->name('delete_posts');

// POSTS CATEGORIES
Route::get('/category/list', 'CategoryController@lists')->name('posts_cat');
Route::get('/category/create', 'CategoryController@create')->name('posts_cat_create');
Route::get('/category/edit/{category}', 'CategoryController@edit')->name('posts_cat_edit');
Route::post('/category/store', 'CategoryController@store')->name('posts_cat_store');
Route::post('/category/update/{category}', 'CategoryController@update')->name('posts_cat_update');
Route::delete('/category/delete/{post}', 'CategoryController@destroy')->name('posts_cat_delete');

// BACKEND MANAGE USERS
Route::get('/users/create', 'UsersController@create')->name('users_posts');
Route::get('/users/list', 'UsersController@index')->name('list_posts');
Route::get('/users/edit/{user}', 'UsersController@edit')->name('edit_users');
Route::post('/users/add', 'UsersController@store')->name('add_users');
Route::post('/users/update/{user}', 'UsersController@update')->name('update_users');
Route::delete('/users/delete/{user}', 'UsersController@delete')->name('delete_users');

// Auth::routes();
Route::get('/home', 'HomeController@index');

// REGISTRATION
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

// SESSIONS
Route::get('/login', 'SessionsController@create')->name('login');
Route::get('/logout', 'SessionsController@destroy')->name('logout');
Route::post('/login', 'SessionsController@store');

// DASHBOARD
Route::get('/admin/dashboard', 'DashboardController@create')->name('dashboard');

// DASHBOARD HOME 
Route::get('/admin/home', 'DashboardHomeController@index')->name('dashboard_home');
Route::get('/admin/home/edit/{edit}', 'DashboardHomeController@edit')->name('edit_dashboard_home');
Route::post('/admin/home', 'DashboardHomeController@store')->name('add_dashboard_home');
Route::post('/admin/home/edit/{edit}', 'DashboardHomeController@update')->name('update_dashboard_home');

// DASHBOARD ASSETS
Route::get('/admin/assets', 'DashboardAssetsController@index')->name('dashboard_assets');
Route::post('/admin/assets', 'DashboardAssetsController@store')->name('dashboard_store_assets');

// MENU
Route::get('/menu', 'MenuController@index')->name('menu');
Route::get('/menu/edit/{menu}', 'MenuController@edit')->name('menu_edit');
Route::post('/menu/store', 'MenuController@store')->name('menu_store');
Route::post('/menu/storelist', 'MenuController@storelist')->name('menu_storelist');
Route::post('/menu/storelist/{menu}', 'MenuController@update')->name('menu_updateStorelist');
Route::delete('/menu/deletelist/{menu}', 'MenuController@deleteStorelist')->name('menu_deleteStorelist');

// PAGES
Route::get('/pages', 'PagesController@index')->name('pages');
Route::get('/pages/create', 'PagesController@create')->name('pages_create');
Route::get('/pages/show', 'PagesController@show')->name('pages_show');
Route::get('/pages/edit/{page}', 'PagesController@edit')->name('pages_edit');
Route::post('/pages/store', 'PagesController@store')->name('pages_store');
Route::post('/pages/update/{page}', 'PagesController@update')->name('pages_update');
Route::delete('/pages/delete/{page}', 'PagesController@destroy')->name('pages_delete');

// API
Route::get('/api/homepage', 'ApiController@homepage');
Route::get('/api/pages', 'ApiController@pages');
Route::get('/api/pages/{pages}', 'ApiController@pageList');
Route::get('/api/posts', 'ApiController@posts');
Route::get('/api/posts/{posts}', 'ApiController@postList');

// storage route
Route::get('uploads/{filename}', function ($filename)
{
    $path = storage_path('uploads/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage');
