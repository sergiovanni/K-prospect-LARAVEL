<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property integer $id
 * @property string $nom
 * @property string $created_at
 * @property string $updated_at
 * @property Document[] $document
 */
class Categorie extends Model
{
    use HasFactory;
     /**
     * @var array
     */
    protected $fillable = ['nom', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'categories_id');
    }

    public static function countCategories()
    {
        return self::count();
    }
}
