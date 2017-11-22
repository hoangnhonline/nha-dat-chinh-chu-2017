<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\EstateType;
use App\Models\Ward;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getEstateType(Request $request, $type)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $modelEstateType = new EstateType();
        $arrListEstateType = $modelEstateType->getByAttributes([
            'type' => $type,
            'status' => 1
        ], 'display_order', 'desc');

        $sHTML = '';

        if (!$arrListEstateType->isEmpty()) {
            foreach ($arrListEstateType as $estateType) {
                $sHTML .= '<option value="' . $estateType->id . '">' . $estateType->{'name_' . config('app.locale')} . '</option>';
            }
        }

        return response()->json(['error' => 0, 'html' => $sHTML]);
    }

    public function getDistrict(Request $request, $city_id)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $modelDistrict = new District();
        $arrListDistrict = $modelDistrict->getByAttributes([
            'city_id' => $city_id
        ], 'display_order', 'desc');

        $sHTML = '';

        if (!$arrListDistrict->isEmpty()) {
            foreach ($arrListDistrict as $district) {
                $sHTML .= '<option value="' . $district->id . '">' . $district->name . '</option>';
            }
        }

        return response()->json(['error' => 0, 'html' => $sHTML]);
    }

    public function getWard(Request $request, $district_id)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $modelWard = new Ward();
        $arrListWard = $modelWard->getByAttributes([
            'district_id' => $district_id
        ], 'display_order', 'desc');

        $sHTML = '';

        if (!$arrListWard->isEmpty()) {
            foreach ($arrListWard as $ward) {
                $sHTML .= '<option value="' . $ward->id . '">' . $ward->name . '</option>';
            }
        }

        return response()->json(['error' => 0, 'html' => $sHTML]);
    }
}
