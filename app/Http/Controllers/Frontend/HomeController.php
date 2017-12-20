<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.home.index');
    }

    public function packageService(Request $request)
    {
        $modelGroup = new Groups();
        $arrListGroup = $modelGroup->getByAttributes([
            'status' => 1,
            'type' => 'member'
        ], 'display_order', 'asc');
        
        return view('frontend.home.package_service', compact('arrListGroup'));
    }
}
