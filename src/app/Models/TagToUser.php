<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class TagToUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'tags_id',
    ];
}
