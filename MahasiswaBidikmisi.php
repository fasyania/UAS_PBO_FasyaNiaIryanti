<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // Properti tambahan spesifik terenkapsulasi
    private $nomorKipKuliah;
    private $danaSakuSubsidi;

    // Constructor MahasiswaBidikmisi
    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran, $nomorKipKuliah, $danaSakuSubsidi) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // Implementasi abstract method 1: Hitung Tagihan
    public function hitungTagihanSemester() {
        // Mahasiswa Bidikmisi mendapatkan UKT Rp 0 (Gratis)
        return 0;
    }

    // Implementasi abstract method 2: Tampilkan Spesifikasi
    public function tampilkanSpesifikasiAkademik() {
        return "Nomor KIP Kuliah: " . $this->nomorKipKuliah . " | Dana Saku Subsidi: Rp " . number_format($this->danaSakuSubsidi, 2, ',', '.');
    }

    // Method berisi Query SELECT - WHERE untuk kategori Bidikmisi
    public function getQuerySelect($dbConnection) {
        $query = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, nomor_kip_kuliah, dana_saku_subsidi 
                  FROM tabel_mahasiswa 
                  WHERE jenis_pembayaran = 'Bidikmisi'";
        return $dbConnection->query($query);
    }
}