<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\EstateType;
use App\Models\Cate;
use App\Models\ProductImg;
use App\Models\MetaData;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Street;
use App\Models\PriceUnit;
use App\Models\Project;
use App\Models\Tag;
use App\Models\TagObjects;
use App\Models\Direction;
use App\Models\Area;
use App\Models\Price;

use Helper, File, Session, Auth, Hash, URL, Image;

class ProductController extends Controller
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
        $arrSearch['cart_status'] = $cart_status = isset($request->cart_status) ? $request->cart_status : [1,2,3];     
        $arrSearch['type'] = $type = isset($request->type) ? $request->type : 1;
        $arrSearch['estate_type_id'] = $estate_type_id = isset($request->estate_type_id) ? $request->estate_type_id : null;
        $arrSearch['city_id'] = $city_id = isset($request->city_id) ? $request->city_id : null;
        $arrSearch['district_id'] = $district_id = isset($request->district_id) ? $request->district_id : null;
        $arrSearch['ward_id'] = $ward_id = isset($request->ward_id) ? $request->ward_id : null;
        $arrSearch['project_id'] = $project_id = isset($request->project_id) ? $request->project_id : null;
        $arrSearch['street_id'] = $street_id = isset($request->street_id) ? $request->street_id : null;

        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        $arrSearch['id'] = $id = isset($request->id) && trim($request->id) != '' ? trim($request->id) : '';
        


        $query = Product::where('product.status', $status);
        if( $type ){
            $query->where('product.type', $type);
        }
        if( $estate_type_id ){
            $query->where('product.estate_type_id', $estate_type_id);
        }
        if( $cart_status ){
            $query->whereIn('product.cart_status', $cart_status);
        }
        if( $city_id ){
            $query->where('product.city_id', $city_id);
        }
        if( $district_id ){
            $query->where('product.district_id', $district_id);
        }
        if( $ward_id ){
            $query->where('product.ward_id', $ward_id);
        }
        if( $is_hot ){
            $query->where('product.is_hot', $is_hot);
        }
        if( $project_id ){
            $query->where('product.project_id', $project_id);
        }
        if(auth('backend')->user()->role == 1){
            $query->where('product.created_user', auth('backend')->user()->id);
        }
        if( $name != ''){
            $query->where('product.title', 'LIKE', '%'.$name.'%');            
        }
        if( $id != ''){
            $query->where('product.id', $id);            
        }
        //$query->join('users', 'users.id', '=', 'product.created_user');
        $query->join('city', 'city.id', '=', 'product.city_id');        
        $query->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id'); 
        $query->join('estate_type', 'product.estate_type_id', '=','estate_type.id'); 
        if($is_hot == 1){
            $query->orderBy('product.display_order', 'asc'); 
        }
        $query->orderBy('product.cart_status', 'asc'); 
        $query->orderBy('product.id', 'desc');   
        $items = $query->select(['product_img.image_url as image_urls','product.*', 'estate_type.slug as slug_loai'])->paginate(50);

        $cityList = City::all();  
        $estateTypeArr = EstateType::where('type', $type)->get(); 
        $districtList = District::where('city_id', $city_id)->where('status', 1)->get();
       // var_dump($detail->district_id);die;
        $wardList = Ward::where('district_id', $district_id)->get();
        $streetList = Street::where('district_id', $district_id)->get();
        $projectList = Project::where('district_id', $district_id)->get();
        return view('backend.product.index', compact( 'items', 'arrSearch', 'cityList', 'estateTypeArr', 'districtList', 'wardList', 'streetList', 'projectList'));        
    }

    public function kygui(Request $request)
    {

        $arrSearch['status'] = $status = 2;   
        $arrSearch['cart_status'] = $cart_status = isset($request->cart_status) ? $request->cart_status : 1;     
        $arrSearch['type'] = $type = isset($request->type) ? $request->type : 1;
        $arrSearch['estate_type_id'] = $estate_type_id = isset($request->estate_type_id) ? $request->estate_type_id : null;
        $arrSearch['district_id'] = $district_id = isset($request->district_id) ? $request->district_id : null;
        $arrSearch['city_id'] = $city_id = isset($request->city_id) ? $request->city_id : null;
        $arrSearch['ward_id'] = $ward_id = isset($request->ward_id) ? $request->ward_id : null;
        $arrSearch['project_id'] = $project_id = isset($request->project_id) ? $request->project_id : null;
        $arrSearch['street_id'] = $street_id = isset($request->street_id) ? $request->street_id : null;

        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';       


        $query = Product::where('product.status', 2);
        if( $type ){
            $query->where('product.type', $type);
        }
        if( $estate_type_id ){
            $query->where('product.estate_type_id', $estate_type_id);
        }
        if( $cart_status ){
            $query->where('product.cart_status', $cart_status);
        }
        if( $city_id ){
            $query->where('product.city_id', $city_id);
        }
        if( $district_id ){
            $query->where('product.district_id', $district_id);
        }
        if( $ward_id ){
            $query->where('product.ward_id', $ward_id);
        }
        if( $project_id ){
            $query->where('product.project_id', $project_id);
        }
        if(auth('backend')->user()->role == 1){
            $query->where('product.created_user', auth('backend')->user()->id);
        }
        if( $name != ''){
            $query->where('product.title', 'LIKE', '%'.$name.'%');            
        }
        //$query->join('users', 'users.id', '=', 'product.created_user');
        $query->join('city', 'city.id', '=', 'product.city_id');        
        $query->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id'); 
        $query->join('estate_type', 'product.estate_type_id', '=','estate_type.id'); 
        $query->orderBy('product.cart_status', 'asc');
        $query->orderBy('product.id', 'desc');   
        $items = $query->select(['product_img.image_url as image_urls','product.*', 'estate_type.slug as slug_loai'])->paginate(50);

        $cityList = City::all();  
        $estateTypeArr = EstateType::where('type', $type)->get(); 
        $districtList = District::where('city_id', $city_id)->where('status', 1)->get();
       // var_dump($detail->district_id);die;
        $wardList = Ward::where('district_id', $district_id)->get();
        $streetList = Street::where('district_id', $district_id)->get();
        $projectList = Project::where('district_id', $district_id)->get();
        return view('backend.product.kygui', compact( 'items', 'arrSearch', 'cityList', 'estateTypeArr', 'districtList', 'wardList', 'streetList', 'projectList'));
    }
    public function ajaxGetTienIch(Request $request){
        $district_id = $request->district_id;
        $tienIchLists = Tag::where(['type' => 3])->get();
        return view('backend.product.ajax-get-tien-ich', compact( 'tienIchLists'));   
    }
    public function saveOrderHot(Request $request){
        $data = $request->all();
        if(!empty($data['display_order'])){
            foreach ($data['display_order'] as $id => $display_order) {
                $model = Product::find($id);
                $model->display_order = $display_order;
                $model->save();
            }
        }
        Session::flash('message', 'Cập nhật thứ tự tin HOT thành công');

        return redirect()->route('product.index', ['estate_type_id' => $data['estate_type_id'], 'type' => $data['type'], 'is_hot' => 1]);
    }
    public function ajaxSearch(Request $request){    
        $search_type = $request->search_type;
        $arrSearch['estate_type_id'] = $estate_type_id = isset($request->estate_type_id) ? $request->estate_type_id : -1;
        $arrSearch['cate_id'] = $cate_id = isset($request->cate_id) ? $request->cate_id : -1;
        $arrSearch['name'] = $name = isset($request->name) && trim($request->name) != '' ? trim($request->name) : '';
        
        $query = Product::whereRaw('1');
        
        if( $estate_type_id ){
            $query->where('product.estate_type_id', $estate_type_id);
        }
        if( $cate_id ){
            $query->where('product.cate_id', $cate_id);
        }
        if( $name != ''){
            $query->where('product.title', 'LIKE', '%'.$name.'%');
            $query->orWhere('name_extend', 'LIKE', '%'.$name.'%');
        }
        $query->join('users', 'users.id', '=', 'product.created_user');
        $query->join('estate_type', 'estate_type.id', '=', 'product.estate_type_id');
        $query->join('cate', 'cate.id', '=', 'product.cate_id');
        $query->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id');        
        $query->orderBy('product.id', 'desc');
        $items = $query->select(['product_img.image_url','product.*','product.id as product_id', 'full_name' , 'product.created_at as time_created', 'users.full_name', 'estate_type.name as ten_loai', 'cate.name as ten_cate'])
        ->paginate(1000);

        $estateTypeArr = EstateType::all();  
        

        return view('backend.product.content-search', compact( 'items', 'arrSearch', 'estateTypeArr',  'search_type'));
    }

   
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        $tagArr = Tag::where('type', 1)->get();        
        $estate_type_id = $request->estate_type_id ? $request->estate_type_id : null;
        $type = $request->type ? $request->type : 1;    
        
        if( $type ){
            
            $estateTypeArr = EstateType::where('type', $type)->select('id', 'name_vi')->orderBy('display_order', 'desc')->get();
            $priceList = Price::where('type', $type)->get();     
            
        }       
        $priceUnitList = PriceUnit::all();
        $city_id = $request->city_id ? $request->city_id : 1;
        $cityList = City::all();
        $districtList = District::where('city_id', $city_id)->where('status', 1)->get();

       // var_dump($detail->district_id);die;
        $district_id = $request->district_id ? $request->district_id : 2;
        $wardList = Ward::where('district_id', $district_id)->get();       

        $areaList = Area::all();

        return view('backend.product.create', compact('estateTypeArr',   'estate_type_id', 'type', 'district_id', 'districtList', 'wardList', 'cityList', 'priceUnitList', 'tagArr', 'city_id'));
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
            'type' => 'required',
            'estate_type_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',            
            'ward_id' => 'required',     
            'title_vi' => 'required',
            'title_en' => 'required',                        
            'price' => 'required|numeric',            
            'area' => 'required|numeric',
            'contact_phone' => 'required',
        ],
        [            
            'estate_type_id.required' => 'Bạn chưa chọn loại bất động sản',
            'district_id.required' => 'Bạn chưa chọn quận',
            'ward_id.required' => 'Bạn chưa chọn phường',
            'title.required' => 'Bạn chưa nhập tiêu đề',            
            'price.required' => 'Bạn chưa nhập giá',
            'price.numeric' => 'Bạn nhập giá không hợp lệ',            
            'area.required' => 'Bạn chưa nhập diện tích',
            'contact_phone.required' => 'Bạn chưa nhập điện thoại liên hệ',            
            'contact_mobile.required' => 'Bạn chưa nhập số di động liên hệ'
        ]);
           
        

        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;  
        $dataArr['status'] = 1;
        $dataArr['slug_vi'] = str_slug($dataArr['title_vi']);
        $dataArr['slug_en'] = str_slug($dataArr['title_en']);

        $dataArr['alias_vi'] = str_slug($dataArr['title_vi'], " ");
        $dataArr['alias_en'] = str_slug($dataArr['title_en'], " ");


        $dataArr['created_user'] = auth('backend')->user()->id;
        $dataArr['updated_user'] = auth('backend')->user()->id;              
        
        if($dataArr['price_id'] == ''){
            $dataArr['price_id'] = Helper::getPriceId($dataArr['price'], $dataArr['price_unit_id'], $dataArr['type']);
        }

        if($dataArr['area_id'] == ''){
            $dataArr['area_id'] = Helper::getAreaId($dataArr['area']);   
        }
        $rs = Product::create($dataArr);

        $product_id = $rs->id;
        

        $this->storeImage( $product_id, $dataArr);
        $this->storeMeta($product_id, 0, $dataArr);
        $this->processRelation($dataArr, $product_id);
        Session::flash('message', 'Tạo mới tin thành công');

        return redirect()->route('product.index', ['estate_type_id' => $dataArr['estate_type_id'], 'type' => $dataArr['type'], 'city_id' => $dataArr['city_id']]);
    }
    private function processRelation($dataArr, $object_id, $type = 'add'){
    
        if( $type == 'edit'){
          
            TagObjects::deleteTags( $object_id, 1);
            TagObjects::deleteTags( $object_id, 3);

        }
        // xu ly tags
        if( !empty( $dataArr['tags'] ) && $object_id ){
            foreach ($dataArr['tags'] as $tag_id) {
                TagObjects::create(['object_id' => $object_id, 'tag_id' => $tag_id, 'type' => 1]);
            }
        }

        // xu ly tien ich
        if( !empty( $dataArr['tien_ich'] ) && $object_id ){
            foreach ($dataArr['tien_ich'] as $tag_id) {
                TagObjects::create(['object_id' => $object_id, 'tag_id' => $tag_id, 'type' => 3]);
            }
        }
      
    }
    public function storeMeta( $id, $meta_id, $dataArr ){
       
        $arrData = [
            'title_vi' => $dataArr['meta_title_vi'], 
            'description_vi' => $dataArr['meta_description_vi'], 
            'keywords_vi'=> $dataArr['meta_keywords_vi'], 
            'custom_text_vi' => $dataArr['custom_text_vi'], 
            'title_en' => $dataArr['meta_title_en'], 
            'description_en' => $dataArr['meta_description_en'], 
            'keywords_en'=> $dataArr['meta_keywords_en'], 
            'custom_text_en' => $dataArr['custom_text_en'], 
            'updated_user' => auth('backend')->user()->id
        ];
        if( $meta_id == 0){
            $arrData['created_user'] = auth('backend')->user()->id;   
            $rs = MetaData::create( $arrData );
            $meta_id = $rs->id;            
            $modelSp = Articles::find( $id );
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
        $hinhXoaArr = ProductImg::where('product_id', $id)->whereNotIn('id', $imageIdArr)->lists('id');
        if( $hinhXoaArr )
        {
            foreach ($hinhXoaArr as $image_id_xoa) {
                $model = ProductImg::find($image_id_xoa);
                $urlXoa = config('nhadat.upload_path')."/".$model->image_url;
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
                    
                    $origin_img = base_path().$image_url;
                    if( $image_url ){

                        $imageArr['is_thumbnail'][] = $is_thumbnail = $dataArr['thumbnail_id'] == $image_url  ? 1 : 0;

                        $img = Image::make($origin_img);
                        $w_img = $img->width();
                        $h_img = $img->height();

                        $tmpArrImg = explode('/', $origin_img);
                        
                        $new_img = config('nhadat.upload_thumbs_path').end($tmpArrImg);
                       
                        if($w_img/$h_img > 363/206){

                            Image::make($origin_img)->resize(null, 206, function ($constraint) {
                                    $constraint->aspectRatio();
                            })->crop(363, 206)->save($new_img);
                        }else{
                            Image::make($origin_img)->resize(363, null, function ($constraint) {
                                    $constraint->aspectRatio();
                            })->crop(363, 206)->save($new_img);
                        }  

                        if($w_img/$h_img > 240/240){

                            Image::make($origin_img)->resize(null, 240, function ($constraint) {
                                    $constraint->aspectRatio();
                            })->crop(240, 240)->save($new_img);
                        }else{
                            Image::make($origin_img)->resize(240, null, function ($constraint) {
                                    $constraint->aspectRatio();
                            })->crop(240, 240)->save($new_img);
                        }                         

                        $imageArr['name'][] = $image_url;
                        
                    }
                }
            }
            if( !empty($imageArr['name']) ){
                foreach ($imageArr['name'] as $key => $name) {
                    $rs = ProductImg::create(['product_id' => $id, 'image_url' => $name, 'display_order' => 1]);                
                    $image_id = $rs->id;
                    if( $imageArr['is_thumbnail'][$key] == 1){
                        $thumbnail_id = $image_id;
                    }
                }
            }
            $model = Product::find( $id );
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
        $tagArr = Tag::where('type', 1)->get();
        $hinhArr = (object) [];
        $detail = Product::find($id);
       // var_dump($detail->type);die;
        $hinhArr = ProductImg::where('product_id', $id)->lists('image_url', 'id');     
        $estateTypeArr = EstateType::where('type', $detail->type)->get();
        $priceList = Price::where('type', $detail->type)->get();
        $estate_type_id = $detail->estate_type_id;             
        $detailEstate = EstateType::find($estate_type_id);
       
        $meta = (object) [];
        if ( $detail->meta_id > 0){
            $meta = MetaData::find( $detail->meta_id );
        }               
        $priceUnitList = PriceUnit::all();
        $districtList = District::where('city_id', 1)->where('status', 1)->get();
       // var_dump($detail->district_id);die;
        $wardList = Ward::where('district_id', $detail->district_id)->get();
        $streetList = Street::where('district_id', $detail->district_id)->get();
        $projectList = Project::where('district_id', $detail->district_id)->get();

        $tagSelected = Product::productTag($id);
        $tienIchSelected = Product::productTienIch($id);
        
        $tienIchLists = Tag::where(['type' => 3])->get();
        $directionArr = Direction::all();
        $areaList = Area::all();
        return view('backend.product.edit', compact( 'detail', 'hinhArr', 'estateTypeArr',  'meta', 'priceUnitList', 'districtList', 'wardList', 'streetList','projectList', 'detailEstate', 'tagSelected', 'tagArr', 'tienIchLists', 'tienIchSelected', 'directionArr', 'areaList', 'priceList'));
    }
    public function ajaxDetail(Request $request)
    {       
        $id = $request->id;
        $detail = Product::find($id);
        return view('backend.product.ajax-detail', compact( 'detail' ));
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
            'type' => 'required',
            'estate_type_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',            
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric',
            'price_unit_id' => 'required',
            'area' => 'required|numeric',
            'contact_name' => 'required',
            'contact_mobile' => 'required'
        ],
        [            
            'estate_type_id.required' => 'Bạn chưa chọn loại bất động sản',
            'district_id.required' => 'Bạn chưa chọn quận',
            'ward_id.required' => 'Bạn chưa chọn phường',
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'slug.required' => 'Bạn chưa nhập slug',
            'price.required' => 'Bạn chưa nhập giá',
            'price.numeric' => 'Bạn nhập giá không hợp lệ',
            'price_unit_id.required' => 'Bạn chưa chọn đơn vị giá',            
            'area.required' => 'Bạn chưa nhập diện tích',
            'contact_name.required' => 'Bạn chưa nhập tên liên hệ',            
            'contact_mobile.required' => 'Bạn chưa nhập số di động liên hệ'
        ]);
                  
        $dataArr['slug_vi'] = str_slug($dataArr['title_vi']);
        $dataArr['slug_en'] = str_slug($dataArr['title_en']);

        $dataArr['alias_vi'] = str_slug($dataArr['title_vi'], " ");
        $dataArr['alias_en'] = str_slug($dataArr['title_en'], " ");

        $dataArr['is_hot'] = isset($dataArr['is_hot']) ? 1 : 0;  
        
        if($dataArr['price_id'] == ''){
            $dataArr['price_id'] = Helper::getPriceId($dataArr['price'], $dataArr['price_unit_id'], $dataArr['type']);
            //var_dump($dataArr['price_id']);die;
        }

        if($dataArr['area_id'] == ''){
            $dataArr['area_id'] = Helper::getAreaId($dataArr['area']);   
        }
        $model = Product::find($dataArr['id']);

        $model->update($dataArr);
        
        $product_id = $dataArr['id'];
        
        $this->storeMeta( $product_id, $dataArr['meta_id'], $dataArr);
        $this->storeImage( $product_id, $dataArr);
        $this->processRelation($dataArr, $product_id, 'edit');

        Session::flash('message', 'Chỉnh sửa thành công');

        return redirect()->route('product.edit', $product_id);
        
    }
    public function ajaxSaveInfo(Request $request){
        
        $dataArr = $request->all();

        $dataArr['alias'] = Helper::stripUnicode($dataArr['name']);
        
        $dataArr['updated_user'] = auth('backend')->user()->id;
        
        $model = Product::find($dataArr['id']);

        $model->update($dataArr);
        
        $product_id = $dataArr['id'];        

        Session::flash('message', 'Chỉnh sửa thành công');

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
        $model = Product::find($id);        
        $model->delete();
        ProductImg::where('product_id', $id)->delete();
        TagObjects::deleteTags( $id, 1);
        TagObjects::deleteTags( $id, 3);
        // redirect
        Session::flash('message', 'Xóa thành công');
        
        return redirect(URL::previous());//->route('product.short');
        
    }
}
