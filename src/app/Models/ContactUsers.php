<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class ContactUsers extends Model
{
    use HasFactory;

    public function companies()
    {
        return $this->belongsTo(Companies::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    protected $fillable = [
        'users_id',
        'companies_id',
        'follow',
    ];
}
