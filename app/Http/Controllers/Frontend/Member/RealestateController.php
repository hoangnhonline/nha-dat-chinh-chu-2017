<?php
namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RealestateController extends Controller
{
    public $modelUsers;
    public $modelCity;
    public $modelProduct;
    public $modelProductImg;

    public function __construct()
    {
        $this->modelUsers = new Users();
        $this->modelCity = new City();
        $this->modelProduct = new Product();
        $this->modelProductImg = new ProductImg();
    }

    public function index(Request $request)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'view')) {
            return view('frontend.member.nopermission');
        }

        $page = isset($request->page) ? $request->page : 1;
        $item = 12;

        $arrStatus = [];
        if (check_permission_estate(auth('web')->user()->group_id, 'active')) {
            $arrStatus[] = 1;
        }
        if (check_permission_estate(auth('web')->user()->group_id, 'inactive')) {
            $arrStatus[] = 0;
        }

        $arrListProduct = $this->modelProduct->getByAttributes([
            'status' => $arrStatus,
            'created_user' => auth('web')->user()->id
        ], 'display_order', 'asc', ['page' => $page, 'item' => $item]);

        if ($arrListProduct->total() > 0) {
            $maxPage = ceil($arrListProduct->total() / $item);
            if ($maxPage < $page) {
                return redirect(route('member.realestate.index', ['page' => $maxPage]));
            }
        }
        $pagination = $arrListProduct->appends([
            'page' => $page
        ])->links();

        return view('frontend.member.realestate.index', compact('arrListProduct', 'pagination'));
    }

    public function create(Request $request)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'add')) {
            return view('frontend.member.nopermission');
        }

        $arrListCate = $this->modelUsers->getCategoryByMember(auth('web')->user()->group_id, 'add');

        $arrListCity = $this->modelCity->getByAttributes([
            'name' => ['<>', '']
        ], 'display_order', 'desc');

        return view('frontend.member.realestate.create', compact('arrListCate','arrListCity'));
    }

    public function store(Request $request)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'add')) {
            return view('frontend.member.nopermission');
        }

        $this->validate($request, [
            'cate_id' => 'required',
            'type' => 'required',
            'estate_type_id' => 'required',
            'price' => 'required',
            'street_num' => 'required',
            'street_name' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ], [
            'cate_id.required' => 'Vui lòng chọn danh mục.',
            'type.required' => 'Vui lòng chọn loại giao dịch.',
            'estate_type_id.required' => 'Vui lòng chọn loại bất động sản.',
            'price.required' => 'Vui lòng nhập giá.',
            'street_num.required' => 'Vui lòng nhập địa chỉ.',
            'street_name.required' => 'Vui lòng nhập tên đường.',
            'city_id.required' => 'Vui lòng chọn thành phố.',
            'district_id.required' => 'Vui lòng chọn quận.',
            'ward_id.required' => 'Vui lòng chọn phường.',
            'description.required' => 'Vui lòng nhập mô tả thêm bất động sản.',
            'image_url.required' => 'Bạn phải up ít nhất một hình ảnh cho bất động sản.',
        ]);

        $arrParams = [
            'type' => $request->type,
            'estate_type_id' => $request->estate_type_id,
            'price' => $request->price,
            'street_num' => $request->street_num,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'longt' => $request->longt,
            'latt' => $request->latt,
            'created_user' => auth('web')->user()->id,
            'updated_user' => auth('web')->user()->id,
        ];

        foreach (config('laravellocalization.supportedLocales') as $language => $data) {
            $arrParams['street_name_' . $language] = $request->street_name;
            $arrParams['description_' . $language] = $request->description;
        }

        $productInfo = $this->modelProduct->create($arrParams);

        $arrImage = $request->image_url;
        $thumbnail = $arrImage[0];
        foreach ($request->image_url as $order => $image_url) {
            $this->modelProductImg->create([
                'product_id' => $productInfo->id,
                'image_url' => $image_url,
                'display_order' => $order + 1
            ]);

            if (isset($request->thumbnail) && $request->thumbnail == $image_url) {
                $thumbnail = $image_url;
            }
        }

        $productInfo->update([
            'image_url' => $thumbnail
        ]);

        Session::flash('message', 'Tạo mới thành công.');

        return redirect(route('member.realestate.index'));
    }

    public function edit($id)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'edit')) {
            return view('frontend.member.nopermission');
        }

        $productInfo = $this->modelProduct->find($id);
        if (!$productInfo || $productInfo->created_user != auth('web')->user()->id) {
            abort(404);
        }

        $arrListCate = $this->modelUsers->getCategoryByMember(auth('web')->user()->group_id, 'add');

        $arrListCity = $this->modelCity->getByAttributes([
            'name' => ['<>', '']
        ], 'display_order', 'desc');

        return view('frontend.member.realestate.edit', compact('arrListCate','arrListCity', 'productInfo'));
    }

    public function update(Request $request, $id)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'edit')) {
            return view('frontend.member.nopermission');
        }

        $productInfo = $this->modelProduct->find($id);
        if (!$productInfo || $productInfo->created_user != auth('web')->user()->id) {
            abort(404);
        }

        $this->validate($request, [
            'cate_id' => 'required',
            'type' => 'required',
            'estate_type_id' => 'required',
            'price' => 'required',
            'street_num' => 'required',
            'street_name' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'description' => 'required',
            'image_url' => 'required',
        ], [
            'cate_id.required' => 'Vui lòng chọn danh mục.',
            'type.required' => 'Vui lòng chọn loại giao dịch.',
            'estate_type_id.required' => 'Vui lòng chọn loại bất động sản.',
            'price.required' => 'Vui lòng nhập giá.',
            'street_num.required' => 'Vui lòng nhập địa chỉ.',
            'street_name.required' => 'Vui lòng nhập tên đường.',
            'city_id.required' => 'Vui lòng chọn thành phố.',
            'district_id.required' => 'Vui lòng chọn quận.',
            'ward_id.required' => 'Vui lòng chọn phường.',
            'description.required' => 'Vui lòng nhập mô tả thêm bất động sản.',
            'image_url.required' => 'Bạn phải up ít nhất một hình ảnh cho bất động sản.',
        ]);

        $arrParams = [
            'type' => $request->type,
            'estate_type_id' => $request->estate_type_id,
            'price' => $request->price,
            'street_num' => $request->street_num,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'ward_id' => $request->ward_id,
            'longt' => $request->longt,
            'latt' => $request->latt,
            'updated_user' => auth('web')->user()->id,
        ];

        foreach (config('laravellocalization.supportedLocales') as $language => $data) {
            $arrParams['street_name_' . $language] = $request->street_name;
            $arrParams['description_' . $language] = $request->description;
        }


        $arrImage = $request->image_url;
        $thumbnail = $arrImage[0];

        $this->modelProductImg->forceDeleteByAttributes([
            'product_id' => $productInfo->id
        ]);

        foreach ($request->image_url as $order => $image_url) {
            $this->modelProductImg->create([
                'product_id' => $productInfo->id,
                'image_url' => $image_url,
                'display_order' => $order + 1
            ]);

            if (isset($request->thumbnail) && $request->thumbnail == $image_url) {
                $thumbnail = $image_url;
            }
        }

        $arrParams['image_url'] = $thumbnail;
        $productInfo->update($arrParams);

        Session::flash('message', 'Chỉnh sửa thành công.');

        return redirect(route('member.realestate.index'));
    }
}
