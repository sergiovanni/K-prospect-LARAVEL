<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    /**
     * @var array
     */
    protected $fillable = ['titre', 'auteur', 'categories_id','fichier', 'date', 'description','created_at', 'updated_at'];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo('App\Models\Categorie', 'categories_id');
    }
}
