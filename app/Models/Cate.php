<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cate';

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
        'name_vi',
        'name_en',
        'alias',
        'slug',
        'description_vi',
        'description_en',
        'display_order',
        'meta_id',
        'status',
        'created_user',
        'updated_user'
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'cate_id');
    }
}
