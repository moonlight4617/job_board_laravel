<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EmpStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Jobs extends Model
{
    use HasFactory;

    public function companies()
    {
        return $this->belongsTo(Companies::class);
    }

    public function appStatus()
    {
        return $this->hasMany(AppStatus::class);
    }

    public function TagToJob()
    {
        return $this->hasMany(TagToJob::class, 'jobs_id');
    }

    protected $fillable = [
        'companies_id',
        'job_name',
        'catch',
        'emp_status',
        'detail',
        'conditions',
        'duty_hours',
        'low_salary',
        'high_salary',
        'holiday',
        'benefits',
        'rec_status',
        'image1',
        'image2',
        'image3',
    ];

    public function isLikedBy($user): bool
    {
        return AppStatus::where('users_id', $user->id)->where('jobs_id', $this->id)->where('favorite', true)->first() !== null;
    }

    public function isApplied($user): bool
    {
        return AppStatus::where('users_id', $user->id)->where('jobs_id', $this->id)->where('app_flag', true)->first() !== null;
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_to_jobs', 'jobs_id', 'tags_id');
    }

    public function Prefectures()
    {
        return $this->belongsToMany(Prefecture::class, 'job_locations', 'jobs_id', 'prefectures_id');
    }

    public function occupations()
    {
        return $this->belongsToMany(Occupation::class, 'job_occupations', 'jobs_id', 'occupations_id');
    }

    public function empStatus()
    {
        return EmpStatus::getDescription($this->emp_status);
    }
}
