@if ($produks->count())
    <section class="min-w-full" id="produk">
        <div class="min-w-screen h-36 bg-content flex items-center justify-center">
            <h2 class="text-3xl font-bold">
                {{ \App\Models\landing\LandingControllview::value('produk_title') }}
            </h2>
        </div>
        <div id="produk-container">
            <div class="text-center py-10">Loading produk...</div>
        </div>
    </section>
@endif

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        function loadProduk(url = "{{ route('getlistproduk') }}") {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                beforeSend: function() {
                    $('#produk-container').html('<div class="text-center py-10">Loading...</div>');
                },
                success: function(response) {
                    $('#produk-container').html(response);
                },
                error: function(xhr) {
                    console.error('Gagal memuat produk:', xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            loadProduk(); // Load pertama kali saat halaman dibuka
        });

        // Ketika klik link pagination
        $(document).on('click', '#produk-container .pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            if (url) {
                loadProduk(url); // Memanggil fungsi loadProduk dengan URL baru
            }
        });
    </script>
@endpush
