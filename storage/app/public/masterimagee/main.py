import os
from PIL import Image
from pathlib import Path
import logging

# Menyiapkan logging
logging.basicConfig(level=logging.INFO, format='%(asctime)s - %(message)s')
logger = logging.getLogger()

input_folder = "masterimage/batik tulis variasi cap"
output_folder = "masterimage/batik tulis variasi cap/compressed"

def compress_and_save(input_path, output_path, quality=85, max_size=None):
    """Kompres satu gambar dan simpan ke path output"""
    try:
        img = Image.open(input_path)

        # Resize jika max_size ditentukan
        if max_size:
            img.thumbnail((max_size, max_size))

        # Simpan dengan kualitas yang ditentukan
        img.save(output_path, "JPEG", quality=quality, optimize=True, progressive=True)
        return True
    except Exception as e:
        logger.error(f"Gagal memproses {input_path}: {str(e)}")
        return False

def process_folder(input_folder, output_base_folder, quality=85, max_size=None):
    """
    Proses semua JPG dalam folder dan subfolder

    Parameters:
    - input_folder: Folder sumber
    - output_base_folder: Folder tujuan utama
    - quality: Kualitas kompresi (1-100)
    - max_size: Ukuran maksimum (lebar/tinggi)
    """
    # Hitung total file dan ukuran
    total_files = 0
    total_original_size = 0
    total_compressed_size = 0

    # Loop melalui semua file dan subfolder
    for root, _, files in os.walk(input_folder):
        for filename in files:
            if filename.lower().endswith(('.jpg', '.jpeg', '.png')):  # Menambahkan PNG jika diperlukan
                input_path = os.path.join(root, filename)

                # Buat path output yang sesuai
                relative_path = os.path.relpath(root, input_folder)
                output_folder = os.path.join(output_base_folder, relative_path)
                output_path = os.path.join(output_folder, filename)

                # Buat folder jika belum ada
                os.makedirs(output_folder, exist_ok=True)

                # Proses file
                original_size = os.path.getsize(input_path)
                success = compress_and_save(input_path, output_path, quality, max_size)

                if success:
                    compressed_size = os.path.getsize(output_path)
                    compression_ratio = (original_size - compressed_size) / original_size * 100

                    logger.info(f"Diproses: {input_path} -> {output_path}")
                    logger.info(f"Ukuran: {original_size/1024:.1f}KB -> {compressed_size/1024:.1f}KB")
                    logger.info(f"Kompresi: {compression_ratio:.1f}%")
                    logger.info("-" * 50)

                    total_files += 1
                    total_original_size += original_size
                    total_compressed_size += compressed_size

    # Tampilkan ringkasan
    if total_files > 0:
        logger.info("\nRingkasan Kompresi:")
        logger.info(f"Total file diproses: {total_files}")
        logger.info(f"Total ukuran asli: {total_original_size/1024/1024:.2f} MB")
        logger.info(f"Total ukuran setelah kompresi: {total_compressed_size/1024/1024:.2f} MB")
        logger.info(f"Penghematan total: {(total_original_size - total_compressed_size)/1024/1024:.2f} MB")
        logger.info(f"Rasio kompresi rata-rata: {(1 - (total_compressed_size / total_original_size)) * 100:.1f}%")
    else:
        logger.warning("Tidak ada file JPG yang ditemukan di folder sumber.")

if __name__ == "__main__":
    import argparse

    parser = argparse.ArgumentParser(description='Kompresi Gambar JPG dalam Folder')
    parser.add_argument('input_folder', help='Folder sumber berisi gambar JPG')
    parser.add_argument('output_folder', help='Folder tujuan untuk hasil kompresi')
    parser.add_argument('-q', '--quality', type=int, default=85,
                       help='Kualitas kompresi (1-100), default 85')
    parser.add_argument('-s', '--max_size', type=int,
                       help='Ukuran maksimum (lebar/tinggi dalam pixel)')

    args = parser.parse_args()

    # Pastikan folder output ada
    os.makedirs(args.output_folder, exist_ok=True)

    # Jalankan proses
    process_folder(
        input_folder=args.input_folder,
        output_base_folder=args.output_folder,
        quality=args.quality,
        max_size=args.max_size
    )
