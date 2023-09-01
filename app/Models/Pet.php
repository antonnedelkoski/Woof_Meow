<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    protected $table = 'pets';

    protected $fillable = [
        'name',
        'breed',
        'age',
        'pet_type',
        'image_url',
        'owner_id',
    ];

    public function getId(): int
    {
        return (int)$this->getAttribute('id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function getOwner(): User
    {
       return $this->owner()->first();
    }

    public function setOwner(User $owner)
    {
        $this->owner()->associate($owner);
    }

    public function pettingRequests(): HasMany
    {
        return $this->hasMany(PettingRequest::class, 'pet_id', 'id');
    }

    public function get_petting_requests(): array
    {
        return $this->pettingRequests()
            ->get()
            ->all();
    }
}
