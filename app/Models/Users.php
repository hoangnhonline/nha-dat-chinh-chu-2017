<?php namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\BasicBehavior;

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
        'password',
        'role',
        'leader_id',
        'group_id',
        'status',
        'changed_password',
        'remember_token',
        'created_user',
        'updated_user'
    ];

}