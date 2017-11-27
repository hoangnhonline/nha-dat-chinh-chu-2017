<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['namespace' => 'Frontend', 'prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    /*Route::get('/nha-dat-ban', ['as' => 'ban', 'uses' => 'ProductController@ban']);
    Route::get('/nha-dat-cho-thue', ['as' => 'cho-thue', 'uses' => 'ProductController@choThue']);
    Route::post('/project-contact', ['as' => 'project-contact', 'uses' => 'ProjectsController@contact']);
    Route::get('/tin-tuc/dat-nen-long-an-mieng-moi-beo-bo-cua-gioi-dau-tu-p63.html', function () {
        return Redirect::to('/nha-dat-long-an.html', 301);
    });
    Route::get('/du-an', ['as' => 'du-an', 'uses' => 'ProjectsController@index']);
    Route::get('du-an/{slug}', ['as' => 'detail-project', 'uses' => 'ProjectsController@detail']);
    Route::get('du-an/{slug}/{slugtab}', ['as' => 'tab', 'uses' => 'ProjectsController@tab']);
    Route::post('/tmp-upload-multiple-fe', ['as' => 'image.tmp-upload-multiple-fe', 'uses' => 'UploadController@tmpUploadMultipleFE']);

    Route::get('tag/{slug}', ['as' => 'tag', 'uses' => 'DetailController@tagDetail']);
    Route::get('tin-tuc/{slug}', ['as' => 'news-list', 'uses' => 'NewsController@newsList']);
    Route::get('{slug_type}/{slug}', ['as' => 'danh-muc-con', 'uses' => 'ProductController@cateChild']);
    Route::get('{slugLoaiSp}/{slug}-{id}.html', ['as' => 'chi-tiet', 'uses' => 'DetailController@index']);

    Route::get('/tin-tuc/{slug}-p{id}.html', ['as' => 'news-detail', 'uses' => 'NewsController@newsDetail']);


    Route::get('/dang-tin-ky-gui.html', ['as' => 'ky-gui', 'uses' => 'DetailController@kygui']);
    Route::get('/dang-tin-thanh-cong.html', ['as' => 'ky-gui-thanh-cong', 'uses' => 'DetailController@kyguiSuccess']);
    Route::post('/post-ky-gui', ['as' => 'post-ky-gui', 'uses' => 'DetailController@postKygui']);

    Route::post('/dang-ki-newsletter', ['as' => 'register.newsletter', 'uses' => 'HomeController@registerNews']);
    Route::post('/get-district', ['as' => 'get-district', 'uses' => 'DistrictController@getDistrict']);
    Route::post('/get-ward', ['as' => 'get-ward', 'uses' => 'WardController@getWard']);
    Route::get('/tim-kiem.html', ['as' => 'search', 'uses' => 'ProductController@search']);
    Route::get('so-sanh.html', ['as' => 'so-sanh', 'uses' => 'CompareController@index']);
    Route::get('lien-he.html', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    Route::get('{slug}.html', ['as' => 'danh-muc', 'uses' => 'ProductController@cate']);*/

    //route new
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/dang-nhap', ['as' => 'auth.login', 'uses' => 'IndexController@getLogin']);
        Route::post('/dang-nhap', ['as' => 'auth.login.post', 'uses' => 'IndexController@postLogin']);
        Route::get('/dang-xuat', ['as' => 'auth.logout', 'middleware' => ['web'], 'uses' => 'IndexController@logout']);
        Route::get('/dang-ky', ['as' => 'auth.register', 'uses' => 'IndexController@getRegister']);
        Route::post('/dang-ky', ['as' => 'auth.register.post', 'uses' => 'IndexController@postRegister']);

        Route::group(['prefix' => 'social-auth'], function () {
            Route::get('/login/{provider}', ['as' => 'auth.social.login', 'uses' => 'SocialController@login']);
            Route::get('/handle/{provider}', ['as' => 'auth.social.handle', 'uses' => 'SocialController@handle']);
        });
    });

    Route::group(['middleware' => ['auth:web'], 'prefix' => 'thanh-vien'], function () {
        Route::get('/tai-khoan', ['as' => 'member.detail', 'uses' => 'MemberController@index']);
        Route::put('/tai-khoan/cap-nhat', ['as' => 'member.detail.update', 'uses' => 'MemberController@updateInfo']);
        Route::get('/bat-dong-san-cua-toi', ['as' => 'member.land', 'uses' => 'MemberController@myLand']);
        Route::match(['get', 'post'], '/dang-tin-bat-dong-san', ['as' => 'member.register-land', 'uses' => 'MemberController@registerLand']);
    });

    Route::get('cap-do-thanh-vien.html', ['as' => 'cap-do-thanh-vien', 'uses' => 'HomeController@listMember']);

    //route ajax to get info
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('/get-estate-type/{type}', ['as' => 'ajax.get-estate-type', 'uses' => 'AjaxController@getEstateType']);
        Route::get('/get-district/{city_id}', ['as' => 'ajax.get-district', 'uses' => 'AjaxController@getDistrict']);
        Route::get('/get-ward/{district_id}', ['as' => 'ajax.get-ward', 'uses' => 'AjaxController@getWard']);
        Route::post('/upload-image', ['as' => 'ajax.upload-image', 'uses' => 'AjaxController@uploadImage']);
        Route::get('/delete-image/{filename}', ['as' => 'ajax.delete-image', 'uses' => 'AjaxController@deleteImage'])->where(['filename' => '[ \w\\.\\/\\-\\@\(\)]+']);
    });
});

