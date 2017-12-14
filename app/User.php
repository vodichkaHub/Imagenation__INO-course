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
        'name', 'email', 'password', 'country', 'login',
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
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        
        return $this->belongsToMany('App\Role');
    }

    /**
     * 
     * @return type
     */
    public function images() {
        
        return $this->hasMany('App\Images');
    }    

    /**
     * 
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
    	if ($this->roles()->where('name', $role)->first()) {
    		return true;
	    }
        
	    return false;
    }
    
    /**
     * 
     * @param int $id
     * @return boolean
     */
    public static function setBan($id) {

        $user = self::where('id', $id)->first();
        $user->ban = 1;
        $user->save();
        
        return true;
    }
    
    /**
     * 
     * @param int $id
     * @return type
     */
    public static function unsetBan($id) {

        $user = self::where('id', $id)->first();
        $user->ban = 0;
        $user->save();
        
        return true;
    } 
}
