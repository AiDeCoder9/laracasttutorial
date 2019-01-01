<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany(Project::class,'owner_id');//it refers to select * from projects where owner_id=1

        //if  we define the id of the respected table differently we must specify here
        //because we are in user model it will generate query select * from projects where user_id= 1
        //but in our case we defined it as owner_id in the table
        //so we must define it
    }

}
