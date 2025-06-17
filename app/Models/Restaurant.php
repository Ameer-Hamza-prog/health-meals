<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // لتسهيل التعامل كمستخدم
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_name',
        'email',
        'phone',
        'address',
        'license_path',
        'diet_id',
        'username',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    // علاقة المطعم بالنظام الغذائي
    public function diet()
    {
        return $this->belongsTo(Diet::class);
    }
}
