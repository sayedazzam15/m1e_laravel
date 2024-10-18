<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\UserTypeScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Foundation\Auth\User;

#[ScopedBy(UserTypeScope::class)] 
class Supervisor extends User
{
    use HasFactory;
    public $type = 'supervisor';
    protected $table = 'users';
}
