<?php
namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Users;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function create(Request $request)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'add')) {
            abort(404);
        }

        return view('frontend.member.logo.create', compact('arrListCate','arrListCity'));
    }

    public function store()
    {
        if (!check_permission(auth('web')->user()->group_id, 'logo', 'add')) {
            abort(404);
        }
    }
}
