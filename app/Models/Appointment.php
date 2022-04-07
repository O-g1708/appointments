<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Set the user's first name.
     *
     * @param string $value
     * @return void
     */
    public function setTimeAttribute(string $value)
    {
        $this->attributes['time'] = Carbon::parse($value);
    }

}
