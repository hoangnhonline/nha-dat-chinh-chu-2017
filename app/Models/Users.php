<?php namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\BasicBehavior;
use Illuminate\Support\Facades\DB;

class Users extends Authenticatable
{

    use BasicBehavior;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'full_name',
        'username',
        'email',
        'phone',
        'address',
        'avatar',
        'password',
        'type',
        'role',
        'leader_id',
        'group_id',
        'status',
        'changed_password',
        'remember_token',
        'created_user',
        'updated_user'
    ];

    public function getCategoryByMember($group_id, $role)
    {
        $arrModule = [];

        foreach (['realestate_owner', 'realestate_hot', 'realestate_project', 'realestate_member', 'realestate_newest'] as $module) {
            if (check_permission($group_id, $module, $role)) {
                $arrModule[] = $module;
            }
        }

        if (!empty($arrModule)) {
            $query = DB::table('modules')
                ->select('cate.*')
                ->join('cate', 'cate.id', '=', 'modules.cate_related')
                ->where('cate.status', '=', '1')
                ->whereIn('modules.code', $arrModule);

            return $query->get();
        }

        return null;
    }

}