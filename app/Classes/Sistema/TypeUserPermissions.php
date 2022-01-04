<?php

namespace App\Classes\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeUserPermissions extends Model
{
    use SoftDeletes;

    protected $table = 'type_user_permissions';

    protected $dates =  [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'id', 'name'
    ];
}

?>