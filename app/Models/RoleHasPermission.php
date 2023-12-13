<?php

namespace App\Models;

use App\Models\Rale;
use App\Models\Parmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleHasPermission extends Model
{
    use HasFactory;
    protected $fillable = ['role_id','permission_id'];
    // protected $primaryKey = ['role_id', 'permission_id'];
    public function role()
    {
        return $this->belongsTo(Rale::class, 'role_id');
    }

    public function permission()
    {
        return $this->belongsTo(Parmission::class, 'permission_id');
    }
}
