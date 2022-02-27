<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildMessage extends Model
{
    use HasFactory;
    protected $table = 'child_messages';
    protected $fillable = [
        'message_id', 'body', 'sender_id',
    ];

    protected $appends = [
        'time', 'preview', 'day'
    ];

    public function message() {
        return $this->belongsTo(Message::class, 'message_id', 'id');
    }
    
    public function fromUser() {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function getTimeAttribute() {
        return date('H:i', strtotime($this->created_at));
    }

    public function getDayAttribute() {
        return date('d F H:i', strtotime($this->created_at));
    }

    public function getPreviewAttribute() {
        return substr($this->body, 0, 50);
    }
}
