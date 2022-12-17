<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['username', 'email', 'password', 'profile_photo', 'email_verified_at', 'email_verification_token'];

}