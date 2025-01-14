<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format angka ke format Rupiah.
     *
     * @param float $amount
     * @return string
     */
    function formatRupiah(float $amount): string
    {
        // Memastikan input adalah angka
        if (!is_numeric($amount)) {
            return "Invalid amount"; // Jika input bukan angka, kembalikan pesan error
        }

        // Memformat angka ke format Rupiah dengan 2 digit desimal
        return 'Rp ' . number_format($amount, 2, ',', '.');
    }
}
