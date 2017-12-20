<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ArticlesCate;
use App\Models\Cate;

use App\Models\MetaData;

use App\Models\Tag;
use App\Models\TagObjects;

use Helper, File, Session, Auth, Hash, URL;

class ArticlesCateController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $arrSearch['status'] = $status = isset($request->status) ? $request->status : 1;
        $arrSearch['is_hot'] = $is_hot = isset($request->is_hot) ? $request->is_hot : null;
       
        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = ArticlesCate::where('status', $status);
        if( $is_hot ){
            $query->where('is_hot', $is_hot);
        }
        
        if( $name != ''){
            $query->where('name_vi', 'LIKE', '%'.$name.'%');
            $query->orWhere('name_en', 'LIKE', '%'.$name.'%');
        }
        $query->join('users', 'users.id', '=', 'created_user');    
                   
        $items = $query->orderBy('articles-cate.id', 'desc')->paginate(50);   
   
        return view('backend.articles-cate.index', compact( 'items', 'arrSearch'));
    }    
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {

        return view('backend.articles-cate.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();                
        $this->validate($request,[
            
            'name_vi' => 'required',
           
            'name_en' => 'required',
           
        ],
        [
            'name_vi.required' => 'Bạn chưa nhập tên tiếng Việt ',
           
            'name_en.required' => 'Bạn chưa nhập tên tiếng Anh',
           
                    
        ]);

        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
  
        
        $dataArr['slug_vi'] = str_slug($dataArr['name_vi']);
        $dataArr['slug_en'] = str_slug($dataArr['name_en']);
        
        $dataArr['status'] = 1;

        $dataArr['created_user'] = Auth::user()->id;
        $dataArr['updated_user'] = Auth::user()->id;    

        $rs = ArticlesCate::create($dataArr);     
        $sp_id = $rs->id;
        $this->storeMeta($sp_id, 0, $dataArr);
        Session::flash('message', 'Tạo mới thành công');

        return redirect()->route('articles-cate.index']);
    }

    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = [
            'name_vi' => $dataArr['meta_name_vi'], 
            'description_vi' => $dataArr['meta_description_vi'], 
            'keywords_vi'=> $dataArr['meta_keywords_vi'], 
            'custom_text_vi' => $dataArr['custom_text_vi'], 
            'name_en' => $dataArr['meta_name_en'], 
            'description_en' => $dataArr['meta_description_en'], 
            'keywords_en'=> $dataArr['meta_keywords_en'], 
            'custom_text_en' => $dataArr['custom_text_en'], 
            'updated_user' => Auth::user()->id
        ];
        if( $meta_id == 0){
            $arrData['created_user'] = Auth::user()->id;            
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;            
            $modelSp = ArticlesCate::find( $id );
            $modelSp->meta_id = $meta_id;
            $modelSp->save();
        }else {
            $model = MetaData::find($meta_id);
            $model->update( $arrData );
        }              
    }    
    public function storeImage($id, $dataArr){        
        //process old image
        $imageIdArr = isset($dataArr['image_id']) ? $dataArr['image_id'] : [];
        $hinhXoaArr = ArticlesCateImg::where('product_id', $id)->whereNotIn('id', $imageIdArr)->lists('id');
        if( $hinhXoaArr )
        {
            foreach ($hinhXoaArr as $image_id_xoa) {
                $model = ArticlesCateImg::find($image_id_xoa);
                $urlXoa = config('decoos.upload_path')."/".$model->image_url;
                if(is_file($urlXoa)){
                    unlink($urlXoa);
                }
                $model->delete();
            }
        }       

        //process new image
        if( isset( $dataArr['thumbnail_id'])){
            $thumbnail_id = $dataArr['thumbnail_id'];

            $imageArr = []; 

            if( !empty( $dataArr['image_tmp_url'] )){

                foreach ($dataArr['image_tmp_url'] as $k => $image_url) {

                    if( $image_url && $dataArr['image_tmp_name'][$k] ){

                        $tmp = explode('/', $image_url);

                        if(!is_dir('uploads/'.date('Y/m/d'))){
                            mkdir('uploads/'.date('Y/m/d'), 0777, true);
                        }

                        $destionation = date('Y/m/d'). '/'. end($tmp);
                        
                        File::move(config('decoos.upload_path').$image_url, config('decoos.upload_path').$destionation);

                        $imageArr['name'][] = $destionation;

                        $imageArr['is_thumbnail'][] = $dataArr['thumbnail_id'] == $image_url  ? 1 : 0;
                    }
                }
            }
            if( !empty($imageArr['name']) ){
                foreach ($imageArr['name'] as $key => $name) {
                    $rs = ArticlesCateImg::create(['product_id' => $id, 'image_url' => $name, 'display_order' => 1]);                
                    $image_id = $rs->id;
                    if( $imageArr['is_thumbnail'][$key] == 1){
                        $thumbnail_id = $image_id;
                    }
                }
            }
            $model = ArticlesCate::find( $id );
            $model->thumbnail_id = $thumbnail_id;
            $model->save();
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }
    
   
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $thuocTinhArr = $phuKienArr = $soSanhArr = $tuongTuArr = [];
        $hinhArr = (object) [];
        $detail = ArticlesCate::find($id);

        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }
       
        return view('backend.articles-cate.edit', compact( 'detail', 'meta'));
    }
    public function ajaxDetail(Request $request)
    {       
        $id = $request->id;
        $detail = ArticlesCate::find($id);
        return view('backend.articles-cate.ajax-detail', compact( 'detail' ));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[
            
            'name_vi' => 'required',
          
            'name_en' => 'required',
        ],
        [
            
            'name_vi.required' => 'Bạn chưa nhập tên tiếng Việt ',
            
            'name_en.required' => 'Bạn chưa nhập tên tiếng Anh',
                    
        ]);
        
         $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;
  
        
        $dataArr['slug_vi'] = str_slug($dataArr['name_vi']);
        $dataArr['slug_en'] = str_slug($dataArr['name_en']);
        
        $dataArr['status'] = 1;
        $dataArr['updated_user'] = Auth::user()->id;    
        
        $model = ArticlesCate::find($dataArr['id']);

        $model->update($dataArr);
        
        $sp_id = $dataArr['id'];
       
        $this->storeMeta( $sp_id, $dataArr['meta_id'], $dataArr);
     
        Session::flash('message', 'Chỉnh sửa thành công');

        return redirect()->route('articles-cate.edit', $sp_id);
        
    } 
    

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = ArticlesCate::find($id);        
        $model->delete();
        Articles::where('product_id', $id)->delete();      
        // redirect
        Session::flash('message', 'Xóa thành công');
        
        return redirect(URL::previous());//->route('articles-cate.short');
        
    }
}