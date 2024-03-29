<?php

namespace App\Models\Clearance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_clearance_section';
}
