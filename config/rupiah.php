<?phpfunction rupiah($angka) { $angka = number_format($angka); $angka = str_replace(',', '.', $angka); $angka =Rp.".$angka."; return $angka; } //echo rupiah(1000); ?> Panggil fungsi rupiah dengan <?php rupiah();?>