<?php

namespace App\Models\Clearance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clearance_section_status';
}
