<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugGallery extends Model
{
    use HasFactory;
    protected $fillable = ['drug_id', 'file_path', 'type', 'size'];

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
