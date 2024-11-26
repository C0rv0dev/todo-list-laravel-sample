<?php

namespace App\Models;

use App\Enums\PriorityEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    public $fillable = [
        'user_id',
        'title', 
        'content', 
        'priority',
        'status'
    ];

    /**
     * ---------------------------
     * RELATIONSHIPS
     * ---------------------------
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ---------------------------
     * SCOPES
     * ---------------------------
     */

    /**
     * ---------------------------
     * METHODS
     * ---------------------------
     */

    /**
     * ---------------------------
     * ACCESSORS
     * ---------------------------
     */
    public function getPriorityColorAttribute()
    {
        switch ($this->priority) {
            case PriorityEnum::LOW->value:
                return 'green';
                break;
            case PriorityEnum::MEDIUM->value:
                return 'yellow';
                break;
            case PriorityEnum::HIGH->value:
                return 'red';
                break;
            default:
                return 'gray';
                break;
        }
    }

    /**
     * ---------------------------
     * MUTATORS
     * ---------------------------
     */
}
