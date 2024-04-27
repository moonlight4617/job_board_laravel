<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class AppStatus extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'users_id',
        'jobs_id',
        'app_flag',
        'favorite',
    ];
}
