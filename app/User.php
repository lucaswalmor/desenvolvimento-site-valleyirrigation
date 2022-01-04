<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Classes\Sistema\ModulePermissions;
use App\Classes\Sistema\RolesDefautPermissions;
use App\Classes\Sistema\TypeUserPermissions;
use App\Classes\Sistema\UserPermissions;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cidade', 'estado', 'pais', 'rua', 'cep', 'telefone', 'configuracao_idioma', 'tipo_usuario', 'email', 'password', 'situacao', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates =  ['deleted_at'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getListaDePapeis()
    {
        $papeis = [
            ['chave'=>'0','valor'=>'usuarios.administrador'],
            ['chave'=>'1','valor'=>'usuarios.gerente'],
            ['chave'=>'2','valor'=>'usuarios.supervisor'],
            ['chave'=>'3','valor'=>'usuarios.consultor'],
            ['chave'=>'4','valor'=>'usuarios.assistente'],
        ];
        return $papeis;
    }

    public static function getListaDeIdiomas()
    {
        $idiomas = [
            ['chave'=>'0','valor'=>'pt-br'],
            ['chave'=>'1','valor'=>'en'],
            ['chave'=>'2','valor'=>'es']
        ];
        return $idiomas;
    }

    public static function validaEmail($email, $id = null)
    {
        $user = User::select('id')->where('email', $email)->first();
        if(empty($user)){
            return true;
        }else if($id != null && $user['id'] == $id){
            return true;
        }else{
            return false;
        }
    }

    public static function verificarUserAtivo($email)
    {
        $user = User::select('situacao')->where('email', $email)->first();
        if(empty($user) || $user['situacao'] == 0 ){
            return false;
        }else{
            return true;
        }
    }
    
    public static function getUserModulePermission($id, $module)
    {
        $user_id = $id;
        $catchModule = $module;

        $typeUserPermission = TypeUserPermissions::select('name')->where('id', $user_id)->get();
        $modulePermissionTry = ModulePermissions::select('name')->where('name', $catchModule)->get();

        return $modulePermissionTry;
        return $typeUserPermission;
    }

    public static function getListModulesPermissions()
    {
        $user_id = Auth::user()->id;
        $userPermission = UserPermissions::select('module_permissions.name', 'user_permissions.permissions')
            ->join('module_permissions', 'module_permissions.id', '=', 'user_permissions.id_module')
            ->where('user_permissions.id_user', $user_id)
            ->where('user_permissions.permissions', '!=', '0')
            ->get();

            // dump($user_id);
            // dump($userPermission);

        $list = array();

        $list[] = array(
            'name' => "*",
            'permissions' => "0"
        );
        
        for ($i = 0; $i < count($userPermission); $i++) {
            $list[] = array(
                'name' => $userPermission[$i]['name'],
                'permissions' => $userPermission[$i]['permissions']
            );
        }
        //dd($list);

        return $list;
    }
}
