<?php
namespace App\Models;

use App\Models\Traits\BasicBehavior;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use BasicBehavior;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

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
        'description_vi',
        'description_en',
        'type',
        'permission',
        'display_order',
        'package_title_vi',
        'package_title_en',
        'package_type',
        'package_amount',
        'package_time',
        'status',
        'created_user',
        'updated_user',
    ];

    public function getPermission($group_id)
    {
        $data = $this->findByAttributes([
            'id' => $group_id,
            'status' => 1
        ]);

        if ($data) {
            return json_decode($data->permission, true);
        }

        return [];
    }
}