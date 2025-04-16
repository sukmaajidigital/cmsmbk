<?php

namespace App\Models\postingan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukListkategori extends Model
{
    use HasFactory;

    protected $table = 'produk_listkategoris';

    protected $guarded = [];

    public function produkkategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'produk_kategori_id');
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
