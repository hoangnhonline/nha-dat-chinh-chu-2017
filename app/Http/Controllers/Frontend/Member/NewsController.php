<?php
namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\ArticlesCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public $modelArticle;
    public $modelArticleCate;

    public function __construct()
    {
        $this->modelArticle = new Articles();
        $this->modelArticleCate = new ArticlesCate();
    }

    public function index(Request $request)
    {
        if (!check_permission(auth('web')->user()->group_id, 'news', 'view')) {
            return view('frontend.member.nopermission');
        }

        $page = isset($request->page) ? $request->page : 1;
        $item = 12;

        $arrStatus = [];
        if (check_permission(auth('web')->user()->group_id, 'news', 'active')) {
            $arrStatus[] = 1;
        }
        if (check_permission(auth('web')->user()->group_id, 'news', 'inactive')) {
            $arrStatus[] = 0;
        }

        $arrListArticle = $this->modelArticle->getByAttributes([
            'status' => $arrStatus,
            'created_user' => auth('web')->user()->id
        ], 'display_order', 'asc', ['page' => $page, 'item' => $item]);

        if ($arrListArticle->total() > 0) {
            $maxPage = ceil($arrListArticle->total() / $item);
            if ($maxPage < $page) {
                return redirect(route('member.news.index', ['page' => $maxPage]));
            }
        }
        $pagination = $arrListArticle->appends([
            'page' => $page
        ])->links();

        return view('frontend.member.news.index', compact('arrListArticle', 'pagination'));
    }

    public function create(Request $request)
    {
        if (!check_permission(auth('web')->user()->group_id, 'news', 'add')) {
            return view('frontend.member.nopermission');
        }

        $arrListCate = $this->modelArticleCate->getByAttributes([
            'status' => 1
        ], 'display_order', 'asc');

        return view('frontend.member.news.create', compact('arrListCate'));
    }

    public function store(Request $request)
    {
        if (!check_permission(auth('web')->user()->group_id, 'news', 'add')) {
            return view('frontend.member.nopermission');
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

        $this->modelArticle->create($arrParams);

        Session::flash('message', 'Tạo mới thành công.');

        return redirect(route('member.news.index'));
    }

    public function edit($id)
    {
        if (!check_permission(auth('web')->user()->group_id, 'news', 'edit')) {
            return view('frontend.member.nopermission');
        }

        $articleInfo = $this->modelArticle->find($id);
        if (!$articleInfo || $articleInfo->created_user != auth('web')->user()->id) {
            abort(404);
        }

        $arrListCate = $this->modelArticleCate->getByAttributes([
            'status' => 1
        ], 'display_order', 'asc');

        return view('frontend.member.news.edit', compact('arrListCate', 'articleInfo'));
    }

    public function update(Request $request, $id)
    {
        if (!check_permission(auth('web')->user()->group_id, 'news', 'edit')) {
            return view('frontend.member.nopermission');
        }

        $articleInfo = $this->modelArticle->find($id);
        if (!$articleInfo || $articleInfo->created_user != auth('web')->user()->id) {
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

        $arrParams = [
            'slug' => str_slug($request->title),
            'alias' => str_slug($request->title),
            'cate_id' => $request->cate_id,
            'image_url' => $request->image_url,
            'status' => 0,
            'updated_user' => auth('web')->user()->id,
        ];

        foreach (config('laravellocalization.supportedLocales') as $language => $data) {
            $arrParams['title_' . $language] = $request->title;
            $arrParams['description_' . $language] = $request->description;
            $arrParams['content_' . $language] = $request->{'content'};
        }

        $articleInfo->update($arrParams);

        Session::flash('message', 'Chỉnh sửa thành công.');

        return redirect(route('member.news.index'));
    }
}
