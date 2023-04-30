<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'dias', 'hora'];

    public function setDias($value)
    {
        $this->attributes['dias'] = json_encode($value);
    }

    public function getDias($value)
    {
        return $this->attributes['dias'] = json_decode($value);
    }
}
