<?php

namespace App\Models;

use App\Models\Scopes\UserTypeScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

#[ScopedBy(UserTypeScope::class)] 
class Admin extends User
{
    use HasFactory;
    public $type = 'admin';
    protected $table = 'users';
}
