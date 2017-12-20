<?php

namespace App\Providers;

use App\Models\Groups;
use App\Models\Modules;
use App\Models\Cate;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //Call function composerSidebar
        $this->composerMenu();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Composer the sidebar
     */
    private function composerMenu() {
        view()->composer(['backend.partials.sidebar'], function ($view) {
            //get controller and action
            $action = app('request')->route()->getAction();
            $controller = class_basename($action['controller']);

            $namespace = strtolower(class_basename($action['namespace']));
            if ($namespace != 'backend') {
                $namespace = 'backend_' . $namespace;
            }

            list($controller, $action) = explode('@', $controller);
            $controller = strtolower(str_replace('Controller', '', $controller));

            //get menu by menu code
            $menu_code = $namespace . '_' . $controller;

            //get list module
            $modelModules = new Modules();
            $arrListModule = $modelModules->getByAttributes([
                'code' => ['<>', 'view']
            ]);

            $view->with(compact('namespace', 'controller', 'action', 'menu_code', 'arrListModule'));
        });

        view()->composer('frontend.partials.member_level', function( $view ) {
            $modelGroups = new Groups();
            $arrListGroup = $modelGroups->getByAttributes([
                'type' => 'member',
                'status' => 1
            ], 'display_order', 'asc');

            $view->with([
                'arrListGroup' => $arrListGroup
            ]);
        });

        view()->composer('frontend.layout', function( $view ) {
            $modelCate = new Cate();
            $arrListCate = $modelCate->getByAttributes([
                'status' => 1
            ]);

            $view->with([
                'arrListCate' => $arrListCate
            ]);
        });
    }

}
