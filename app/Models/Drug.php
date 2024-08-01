<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $guarded = false;


public function category()
{

    return $this->belongsTo(Category::class);

}
public function currency()
{
  return $this->belongsTo(Currency::class);
}

public function gallery()
    {
        return $this->hasMany(DrugGallery::class);
    }
}
