<link rel="stylesheet" href="{{ asset('richtexteditor/richtexteditor/rte_theme_default.css') }}" />
{{-- Judul --}}
<x-forms.text-input required="required" label="Judul Blog" id="title" name="title" :value="old('title', $blog->title ?? '')" />
{{-- Slug --}}
<x-forms.text-input required="required" label="Slug" id="slug" name="slug" :value="old('slug', $blog->slug ?? '')" />
{{-- Konten --}}
<x-forms.textarea-input required="" label="Konten" id="text_editor" class="hidden" name="content" :value="old('content', $blog->content ?? '')" />
{{-- Semua lainnya dibagi 2 kolom --}}
<div class="grid grid-cols-2 gap-6 mt-6">
    <div>
        {{-- SEO Fields --}}
        <x-forms.text-input required="" label="Meta Title" id="meta_title" name="meta_title" :value="old('meta_title', $blog->meta_title ?? '')" />
        <x-forms.textarea-input required="" label="Meta Description" id="meta_description" name="meta_description" :value="old('meta_description', $blog->meta_description ?? '')" />
        <x-forms.text-input required="" label="Meta Keywords" id="meta_keywords" name="meta_keywords" :value="old('meta_keywords', $blog->meta_keywords ?? '')" />
    </div>
    <div>
        {{-- Gambar Utama --}}
        <x-forms.text-input required="" type="file" label="Gambar Utama" id="featured_image" name="featured_image" :value="old('featured_image', $blog->featured_image ?? '')" />

        {{-- Preview Gambar --}}
        <div class="mt-4">
            @if (old('featured_image') || ($blog->featured_image ?? false))
                <img id="image-preview" src="{{ old('featured_image') ? asset('storage/' . old('featured_image')) : asset('storage/' . $blog->featured_image) }}" alt="Preview Gambar" class="w-32 h-32 object-cover rounded">
            @else
                <img id="image-preview" src="#" alt="Preview Gambar" class="w-32 h-32 object-cover rounded hidden">
            @endif
        </div>
        <script>
            function previewImage(event) {
                const imagePreview = document.getElementById('image-preview');
                const file = event.target.files[0];
                if (file) {
                    imagePreview.src = URL.createObjectURL(file);
                    imagePreview.classList.remove('hidden');
                }
            }
            document.getElementById('featured_image').addEventListener('change', previewImage);
        </script>
        {{-- Status Publish --}}
        <div class="mt-4">
            <label for="is_published" class="label label-text">Status Publikasi</label>
            <select name="is_published" id="is_published" class="select" required>
                <option value="1" {{ old('is_published', $blog->is_published ?? '') == 1 ? 'selected' : '' }}>Publish</option>
                <option value="0" {{ old('is_published', $blog->is_published ?? '') == 0 ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        {{-- Published At --}}
        <x-forms.text-input required="" type="date" label="Tanggal Publish" id="published_at" name="published_at" :value="old('published_at', isset($blog->published_at) ? $blog->published_at : '')" />
    </div>
</div>
<script type="text/javascript" src="{{ asset('richtexteditor/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ asset('richtexteditor/richtexteditor/plugins/all_plugins.js') }}"></script>
<script>
    const config = {};

    config.file_upload_handler = function(file, callback, optionalIndex, optionalFiles) {
        const uploadHandlerPath = "{{ route('image.upload') }}";

        const append = (parent, tagname, classNames) => {
            const tag = document.createElement(tagname);
            if (classNames) tag.className = classNames;
            parent.appendChild(tag);
            return tag;
        };

        let uploadCancelled = false;

        // Modal overlay
        const dialogOuter = append(document.body, "div", "fixed inset-0 z-[999999] flex items-center justify-center bg-gray-500 bg-opacity-50");
        const dialogInner = append(dialogOuter, "div", "bg-white rounded-lg border border-gray-300 p-6 shadow-lg min-w-[200px]");

        // Upload text
        const line1 = append(dialogInner, "div", "text-center text-lg mb-2 font-medium");
        line1.innerText = "Uploading...";

        const line2 = append(dialogInner, "div", "text-center text-base mb-2");
        line2.innerText = "0%";

        // Progress bar
        const progressbar = append(dialogInner, "div", "w-full bg-gray-200 rounded h-3 mb-4 overflow-hidden");
        const progressbg = append(progressbar, "div", "bg-green-500 h-full w-0");

        // Cancel button
        const line3 = append(dialogInner, "div", "text-center");
        const btn = append(line3, "button", "bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600");
        btn.innerText = "Cancel";
        btn.onclick = function() {
            uploadCancelled = true;
            xh.abort();
        };

        // Upload via XMLHttpRequest
        const xh = new XMLHttpRequest();
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', "{{ csrf_token() }}");

        xh.open("POST", uploadHandlerPath, true);
        xh.onload = xh.onabort = xh.onerror = function(pe) {
            dialogOuter.remove();
            if (pe.type === "load") {
                if (xh.status !== 200) {
                    callback(null, "http-error-" + xh.status);
                } else {
                    const response = JSON.parse(xh.responseText);
                    if (response.url) {
                        callback(response.url);
                    } else {
                        callback(null, "upload-failed");
                    }
                }
            } else if (uploadCancelled) {
                callback(null, "cancelled");
            } else {
                callback(null, pe.type);
            }
        };

        xh.upload.onprogress = function(pe) {
            const percent = Math.floor((pe.loaded / pe.total) * 100);
            line2.innerText = percent + "%";
            progressbg.style.width = `${percent}%`;
        };

        xh.send(formData);
    };

    // Init RTE
    new RichTextEditor("#text_editor", config);
</script>
