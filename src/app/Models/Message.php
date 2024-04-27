<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Message extends Model
{
    use HasFactory;

    public function ContactUsers()
    {
        return $this->belongsTo(ContactUsers::class);
    }

    protected $fillable = [
        'contact_users_id',
        'sent_time',
        'sent_from',
        'body',
    ];
}
