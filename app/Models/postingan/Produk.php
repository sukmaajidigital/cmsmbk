<?php

namespace App\Models\postingan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $guarded = [];

    public function produklistkategori()
    {
        return $this->hasMany(ProdukListkategori::class, 'produk_kategori_id');
    }
}
