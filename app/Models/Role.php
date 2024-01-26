<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
   protected  $fillable = ['name'];
    public function users(){
        return $this->hasMany(User::class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
