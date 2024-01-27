<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'users_roles','user_id','role_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'roles_permission','permission_id','role_id');
    }
}
