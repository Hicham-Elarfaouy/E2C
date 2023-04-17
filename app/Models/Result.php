<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'note', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAcademicYear(): string
    {
        $value = $this->attributes['created_at'];
        $year = (int)date("Y", strtotime($value));
        $month = (int)date("m", strtotime($value));
        $year = ($month >= 9) ? $year : $year - 1;
        return $year . ' / ' . $year + 1;
    }
}
