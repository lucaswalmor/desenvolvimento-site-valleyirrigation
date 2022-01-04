<?php

namespace App\Classes\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolesDefautPermissions extends Model
{
    use SoftDeletes;

    protected $table = 'role_default_permissions';

    protected $dates =  [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'id_typeUser', 'id_module', 'options', 'permissions'
    ];
}

?>