<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti tambahan spesifik terenkapsulasi
    private $golonganUkt;
    private $namaWali;

    // Constructor MahasiswaMandiri
    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran, $golonganUkt, $namaWali) {
        // Memanggil constructor dari abstract class Mahasiswa (Induk)
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // Implementasi abstract method 1: Hitung Tagihan
    public function hitungTagihanSemester() {
        // Mahasiswa Mandiri membayar UKT penuh sesuai tarif nominalnya
        return $this->tarifUktNominal;
    }

    // Implementasi abstract method 2: Tampilkan Spesifikasi
    public function tampilkanSpesifikasiAkademik() {
        return "Golongan UKT: " . $this->golonganUkt . " | Nama Wali: " . $this->namaWali;
    }

    // Method berisi Query SELECT - WHERE untuk kategori Mandiri
    public function getQuerySelect($dbConnection) {
        $query = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, golongan_ukt, nama_wali 
                  FROM tabel_mahasiswa 
                  WHERE jenis_pembayaran = 'Mandiri'";
        return $dbConnection->query($query);
    }
}