<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    protected $fillable = [
        'name',
        'description',
        'calories',
        'status',
    ];

    public $timestamps = true;

    /**
     * العلاقة مع المطاعم التابعة لهذا النظام الغذائي
     */
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
