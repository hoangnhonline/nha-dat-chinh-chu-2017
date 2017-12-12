<?php

Route::group(['namespace' => 'Backend', 'prefix' => 'backend'], function () {
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
        Route::get('/login', ['as' => 'backend.auth.login', 'uses' => 'IndexController@getLogin']);
        Route::post('/login', ['as' => 'backend.auth.login.post', 'uses' => 'IndexController@postLogin']);
        Route::get('/logout', ['as' => 'backend.auth.logout', 'middleware' => ['web'], 'uses' => 'IndexController@logout']);
    });

    Route::group(['middleware' => ['auth:backend']], function () {
        Route::get('/', ['as' => 'dashboard.index', 'uses' => "DashboardController@index"]);

        //route for admin only
        Route::group(['middleware' => ['isAdmin'], 'namespace' => 'System'], function () {
            Route::group(['prefix' => 'group'], function () {
                Route::get('/', ['as' => 'group.index', 'uses' => 'GroupController@index']);
                Route::get('/edit/{id}', ['as' => 'group.edit', 'uses' => 'GroupController@edit']);
                Route::post('/update/{id}', ['as' => 'group.update', 'uses' => 'GroupController@update']);

                Route::group(['prefix' => 'admin'], function () {
                    Route::get('/', ['as' => 'group.admin.index', 'uses' => 'AdminController@index']);
                    Route::get('/create', ['as' => 'group.admin.create', 'uses' => 'AdminController@create']);
                    Route::post('/store', ['as' => 'group.admin.store', 'uses' => 'AdminController@store']);
                    Route::get('/edit/{id}', ['as' => 'group.admin.edit', 'uses' => 'AdminController@edit']);
                    Route::post('/update/{id}', ['as' => 'group.admin.update', 'uses' => 'AdminController@update']);
                    Route::post('/destroy/{id}', ['as' => 'group.admin.destroy', 'uses' => 'AdminController@destroy']);
                });

                Route::group(['prefix' => 'member'], function () {
                    Route::get('/', ['as' => 'group.member.index', 'uses' => 'MemberController@index']);
                    Route::get('/create', ['as' => 'group.member.create', 'uses' => 'MemberController@create']);
                    Route::post('/store', ['as' => 'group.member.store', 'uses' => 'MemberController@store']);
                    Route::get('/edit/{id}', ['as' => 'group.member.edit', 'uses' => 'MemberController@edit']);
                    Route::post('/update/{id}', ['as' => 'group.member.update', 'uses' => 'MemberController@update']);
                    Route::post('/destroy/{id}', ['as' => 'group.member.destroy', 'uses' => 'MemberController@destroy']);
                });
            });

            Route::group(['prefix' => 'cate'], function () {
                Route::get('/', ['as' => 'cate.index', 'uses' => 'CateController@index']);
                Route::get('/edit/{id}', ['as' => 'cate.edit', 'uses' => 'CateController@edit']);
                Route::post('/update/{id}', ['as' => 'cate.update', 'uses' => 'CateController@update']);
            });

            Route::group(['prefix' => 'estate-type'], function () {
                Route::get('/', ['as' => 'estate-type.index', 'uses' => 'EstateTypeController@index']);
                Route::get('/create', ['as' => 'estate-type.create', 'uses' => 'EstateTypeController@create']);
                Route::post('/store', ['as' => 'estate-type.store', 'uses' => 'EstateTypeController@store']);
                Route::get('/edit/{id}', ['as' => 'estate-type.edit', 'uses' => 'EstateTypeController@edit']);
                Route::post('/update/{id}', ['as' => 'estate-type.update', 'uses' => 'EstateTypeController@update']);
                Route::get('/destroy/{id}', ['as' => 'estate-type.destroy', 'uses' => 'EstateTypeController@destroy']);
            });

            Route::group(['prefix' => 'support'], function () {
                Route::get('/', ['as' => 'support.index', 'uses' => 'SupportController@index']);
                Route::get('/create', ['as' => 'support.create', 'uses' => 'SupportController@create']);
                Route::post('/store', ['as' => 'support.store', 'uses' => 'SupportController@store']);
                Route::get('{id}/edit', ['as' => 'support.edit', 'uses' => 'SupportController@edit']);
                Route::post('/update', ['as' => 'support.update', 'uses' => 'SupportController@update']);
                Route::get('{id}/destroy', ['as' => 'support.destroy', 'uses' => 'SupportController@destroy']);
            });

            Route::group(['prefix' => 'pages'], function () {
                Route::get('/', ['as' => 'pages.index', 'uses' => 'PagesController@index']);
                Route::get('/create', ['as' => 'pages.create', 'uses' => 'PagesController@create']);
                Route::post('/store', ['as' => 'pages.store', 'uses' => 'PagesController@store']);
                Route::get('{id}/edit', ['as' => 'pages.edit', 'uses' => 'PagesController@edit']);
                Route::post('/update', ['as' => 'pages.update', 'uses' => 'PagesController@update']);
                Route::get('{id}/destroy', ['as' => 'pages.destroy', 'uses' => 'PagesController@destroy']);
            });

            Route::group(['prefix' => 'custom-link'], function () {
                Route::get('/', ['as' => 'custom-link.index', 'uses' => 'CustomLinkController@index']);
                Route::get('/create', ['as' => 'custom-link.create', 'uses' => 'CustomLinkController@create']);
                Route::post('/store', ['as' => 'custom-link.store', 'uses' => 'CustomLinkController@store']);
                Route::get('{id}/edit', ['as' => 'custom-link.edit', 'uses' => 'CustomLinkController@edit']);
                Route::post('/update', ['as' => 'custom-link.update', 'uses' => 'CustomLinkController@update']);
                Route::get('{id}/destroy', ['as' => 'custom-link.destroy', 'uses' => 'CustomLinkController@destroy']);
            });

            Route::group(['prefix' => 'info-seo'], function () {
                Route::get('/', ['as' => 'info-seo.index', 'uses' => 'InfoSeoController@index']);
                Route::get('/create', ['as' => 'info-seo.create', 'uses' => 'InfoSeoController@create']);
                Route::post('/store', ['as' => 'info-seo.store', 'uses' => 'InfoSeoController@store']);
                Route::get('{id}/edit', ['as' => 'info-seo.edit', 'uses' => 'InfoSeoController@edit']);
                Route::post('/update', ['as' => 'info-seo.update', 'uses' => 'InfoSeoController@update']);
                Route::get('{id}/destroy', ['as' => 'info-seo.destroy', 'uses' => 'InfoSeoController@destroy']);
            });

            Route::group(['prefix' => 'newsletter'], function () {
                Route::get('/', ['as' => 'newsletter.index', 'uses' => 'NewsletterController@index']);
                Route::post('/store', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);
                Route::get('{id}/edit', ['as' => 'newsletter.edit', 'uses' => 'NewsletterController@edit']);
                Route::get('/export', ['as' => 'newsletter.export', 'uses' => 'NewsletterController@download']);
                Route::post('/update', ['as' => 'newsletter.update', 'uses' => 'NewsletterController@update']);
                Route::get('{id}/destroy', ['as' => 'newsletter.destroy', 'uses' => 'NewsletterController@destroy']);
            });

            Route::group(['prefix' => 'contact'], function () {
                Route::get('/', ['as' => 'contact.index', 'uses' => 'ContactController@index']);
                Route::post('/store', ['as' => 'contact.store', 'uses' => 'ContactController@store']);
                Route::get('{id}/edit', ['as' => 'contact.edit', 'uses' => 'ContactController@edit']);
                Route::get('/export', ['as' => 'contact.export', 'uses' => 'ContactController@download']);
                Route::post('/update', ['as' => 'contact.update', 'uses' => 'ContactController@update']);
                Route::get('{id}/destroy', ['as' => 'contact.destroy', 'uses' => 'ContactController@destroy']);
            });

            Route::group(['prefix' => 'tinh'], function () {
                Route::get('/', ['as' => 'tinh.index', 'uses' => 'TinhThanhController@index']);
                Route::post('/store', ['as' => 'tinh.store', 'uses' => 'TinhThanhController@store']);
                Route::get('{id}/edit', ['as' => 'tinh.edit', 'uses' => 'TinhThanhController@edit']);
                Route::post('/update', ['as' => 'tinh.update', 'uses' => 'TinhThanhController@update']);
                Route::get('{id}/destroy', ['as' => 'tinh.destroy', 'uses' => 'TinhThanhController@destroy']);
            });

            Route::group(['prefix' => 'district'], function () {
                Route::get('/', ['as' => 'district.index', 'uses' => 'DistrictController@index']);
                Route::get('/create', ['as' => 'district.create', 'uses' => 'DistrictController@create']);
                Route::post('/store', ['as' => 'district.store', 'uses' => 'DistrictController@store']);
                Route::get('{id}/edit', ['as' => 'district.edit', 'uses' => 'DistrictController@edit']);
                Route::post('/update', ['as' => 'district.update', 'uses' => 'DistrictController@update']);
                Route::get('{id}/destroy', ['as' => 'district.destroy', 'uses' => 'DistrictController@destroy']);
            });

            Route::group(['prefix' => 'articles-cate'], function () {
                Route::get('/', ['as' => 'articles-cate.index', 'uses' => 'ArticlesCateController@index']);
                Route::get('/create', ['as' => 'articles-cate.create', 'uses' => 'ArticlesCateController@create']);
                Route::post('/store', ['as' => 'articles-cate.store', 'uses' => 'ArticlesCateController@store']);
                Route::get('{id}/edit', ['as' => 'articles-cate.edit', 'uses' => 'ArticlesCateController@edit']);
                Route::post('/update', ['as' => 'articles-cate.update', 'uses' => 'ArticlesCateController@update']);
                Route::get('{id}/destroy', ['as' => 'articles-cate.destroy', 'uses' => 'ArticlesCateController@destroy']);
            });

            Route::group(['prefix' => 'tag'], function () {
                Route::get('/', ['as' => 'tag.index', 'uses' => 'TagController@index']);
                Route::get('/create', ['as' => 'tag.create', 'uses' => 'TagController@create']);
                Route::post('/store', ['as' => 'tag.store', 'uses' => 'TagController@store']);
                Route::post('/ajaxSave', ['as' => 'tag.ajax-save', 'uses' => 'TagController@ajaxSave']);
                Route::get('/ajax-list', ['as' => 'tag.ajax-list', 'uses' => 'TagController@ajaxList']);
                Route::get('{id}/edit', ['as' => 'tag.edit', 'uses' => 'TagController@edit']);
                Route::post('/update', ['as' => 'tag.update', 'uses' => 'TagController@update']);
                Route::get('{id}/destroy', ['as' => 'tag.destroy', 'uses' => 'TagController@destroy']);
            });
        });

        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
            Route::post('/update', ['as' => 'settings.update', 'uses' => 'SettingsController@update']);
            Route::get('/noti', ['as' => 'settings.noti', 'uses' => 'SettingsController@noti']);
            Route::post('/storeNoti', ['as' => 'settings.store-noti', 'uses' => 'SettingsController@storeNoti']);
        });

        Route::group(['prefix' => 'account'], function () {
            Route::get('/change-password', ['as' => 'account.change-pass', 'uses' => 'AccountController@changePass']);
            Route::post('/store-password', ['as' => 'account.store-pass', 'uses' => 'AccountController@storeNewPass']);
        });

        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', ['as' => 'banner.index', 'uses' => 'BannerController@index']);
            Route::get('/create/', ['as' => 'banner.create', 'uses' => 'BannerController@create']);
            Route::get('/list', ['as' => 'banner.list', 'uses' => 'BannerController@lists']);
            Route::post('/store', ['as' => 'banner.store', 'uses' => 'BannerController@store']);
            Route::get('/edit', ['as' => 'banner.edit', 'uses' => 'BannerController@edit']);
            Route::post('/update', ['as' => 'banner.update', 'uses' => 'BannerController@update']);
            Route::get('{id}/destroy', ['as' => 'banner.destroy', 'uses' => 'BannerController@destroy']);
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', ['as' => 'product.index', 'uses' => 'ProductController@index']);
            Route::get('/kygui', ['as' => 'product.kygui', 'uses' => 'ProductController@kygui']);
            Route::get('/ajax-get-detail-product', ['as' => 'ajax-get-detail-product', 'uses' => 'ProductController@ajaxDetail']);
            Route::get('/create/', ['as' => 'product.create', 'uses' => 'ProductController@create']);
            Route::post('/store', ['as' => 'product.store', 'uses' => 'ProductController@store']);
            Route::get('{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
            Route::post('/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);
            Route::post('/save-order-hot', ['as' => 'product.save-order-hot', 'uses' => 'ProductController@saveOrderHot']);
            Route::get('{id}/destroy', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
            Route::get('/ajax-get-tien-ich', ['as' => 'product.ajax-get-tien-ich', 'uses' => 'ProductController@ajaxGetTienIch']);
        });

        Route::group(['prefix' => 'articles'], function () {
            Route::get('/', ['as' => 'articles.index', 'uses' => 'ArticlesController@index']);
            Route::get('/create', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);
            Route::post('/store', ['as' => 'articles.store', 'uses' => 'ArticlesController@store']);
            Route::get('{id}/edit', ['as' => 'articles.edit', 'uses' => 'ArticlesController@edit']);
            Route::post('/update', ['as' => 'articles.update', 'uses' => 'ArticlesController@update']);
            Route::get('{id}/destroy', ['as' => 'articles.destroy', 'uses' => 'ArticlesController@destroy']);
        });

        Route::post('/tmp-upload', ['as' => 'image.tmp-upload', 'uses' => 'UploadController@tmpUpload']);
        Route::post('/tmp-upload-multiple', ['as' => 'image.tmp-upload-multiple', 'uses' => 'UploadController@tmpUploadMultiple']);
        Route::post('/update-order', ['as' => 'update-order', 'uses' => 'GeneralController@updateOrder']);
        Route::post('/ck-upload', ['as' => 'ck-upload', 'uses' => 'UploadController@ckUpload']);
        Route::post('/get-slug', ['as' => 'get-slug', 'uses' => 'GeneralController@getSlug']);
    });
});