<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Document as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Document extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'document_no', 	
        'document_name'
    ];

    public function users()
        {
            return $this->belongsToMany('App\Models\User', 'id');
        }
}
