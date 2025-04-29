<x-layouts>
    <div class="card-header">
        <x-modal.buttoncreatemodal title="Tambah Data" routes="{{ route('blog.create') }}" />
        <x-modal.createmodal title="Tambah Data" routes="{{ route('blog.store') }}" />
        <x-modal.editmodal title="Edit Data" />
    </div>
    <div class="card-body">
        <x-table.datatable tablename="blog" barisdata="5" hiddenfilter1="true" hiddenfilter2="true">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Excerpt</th>
                    <th>SEO</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>
                            @if (!empty($blog->featured_image))
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?? $blog->title }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 flex items-center justify-center border rounded text-gray-400 text-xs">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="font-bold">{{ $blog->id }}. {{ $blog->title }}</div>
                            <div class="text-sm text-gray-500">{{ $blog->slug }}</div>
                        </td>
                        <td class="text-sm text-gray-600">
                            {{ \Illuminate\Support\Str::limit($blog->excerpt, 50) ?? '-' }}
                        </td>
                        <td class="text-sm">
                            <strong>Meta Title:</strong> {{ $blog->meta_title ?? '-' }}<br>
                            <strong>Meta Desc:</strong> {{ \Illuminate\Support\Str::limit($blog->meta_description, 30) ?? '-' }}<br>
                            <strong>Meta Keywords:</strong> {{ $blog->meta_keywords ?? '-' }}
                        </td>
                        <td>
                            @if ($blog->is_published)
                                <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded">Published</span><br>
                                <small class="text-gray-400">{{ $blog->published_at }}</small>
                            @else
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-600 text-xs font-semibold rounded">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <x-modal.buttoneditmodal title="Edit" routes="{{ route('blog.edit', $blog->id) }}" />
                                <x-button.deletebutton title="Delete" routes="{{ route('blog.destroy', $blog->id) }}" confirmationMessage="Apakah anda yakin ingin menghapus blog ini?" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </x-table.datatable>
    </div>
</x-layouts>
