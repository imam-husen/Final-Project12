<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    
    protected $table = 'categories';
    protected $fillable =['nama'];

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class,'category_id');
    }
}
