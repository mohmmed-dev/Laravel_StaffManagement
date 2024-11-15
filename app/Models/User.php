<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function Projects() {
        return $this->belongsToMany(Project::class)->withPivot('user_id',"project_id",'isManger')->withTimestamps();
    }

    public function Employees() {
        return $this->hasMany(Employee::class);
    }

    public function isManger($id) {
        return $this->Projects()->where('project_id' , $id)->exists();
    }

    public function isSuperManger($id) {
        return $this->Projects()->where('project_id' , $id)->where('isManger',1)->exists();
    }
    
    public function image() {
        $image =  $this->image;
        if(strpos($this->image,'ui-avatars.com') > 0) {
            return $image;
        }
        return asset('storage/'. $image);
    }
}
