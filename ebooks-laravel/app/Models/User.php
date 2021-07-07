<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use SoftDeletes;
    use HasRoles;


    protected $guard_name = 'sanctum';



    protected $fillable = [
        'name',
        'email',
        'fName',
        'lName',
        'password',
        'image',
        'fac_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'translations',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function userImage()
    {
        if($this->profile_photo_path){
            return asset('storage/'.$this->profile_photo_path);
        }else{
            return asset('assets/dashboard/img/user/profile.png');
        }
    }

    public function profile_photo_urlSrc()
    {
        if($this->profile_photo_path){
            return 'storage/'.$this->profile_photo_path;
        }else{
            return 'assets/dashboard/img/user/profile.png';
        }
    }

    public function imageSrc()
    {
        if($this->image){
            return $this->image_rel_path();
        }else{
            return 'assets/dashboard/img/user/profile.png';
        }
    }

    public static function files_path() {
        return 'assets/dashboard/images/users/';
    }

    public function image_delete()
    {
        if($this->attributes['image'])
            delete_img($this->image_rel_path());
    }

    public function image_rel_path()
    {
        return $this->files_path() . $this->attributes['image'];
    }

    public function  getImageAttribute($val){
        return ($val && file_exists($this->image_rel_path())) ?  asset($this->image_rel_path()) : false;
    }


    public function getActive(){
        return  $this -> is_active  == 0 ?  trans('main.is_not_active')   : trans('main.is_active') ;
     }

    public function scopeActive($query){
        return $query -> where('is_active',1) ;
    }

    public function getRole($attr="")
    {
        if($this->roles->isEmpty())
            return false;

        return ($attr) ? $this->roles()->first()->$attr : $this->roles()->first();
    }


    public function setPassword($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function fac()
    {
        return $this->hasOne('App\Models\Fac', 'id', 'fac_id');
    }
}
