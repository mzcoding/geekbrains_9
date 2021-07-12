<?php declare(strict_types=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
   protected $table = "categories";

   protected $fillable = [
		'title',
		'color',
		'description'
   ];

   public function news(): HasMany
   {
   	  return $this->hasMany(News::class, 'category_id', 'id');
   }
}