<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'prospect_id',
        'file_path'
    ];

    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
