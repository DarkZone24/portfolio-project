<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email', 
        'contact',
        'message',
        'status',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_CONTACTED = 'contacted'; 
    const STATUS_COMPLETED = 'completed';
    const STATUS_REJECTED = 'rejected';

    public function getStatusColorAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'yellow';
            case self::STATUS_CONTACTED:
                return 'blue';
            case self::STATUS_COMPLETED:
                return 'green';
            case self::STATUS_REJECTED:
                return 'red';
            default:
                return 'gray';
        }
    }
    
    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'Pending';
            case self::STATUS_CONTACTED:
                return 'Contacted';
            case self::STATUS_COMPLETED:
                return 'Completed';
            case self::STATUS_REJECTED:
                return 'Rejected';
            default:
                return 'Unknown';
        }
    }
    
}

