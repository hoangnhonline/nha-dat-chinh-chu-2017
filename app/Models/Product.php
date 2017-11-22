<?php namespace App\Models;

use App\Models\Traits\BasicBehavior;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use BasicBehavior;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_vi',
        'title_en',
        'slug',
        'description_vi',
        'description_en',
        'type',
        'thumbnail_id',
        'cate_id',
        'estate_type_id',
        'city_id',
        'district_id',
        'ward_id',
        'street_num',
        'street_name_vi',
        'street_name_en',
        'project_id',
        'price',
        'price_unit_id',
        'area_vi',
        'area_en',
        'full_address_vi',
        'full_address_en',
        'front_face_vi',
        'front_face_en',
        'street_wide_vi',
        'street_wide_en',
        'no_floor',
        'no_room',
        'direction_id',
        'no_wc',
        'image_url',
        'video_url',
        'contact_name_vi',
        'contact_name_en',
        'contact_address_vi',
        'contact_address_en',
        'contact_phone_vi',
        'contact_phone_en',
        'contact_mobile_vi',
        'contact_mobile_en',
        'contact_email_vi',
        'contact_email_en',
        'url_dothi',
        'price_id',
        'area_id',
        'longt',
        'latt',
        'status',
        'is_hot',
        'display_order',
        'cart_status',
        'meta_id',
        'created_user',
        'updated_user',
        'customer_id'
    ];

    public static function getList($params = [])
    {
        $query = self::where('status', 1);
        if (isset($params['parent_id']) && $params['parent_id']) {
            $query->where('parent_id', $params['parent_id']);
        }
        if (isset($params['cate_id']) && $params['cate_id']) {
            $query->where('cate_id', $params['cate_id']);
        }
        if (isset($params['is_hot']) && $params['is_hot']) {
            $query->where('is_hot', $params['is_hot']);
        }
        if (isset($params['is_sale']) && $params['is_sale']) {
            $query->where('is_sale', $params['is_sale']);
        }
        if (isset($params['is_new']) && $params['is_new']) {
            $query->where('is_new', $params['is_new']);
        }
        $query->leftJoin('product_img', 'product_img.id', '=', 'product.thumbnail_id')
            ->select('product_img.image_url', 'product.*');
        $query->orderBy('product.is_hot', 'desc')->orderBy('product.id', 'desc');
        if (isset($params['limit']) && $params['limit']) {
            return $query->limit($params['limit'])->get();
        }
        if (isset($params['pagination']) && $params['pagination']) {
            return $query->paginate($params['pagination']);
        }
    }

    public static function productTag($id)
    {
        $arr = [];
        $rs = TagObjects::where(['type' => 1, 'object_id' => $id])->lists('tag_id');
        if ($rs) {
            $arr = $rs->toArray();
        }
        return $arr;
    }

    public static function productTienIch($id)
    {
        $arr = [];
        $rs = TagObjects::where(['type' => 3, 'object_id' => $id])->lists('tag_id');
        if ($rs) {
            $arr = $rs->toArray();
        }
        return $arr;
    }

    public static function productTienIchName($id)
    {
        $arr = [];
        $rs = TagObjects::where(['tag_objects.type' => 3, 'tag_objects.object_id' => $id])
            ->join('tag', 'tag.id', '=', 'tag_objects.tag_id')
            ->select('tag.*')->get();
        if ($rs) {
            $arr = $rs->toArray();
        }
        return $arr;
    }

    public static function getListTag($id)
    {
        $query = TagObjects::where(['object_id' => $id, 'tag_objects.type' => 1])
            ->join('tag', 'tag.id', '=', 'tag_objects.tag_id')
            ->get();
        return $query;
    }

}
