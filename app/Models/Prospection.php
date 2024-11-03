<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospection extends Model
{
    use HasFactory;
     /**
     * @var array
     */
    protected $fillable = ['titre', 'description', 'prospect_id','is_active', 'date', 'created_at', 'updated_at'];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospect()
    {
        return $this->belongsTo(Prospect::class);
    }
}
