<?php

namespace App\Http\Controllers\Backend\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\MetaData;
use App\Models\EstateType;

class CateController extends Controller
{
    public $modelCate;
    public $modelMetaData;

    public function __construct()
    {
        $this->modelCate = new Cate();
        $this->modelMetaData = new MetaData();
    }

    public function index(Request $request)
    {
        $arrListCate = $this->modelCate->getByAttributes([
            'status' => 1
        ]);

        return view('backend.cate.index', compact('arrListCate'));
    }

    public function storeMeta($id, $meta_id, $dataArr)
    {
        $arrData = ['title' => $dataArr['meta_title'], 'description' => $dataArr['meta_description'], 'keywords' => $dataArr['meta_keywords'], 'custom_text' => $dataArr['custom_text'], 'updated_user' => Auth::user()->id];
        if ($meta_id == 0) {
            $arrData['created_user'] = Auth::user()->id;
            $rs = MetaData::create($arrData);
            $meta_id = $rs->id;

            $modelSp = Cate::find($id);
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        } else {
            $model = MetaData::find($meta_id);
            $model->update($arrData);
        }
    }

    public function edit($id)
    {
        $cateInfo = $this->modelCate->find($id);

        if (!$cateInfo) {
            abort(404);
        }

        $detail = Cate::find($id);
        $cateParentList = EstateType::orderBy('display_order')->get();
        $meta = (object)[];
        if ($detail->meta_id > 0) {
            $meta = MetaData::find($detail->meta_id);
        }
        return view('backend.cate.edit', compact('detail', 'meta', 'cateParentList'));
    }

    public function update(Request $request, $id)
    {
        $cateInfo = $this->modelCate->find($id);

        if (!$cateInfo) {
            abort(404);
        }

        $dataArr = $request->all();

        $this->validate($request, [
            'type' => 'required',
            'estate_type_id' => 'required',
            'name' => 'required',
            'slug' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'slug.required' => 'Bạn chưa nhập slug',
        ]);

        $model = Cate::find($dataArr['id']);

        $dataArr['updated_user'] = Auth::user()->id;

        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;

        $model->update($dataArr);

        $this->storeMeta($dataArr['id'], $dataArr['meta_id'], $dataArr);
        Session::flash('message', 'Cập nhật thành công');

        return redirect()->route('cate.edit', $dataArr['id']);
    }
}
