<x-layouts>
    <div class="flex flex-col md:flex-row gap-6 p-6" id="aboutsetting">
        <div class="w-full md:w-3/5  rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">About</h5>
            <form action="{{ route('landingsetting.updateabout') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <x-forms.textarea-input required="" label="Deskripsi" id="deskripsi" name="deskripsi" :value="old('deskripsi', $landingabout->deskripsi ?? '')" />
                <x-forms.text-input label="Image" id="imageabout" name="imageabout" type="file" :value="old('imageabout', $landingabout->imageabout ?? '')" required="" />
                <div class="mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">Update</button>
                </div>
            </form>
        </div>
        <div class="w-full md:w-2/5  rounded-2xl p-6">
            <h5 class="text-2xl font-bold text-gray-700 mb-4">Preview</h5>
            <div class="space-y-6">
                <div>
                    <h6 class="font-semibold text-gray-600 mb-2">Image</h6>
                    @if (!empty($landingabout->imageabout))
                        <img src="{{ asset('storage/' . $landingabout->imageabout) }}" alt="Icon" class="object-cover ">
                    @else
                        <div class="w-40 h-40 flex items-center justify-center rounded-lg border border-gray-300 bg-gray-100">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</x-layouts>
