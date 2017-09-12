<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserDetail extends Model
{
    protected $table= 'user_detail';
    protected $fillable = [
        'id',
	    'user_id',
	    'address',
	    'education',
	    'nationality',
	    'contact_mode',
	    'dob'
    ];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
