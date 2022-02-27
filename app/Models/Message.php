<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'to_id', 'from_id',
    ];
    protected $appends = [
        'preview'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function childMessage() {
        return $this->hasMany(ChildMessage::class, 'message_id', 'id');
    }

    public function getPreviewAttribute() {
        return $this->childMessage()->get()->last();
    }
    public function fromUser() {
        return $this->belongsTo(User::class, 'from_id', 'id');
    }

    public function toUser() {
        return $this->belongsTo(User::class, 'to_id', 'id');
    }
}
