<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Tag extends Model
{
    use HasFactory;

    public function Jobs()
    {
        return $this->belongsToMany(Jobs::class, 'tag_to_jobs', 'tags_id', 'jobs_id');
    }

    public function Users()
    {
        return $this->belongsToMany(User::class, 'tag_to_users', 'tags_id', 'users_id')->withTimestamps();
    }

    protected $fillable = [
        'tag_name',
        'subject',
    ];
}
