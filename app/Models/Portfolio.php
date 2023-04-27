<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Portfolio extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'customer',
        'description',
        'slug',
        'url',
        'type_id',
    ];

    public function type(){
        return $this->belongsto(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
