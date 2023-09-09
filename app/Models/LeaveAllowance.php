<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveAllowance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'leave_allowance';
    protected $fillable = [
        'account_id',
        'reason',
        'start_date',
        'end_date',
    ];

    public function accounts() : BelongsTo {
        return $this->belongsTo(Accounts::class, 'account_id');
    }
}
