<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PettingRequest extends Model
{
    protected $table = 'petting_requests';

    protected $fillable = [
        'pet_id',
        'from',
        'to',
        'description',
        'pickup_location',
    ];

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id');
    }

    public function getPet(): Pet
    {
        return $this->pet()->first();
    }

    public function setPet(Pet $pet)
    {
        return $this->pet()->associate($pet);
    }


    public function pettingApplications(): HasMany
    {
        return $this->hasMany(PettingApplication::class, 'petting_request_id', 'id');
    }

    public function getPettingApplications(): array
    {
        return $this->pettingApplications()
            ->get()
            ->all();
    }

}
