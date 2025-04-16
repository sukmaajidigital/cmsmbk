<x-layouts>
    <div class="card-header">
        <x-modal.buttoncreatemodal title="Tambah Data" routes="{{ route('produk.create') }}" />
        <x-modal.createmodal title="Tambah Data" routes="{{ route('produk.store') }}" />
        <x-modal.editmodal title="Edit Data" />
    </div>
    <div class="card-body">
        <x-table.datatable tablename="produk" barisdata="5" hiddenfilter1="" filter1name="kategori :" :filter1array="$produkkategoris" filter1collumn="nama_kategori" filter1colnumber="5" hiddenfilter2="true">
            <thead>
                <tr>
                    {{-- <th><input type="checkbox" id="select-all" class="checkbox checkbox-sm"></th> --}}
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    {{-- <th>Kategori</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        {{-- <td><input type="checkbox" class="row-checkbox checkbox checkbox-sm"></td> --}}
                        <td>{{ $produk->id }}</td>
                        <td>{{ $produk->name }}</td>
                        <td>{{ $produk->stock }}</td>
                        <td>{{ $produk->satuan }}</td>
                        {{-- <td>{{ $produk->produkkategori->nama_kategori }}</td> --}}
                        <td>
                            <div class=" flex items-center gap-3">
                                <x-modal.buttoneditmodal title="" routes="{{ route('produk.edit', $produk->id) }}" />
                                <x-button.deletebutton title="" routes="{{ route('produk.destroy', $produk->id) }}" confirmationMessage="data ini tidak dapat dikembalikan lagi" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.datatable>
    </div>
</x-layouts>
