<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['nom', 'adresse', 'email', 'phone', 'activites_profession', 'autres', 'description', 'created_at', 'updated_at'];

   /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function Prospection()
    // {
    //     return $this->hasMany('App\Models\Prospection', 'prospect_id');
    // }
    public function Prospection()
    {
        return $this->hasMany(Prospection::class);
    }

    public function prospections()
    {
        return $this->hasMany(Prospection::class);
    }
}
