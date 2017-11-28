<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.home.index');
    }

    public function packageService(Request $request)
    {
        return view('frontend.home.package_service');
    }
}
