<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'is_pet_sitter',
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
        'password' => 'hashed',
    ];

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class, 'owner_id', 'id');
    }

    /**
     * @return Pet[]
     */
    public function getPets(): array
    {
        return $this->pets()
            ->get()
            ->all();
    }

    public function pettingApplications(): HasMany
    {
        return $this->hasMany(PettingApplication::class, 'sitter_id','id');
    }

    /**
     * @return PettingApplication[]
     */

    public function getPettingApplications(): array
    {
        return $this->pettingApplications()
            ->get()
            ->all();
    }
}
