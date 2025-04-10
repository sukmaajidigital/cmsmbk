<div class="flex flex-col md:flex-row gap-6 p-6" id="vidiosetting">
    <div class="w-full h-full md:w-3/5 rounded-2xl p-6">
        <h5 class="text-2xl font-bold text-gray-700 mb-4">Vidio Proses</h5>
        <form action="{{ route('landingsetting.updatevidio') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <x-forms.text-input label="Judul" id="judul" name="judul" type="text" :value="old('judul', $landingvidio->judul ?? '')" required="required" />
            <x-forms.textarea-input required="" label="Deskripsi" id="deskripsi" name="deskripsi" :value="old('deskripsi', $landingvidio->deskripsi ?? '')" />
            <x-forms.text-input label="Vidio" id="vidio" name="vidio" type="file" :value="old('vidio', $landingvidio->vidio ?? '')" required="" />
            <div class="mt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update</button>
            </div>
        </form>
    </div>
    <div class="w-full md:w-2/5  rounded-2xl p-6">
        <h5 class="text-2xl font-bold text-gray-700 mb-4">Preview</h5>
        <div class="space-y-6">
            <div>
                <h6 class="font-semibold text-gray-600 mb-2">Video</h6>
                @if (!empty($landingvidio->vidio))
                    <video controls class="w-full h-full object-cover">
                        <source src="{{ asset('storage/' . $landingvidio->vidio) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <div class="w-40 h-40 flex items-center justify-center rounded-lg border border-gray-300 bg-gray-100">
                        <span class="text-gray-400">No Video</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
