<form class="" action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('page_postingan.produk.form')
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
