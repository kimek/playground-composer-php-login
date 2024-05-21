<?php

namespace Kimek\UserRegistration\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $fillable = ['username', 'password'];

	public $timestamps = false;

	protected $hidden = ['password'];
}