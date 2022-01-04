<?php

namespace App\Classes\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermissions extends Model
{
    use SoftDeletes;

    protected $table = 'user_permissions';

    protected $dates =  [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'id_user', 'id_module', 'permissions'
    ];
}

?>