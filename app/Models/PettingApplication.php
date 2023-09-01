<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PettingApplication extends Model
{
    protected $table = 'petting_applications';

    protected $fillable = [
        'petting_request_id',
        'sitter_id',
        'price',
        'is_accepted',
    ];

    public function getId(): int
    {
            return (int)$this->getAttribute('id');
    }

    public function sitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sitter_id', 'id');
    }

    public function getSitter(): User
    {
        return $this->sitter()->first();
    }

    public function setSitter(User $sitter)
    {
        return $this->sitter()->associate($sitter);
    }

    public function pettingRequest(): BelongsTo
    {
        return $this->belongsTo(PettingRequest::class, 'petting_request_id', 'id');
    }

    public function getPettingRequest(): PettingRequest
    {
        return $this->pettingRequest()->first();
    }

    public function setPettingRequest(PettingRequest $pettingRequest)
    {
        return $this->pettingRequest()->associate($pettingRequest);
    }

}
