<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Prefecture extends Model
{
    use HasFactory;

    public function Jobs()
    {
        return $this->belongsToMany(Jobs::class, 'job_locations', 'prefectures_id', 'jobs_id');
    }
}
