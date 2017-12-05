<?php
namespace App\Models;

use App\Models\Traits\BasicBehavior;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{

    use BasicBehavior;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';

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
        'code',
        'name',
        'cate_related'
    ];

}