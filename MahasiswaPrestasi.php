<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    private $namaInstansiBeasiswa;
    private $minimalIpkSyarat;

    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran, $namaInstansiBeasiswa, $minimalIpkSyarat) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // ==================== METHOD OVERRIDING (TAHAP 5) ====================
    public function hitungTagihanSemester() {
        // Mendapat potongan 75%, hanya membayar 25% dari tarif asli
        return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik() {
        return "Instansi Beasiswa: " . $this->namaInstansiBeasiswa . " | Syarat Minimal IPK: " . $this->minimalIpkSyarat;
    }

    public function getQuerySelect($dbConnection) {
        $query = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, nama_instansi_beasiswa, minimal_ipk_syarat 
                  FROM tabel_mahasiswa 
                  WHERE jenis_pembayaran = 'Prestasi'";
        return $dbConnection->query($query);
    }
}