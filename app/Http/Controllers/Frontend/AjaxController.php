<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\EstateType;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function uploadImage(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            $type = $request->type ?? 'image';

            if (!$file->isValid()) {
                return response()->json(['error' => 1, 'message' => $file->getErrorMessage()]);
            }

            $arrExt = ['jpeg', 'jpg', 'png'];
            $limitSize = 5242880;

            // Get file info
            $fileName = $file->getClientOriginalName();
            $fileExt = $file->getClientOriginalExtension();
            $fileSize = $file->getClientSize();
            $maxFileSize = min($file->getMaxFilesize(), $limitSize);

            // Check extension valid or not
            if (!in_array($fileExt, $arrExt)) {
                return response()->json(['error' => 1, 'message' => sprintf('Tập tin <b>%s</b> không được hỗ trợ, chỉ hỗ trợ các dạng sau: %s.', array($fileName, implode(',', $arrExt)))]);
            }

            // Check size
            if ($fileSize > $maxFileSize) {
                return response()->json(['error' => 1, 'message' => sprintf('Kích thước của tập tin <b>%s</b> vượt quá kích thước cho phép là %s.', array($fileName, $maxFileSize))]);
            }

            // Get file name exclude extension
            $fileName = str_replace('.' . $fileExt, '', $fileName);
            $fileExt = 'jpg';

            $fileNameNew = str_slug($fileName) . '_' . rand(1111, 9999) . '-' . time() . '.' . $fileExt;
            $folderDate = date('Y/m/d');

            try {
                // Get disk storage
                $disk = Storage::disk('local');

                // Copy file
                $disk->put('images/' . $folderDate . '/' . $fileNameNew, file_get_contents($file->getRealPath()));

                $arrInfo = [
                    'type' => $type,
                    'filename' => $folderDate . '/' . $fileNameNew
                ];

                return response()->json(['error' => 0, 'message' => 'Upload successed!', 'info' => $arrInfo]);
            } catch (FileException $ex) {
                return response()->json(['error' => 1, 'message' => $ex->getMessage()]);
            }
        }

        return redirect(route('backend.index'));
    }

    public function deleteImage(Request $request, $filename)
    {
        $disk = Storage::disk('local');

        if (!$disk->exists('images/' . $filename)) {
            return response()->json(['error' => 1, 'message' => 'File not exists!']);
        }

        $disk->delete('images/' . $filename);

        return response()->json(['error' => 0, 'message' => 'Done.']);
    }
}
