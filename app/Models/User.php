<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Function : Relation for questions
     * @relationType: hasMany
     * @return questions
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'user_id', 'id');
    }
    /**
     * Returns if the User has the specified permission
     * @return Boolean
     */
    public function getPermissions()
    {
        return Cache::remember('user_permissions_' . $this->id, now()->addHour(), function () {
            $permissions = [];
            $userPermissions = $this->getPermissionsViaRoles();
            foreach ($userPermissions as $permission) {
                array_push($permissions, $permission->name);
            }
            return $permissions;
        });
    }
}
