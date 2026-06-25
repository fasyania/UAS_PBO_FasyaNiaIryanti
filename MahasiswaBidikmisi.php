<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private $nomorKipKuliah;
    private $danaSakuSubsidi;

    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran, $nomorKipKuliah, $danaSakuSubsidi) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // ==================== METHOD OVERRIDING (TAHAP 5) ====================
    public function hitungTagihanSemester() {
        // Digratiskan penuh (Rp 0) karena ditanggung negara
        return 0;
    }

    public function tampilkanSpesifikasiAkademik() {
        return "Nomor KIP Kuliah: " . $this->nomorKipKuliah . " | Dana Saku Subsidi: Rp " . number_format($this->danaSakuSubsidi, 2, ',', '.');
    }

    public function getQuerySelect($dbConnection) {
        $query = "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, nomor_kip_kuliah, dana_saku_subsidi 
                  FROM tabel_mahasiswa 
                  WHERE jenis_pembayaran = 'Bidikmisi'";
        return $dbConnection->query($query);
    }
}