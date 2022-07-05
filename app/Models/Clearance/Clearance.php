<?php

namespace App\Models\Clearance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clearance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clearance';

    public function sections(){
        return $this->hasMany(Section::class, 'clearance_id');
    }

    public function users(){
        return $this->hasMany(User::class, 'clearance_id');
    }

}
