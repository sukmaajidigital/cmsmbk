<div class="grid grid-cols-2 gap-6">
    <div>
        {{-- Nama Produk --}}
        <x-forms.text-input required="required" label="Nama Produk" id="name" name="name" :value="old('name', $produk->name ?? '')" />

        {{-- slug --}}
        <x-forms.text-input required="" label="Slug" id="slug" name="slug" :value="old('slug', $produk->slug ?? '')" />

        {{-- Stok --}}
        <x-forms.text-input required="required" label="Stok" id="stock" name="stock" type="number" :value="old('stock', $produk->stock ?? '')" />

        {{-- Harga --}}
        <x-forms.text-input required="required" label="Harga" id="harga" name="harga" type="number" :value="old('harga', $produk->harga ?? '')" />

        {{-- SKU --}}
        <x-forms.text-input required="" label="SKU" id="sku" name="sku" :value="old('sku', $produk->sku ?? '')" />

        {{-- Gambar (optional upload) --}}
        <x-forms.text-input required="" type="file" label="Gambar Produk" id="image" name="image" :value="old('image', $produk->image ?? '')" />

        {{-- SEO --}}
        <x-forms.text-input required="" label="Meta Title" id="meta_title" name="meta_title" :value="old('meta_title', $produk->meta_title ?? '')" />
        <x-forms.textarea-input required="" label="Meta Description" id="meta_description" name="meta_description" :value="old('meta_description', $produk->meta_description ?? '')" />
        <x-forms.text-input required="" label="Meta Keywords" id="meta_keywords" name="meta_keywords" :value="old('meta_keywords', $produk->meta_keywords ?? '')" />
    </div>
    <div>
        {{-- Deskripsi --}}
        <x-forms.textarea-input required="" label="Deskripsi" id="description" name="description" :value="old('description', $produk->description ?? '')" />

        {{-- Link Marketplace --}}
        <x-forms.text-input required="" label="Link Shopee" id="shopee" name="shopee" :value="old('shopee', $produk->shopee ?? '')" />
        <x-forms.text-input required="" label="Link Tokopedia" id="tokped" name="tokped" :value="old('tokped', $produk->tokped ?? '')" />
        <x-forms.text-input required="" label="Link Tiktok Shop" id="tiktokshop" name="tiktokshop" :value="old('tiktokshop', $produk->tiktokshop ?? '')" />

        {{-- Kategori (Multiple Select) --}}
        <label for="produk_kategori_id" class="label label-text">
            Kategori Produk
        </label>
        <select id="produk_kategori_id" name="produk_kategori_id[]" class="select ltr:text-left" multiple required>
            @foreach ($produkkategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ in_array($kategori->id, old('produk_kategori_id', isset($produk) ? $produk->kategoris->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>

        @error('produk_kategori_id')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror
    </div>
</div>
