<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model  {

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
                            'title', 
                            'slug', 
                            'description', 
                            'type', 
                            'cate_id',
                            'estate_type_id', 
                            'city_id', 
                            'district_id', 
                            'ward_id', 
                            'street_id', 
                            'project_id', 
                            'price',
                            'price_unit_id', 
                            'area', 
                            'full_address', 
                            'front_face', 
                            'street_wide',
                            'no_floor', 
                            'no_room', 
                            'direction_id',      
                            'no_wc',
                            'image_url', 
                            'video_url', 
                            'contact_name', 
                            'contact_address', 
                            'contact_phone',
                            'contact_mobile', 
                            'contact_email', 
                            'url_dothi', 
                            'status', 
                            'meta_id',
                            'customer_id',
                            'thumbnail_id',
                            'cart_status',
                            'longt',
                            'latt',
                            'price_id',
                            'area_id',
                            'is_hot',
                            'display_order',
                            'created_user',
                            'updated_user'
                        ];

    public static function getList($params = []){
        $query = self::where('status', 1);
        if( isset($params['parent_id']) && $params['parent_id'] ){
            $query->where('parent_id', $params['parent_id']);
        }
        if( isset($params['cate_id']) && $params['cate_id'] ){
            $query->where('cate_id', $params['cate_id']);
        }
        if( isset($params['is_hot']) && $params['is_hot'] ){
            $query->where('is_hot', $params['is_hot']);
        }
        if( isset($params['is_sale']) && $params['is_sale'] ){
            $query->where('is_sale', $params['is_sale']);
        }
        if( isset($params['is_new']) && $params['is_new'] ){
            $query->where('is_new', $params['is_new']);
        }
        $query->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')            
                            ->select('product_img.image_url', 'product.*');
        $query->orderBy('product.is_hot', 'desc')->orderBy('product.id', 'desc');
        if(isset($params['limit']) && $params['limit']){
            return $query->limit($params['limit'])->get();
        }
        if(isset($params['pagination']) && $params['pagination']){
            return $query->paginate($params['pagination']);
        }                
    }
    public static function productTag( $id )
    {
        $arr = [];
        $rs = TagObjects::where( ['type' => 1, 'object_id' => $id] )->lists('tag_id');
        if( $rs ){
            $arr = $rs->toArray();
        }
        return $arr;
    }
    public static function productTienIch( $id )
    {
        $arr = [];
        $rs = TagObjects::where( ['type' => 3, 'object_id' => $id] )->lists('tag_id');
        if( $rs ){
            $arr = $rs->toArray();
        }
        return $arr;
    }
    public static function productTienIchName( $id )
    {
        $arr = [];
        $rs = TagObjects::where( ['tag_objects.type' => 3, 'tag_objects.object_id' => $id] )
            ->join('tag', 'tag.id', '=', 'tag_objects.tag_id')
            ->select('tag.*')->get();
        if( $rs ){
            $arr = $rs->toArray();
        }
        return $arr;
    }
    public static function getListTag($id){
        $query = TagObjects::where(['object_id' => $id, 'tag_objects.type' => 1])
            ->join('tag', 'tag.id', '=', 'tag_objects.tag_id')            
            ->get();
        return $query;
   }
    
}
