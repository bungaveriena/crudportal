<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal_web extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'desc', 'divisi_id', 'link'
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class);
    }
}
