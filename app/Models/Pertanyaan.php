<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan';
    protected $fillable =['judul','content','gambar','category_id','users_id'];

    public function category(){
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'users_id');
    }

    public function jawaban() {
        return $this->hasMany(Jawaban::class, 'pertanyaan_id');
    }


}
