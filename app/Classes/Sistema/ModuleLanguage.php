<?php
namespace App\Classes\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleLanguage extends Model
{
    use SoftDeletes;

    protected $table = 'module_language';

    protected $dates =  [
        'deleted_at', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'id_module', 'id_language', 'description',
    ];
}

?>