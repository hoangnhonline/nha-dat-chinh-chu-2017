<?php
namespace App\Providers;

use App\Models\Groups;
use Illuminate\Support\ServiceProvider;
use Hash;
use App\Models\Settings;
use App\Models\EstateType;
use App\Models\ArticlesCate;
use App\Models\Articles;
use App\Models\District;
use App\Models\CustomLink;
use App\Models\LandingProjects;
use App\Models\ProContent;
use App\Models\Price;
use App\Models\Support;
use App\Models\Area;
use App\Models\Menu;
use App\Models\City;
use App\Models\Direction;

class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//Call function composerSidebar
		$this->composerMenu();	
		
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Composer the sidebar
	 */
	private function composerMenu()
	{

		view()->composer( 'frontend.partials.member_level' , function( $view ){
		    $modelGroups = new Groups();
            $arrListGroup = $modelGroups->getByAttributes([
                'type' => 'member',
                'status' => 1
            ], 'display_order', 'asc');

			$view->with([
			    'arrListGroup' => $arrListGroup
            ]);
		});
	}
	
}
