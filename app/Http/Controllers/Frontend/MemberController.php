<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductImg;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.member.index');
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:200',
            'address' => 'max:500',
            'phone' => 'regex:[^([\+1-9]{3})?([0])?([1,9,8])([0-9]{8,9})$]',
            'new_password' => 'between:6,20|regex:[((?=.*\d).{6,20})]'
        ], [
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'address.max' => 'Địa chỉ không được dài hơn :max ký tự.',
            'phone.regex' => 'Số điện th mac oại không hợp lệ.',
            'new_password.between' => 'Mật khẩu mới phải nằm trong khoảng từ :min đến :max ký tự.',
            'new_password.regex' => 'Mật khẩu mới không hợp lệ.'
        ]);

        $userInfo = auth('web')->user();
        $params = [
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ];

        if (!empty($request->new_password)) {
            $params['password'] = bcrypt($request->new_password);
        }

        $userInfo->update($params);

        return redirect(route('member.detail'));
    }

    public function registerLand(Request $request)
    {
        if ($request->isMethod('get')) {
            $modelCity = new City();
            $arrListCity = $modelCity->getByAttributes([
                'name' => ['<>', '']
            ], 'display_order', 'desc');

            return view('frontend.member.register_land', compact('arrListCity'));
        } else {
            $this->validate($request, [
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

            $modelProduct = new Product();
            $modelProductImage = new ProductImg();

            $arrParams = [
                'type' => $request->type,
                'estate_type_id' => $request->estate_type_id,
                'price' => $request->price,
                'street_num' => $request->street_num,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id,
                'created_user' => auth('web')->user()->id,
                'updated_user' => auth('web')->user()->id,
            ];

            foreach (config('laravellocalization.supportedLocales') as $language => $data) {
                $arrParams['street_name_' . $language] = $request->street_name;
                $arrParams['description_' . $language] = strip_tags($request->description);
            }

            $productInfo = $modelProduct->create($arrParams);

            $arrImage = $request->image_url;
            $thumbnail = $arrImage[0];
            foreach ($request->image_url as $order => $image_url) {
                $modelProductImage->create([
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

            return redirect(route('member.detail'));
        }
    }
}
