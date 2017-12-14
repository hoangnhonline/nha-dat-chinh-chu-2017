<?php
namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function create(Request $request)
    {
        if (!check_permission_estate(auth('web')->user()->group_id, 'add')) {
            abort(404);
        }

        $modelArticleCate = new ArticlesCate();
        $arrListCate = $modelArticleCate->getByAttributes([
            'status' => 1
        ], 'display_order', 'asc');

        return view('frontend.member.news.create', compact('arrListCate'));
    }

    public function store(Request $request)
    {
        if (!check_permission(auth('web')->user()->group_id, 'news', 'add')) {
            abort(404);
        }

        $this->validate($request, [
            'cate_id' => 'required',
            'title' => 'required|max:250',
            'description' => 'required|max:1000',
            'content' => 'required',
            'image_url' => 'required',
        ], [
            'cate_id.required' => 'Vui lòng chọn danh mục.',
            'title.required' => 'Vui lòng nhập tiêu đề.',
            'title.max' => 'Tiêu đề không được nhiều hơn :max ký tự.',
            'description.required' => 'Vui lòng nhập mô tả.',
            'description.max' => 'Mô tả không được nhiều hơn :max ký tự.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'image_url.required' => 'Bạn phải up ít nhất một hình ảnh để làm hình đại diện của tin tức.',
        ]);

        $modelArticle = new Articles();

        $arrParams = [
            'slug' => str_slug($request->title),
            'alias' => str_slug($request->title),
            'cate_id' => $request->cate_id,
            'image_url' => $request->image_url,
            'meta_id' => 0,
            'is_hot' => 0,
            'status' => 0,
            'display_order' => 0,
            'created_user' => auth('web')->user()->id,
            'updated_user' => auth('web')->user()->id,
        ];

        foreach (config('laravellocalization.supportedLocales') as $language => $data) {
            $arrParams['title_' . $language] = $request->title;
            $arrParams['description_' . $language] = $request->description;
            $arrParams['content_' . $language] = $request->{'content'};
        }

        $modelArticle->create($arrParams);

        Session::flash('message', 'Tạo mới thành công.');

        return redirect(route('member.news.create'));
    }
}
