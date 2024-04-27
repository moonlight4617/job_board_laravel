<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class TagToJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobs_id',
        'tags_id',
    ];
}
