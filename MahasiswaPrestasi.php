<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    // Properti tambahan spesifik terenkapsulasi
    private $namaInstansiBeasiswa;
    private $minimalIpkSyarat;

    // Constructor MahasiswaPrestasi
    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran, $namaInstansiBeasiswa, $minimalIpkSyarat) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // Implementasi abstract method 1: Hitung Tagihan
    public function hitungTagihanSemester() {
        // Mahasiswa Prestasi membayar UKT sesuai nominal yang tercatat (setelah potongan beasiswa)
        return $this->tarifUktNominal;
    }

    // Implementasi abstract method 2: Tampilkan Spesifikasi
    public function tampilkanSpesifikasiAkademik() {
        return "Instansi Beasiswa: " . $this->namaInstansiBeasiswa . " | Syarat Minimal IPK: " . $this->minimalIpkSyarat;
    }

    // Method berisi Query SELECT - WHERE untuk kategori Prestasi
    public function getQuerySelect($dbConnection) {
        $query = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, nama_instansi_beasiswa, minimal_ipk_syarat 
                  FROM tabel_mahasiswa 
                  WHERE jenis_pembayaran = 'Prestasi'";
        return $dbConnection->query($query);
    }
}
