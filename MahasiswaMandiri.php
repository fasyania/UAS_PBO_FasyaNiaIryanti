<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    private $golonganUkt;
    private $namaWali;

    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran, $golonganUkt, $namaWali) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // ==================== METHOD OVERRIDING (TAHAP 5) ====================
    public function hitungTagihanSemester() {
        // Tarif UKT Nominal ditambah biaya operasional flat Rp 100.000
        return $this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik() {
        return "Golongan UKT: " . $this->golonganUkt . " | Nama Wali: " . $this->namaWali;
    }

    public function getQuerySelect($dbConnection) {
        $query = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, golongan_ukt, nama_wali 
                  FROM tabel_mahasiswa 
                  WHERE jenis_pembayaran = 'Mandiri'";
        return $dbConnection->query($query);
    }
}