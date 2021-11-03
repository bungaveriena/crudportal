<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function portal_webs(){

        return $this->hasMany(Portal_web::class);

    }
}
