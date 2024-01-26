<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contribution extends Model
{
    use HasFactory;

    const CONTRIBUTION_STATUS_PENDING =  'Pending',
    CONTRIBUTION_STATUS_APPROVED = 'Approved',
    CONTRIBUTION_STATUS_DECLINED = 'Declined',
    CONTRIBUTION_STATUS_CANCELLED = 'Cancelled';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
