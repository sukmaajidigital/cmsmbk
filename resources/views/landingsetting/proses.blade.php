<div class="flex md:flex-row gap-6 p-6" id="vidiosetting">
    <div class="w-full md:w-10/12  rounded-2xl p-6">
        <x-table.datatable tablename="proses" barisdata="5" hiddenfilter1="true" hiddenfilter2="true">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all" class="checkbox checkbox-sm"></th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Gambar Proses</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($landingproses as $proses)
                    <tr>
                        <td><input type="checkbox" class="row-checkbox checkbox checkbox-sm"></td>
                        <td>{{ $proses->id }}</td>
                        <td>{{ $proses->judul }}</td>
                        <td>
                            @if (!empty($proses->imageproses))
                                <img src="{{ asset('storage/' . $proses->imageproses) }}" alt="Proses Image" class="w-40 h-40 object-cover rounded-lg">
                            @else
                                <div class="w-40 h-40 flex items-center justify-center rounded-lg border">
                                    <span class="text-secondary">No Image</span>
                                </div>
                            @endif
                        </td>
                        <td>{{ $proses->deskripsi }}</td>
                        <td>
                            <div class=" flex items-center gap-3">
                                <x-modal.buttoneditmodal title="" routes="{{ route('landingsetting.editproses', $proses->id) }}" />
                                <x-button.deletebutton title="" routes="{{ route('landingsetting.destroyproses', $proses->id) }}" confirmationMessage="data ini tidak dapat dikembalikan lagi" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.datatable>
    </div>
    <div class="w-full h-full md:w-2/12 rounded-2xl p-6">
        <h5 class="text-2xl font-bold text-gray-700 mb-4">Vidio Proses</h5>
        <x-modal.buttoncreatemodal title="Tambah Data" routes="{{ route('landingsetting.createproses') }}" />
        <x-modal.createmodal title="Tambah Data" routes="{{ route('landingsetting.storeproses') }}" />
        <x-modal.editmodal title="Edit Data" />
    </div>

</div>
