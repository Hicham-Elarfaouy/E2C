<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 'type', 'description', 'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
