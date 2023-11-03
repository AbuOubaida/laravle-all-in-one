<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class UserPermission extends Model
{
    use HasFactory;
    protected $table = 'permission_user';
    protected $fillable = ['permission_id','permission_name','user_id','user_type'];

    public function users()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
