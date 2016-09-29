<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'email', 'password', 'full_name', 'age', 'gender', 'city'
    ];

    protected $editable = [
        'username', 'full_name', 'age', 'gender', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user's gender.
     *
     * @param  string  $value
     * @return string
     */
    public function getGenderAttribute($value)
    {
        if( $value ) {
            $variants = array('', 'Male', 'Female');
            return $variants[$value];
        }
        return null;
    }

    /**
     * Set the user's gender.
     *
     * @param  string  $value
     * @return string
     */
    /*public function setGenderAttribute($value)
    {
        switch ($value) {
            case '':
                $value = 0;
                break;
            case 'Male':
                $value = 1;
                break;
            case 'Female':
                $value = 2;
                break;
        }

        return $value;
    }*/

}
