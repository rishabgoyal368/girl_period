<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{

	protected $fillable = [
        'user_id',
        'date',
        'note',
        'period_started_date',
        'period_ended_date',
        'flow',
        'took_medicine',
        'intercourse',
        'masturbated',
        'mood',
        'weight',
        'height',
    ];
}
