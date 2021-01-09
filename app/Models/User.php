<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use QCod\ImageUp\HasImageUploads;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasFactory, Notifiable,MustVerifyEmail,HasImageUploads;

    protected static $imageFields = [
        'avatar' => [
            'width'    =>  208,
            'height'   =>   208,
            'crop'     =>   true,

            // validation rules when uploading image
            'rules' => 'image|max:2000',
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'introduction'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //显示图片的访问器
    public function avatar()
    {
        if(!$this->avatar) {
          return "http://larabbs.test/avatars/0MspEjh1n9tJfWeFbykDbdwDRxcqNtxuUjpBxRjt.png";
        }
        return \Storage::disk('avatar')->url($this->attributes['avatar']);
    }
}
