<?php

// Pastikan nama class diawali huruf kapital sesuai standar OOP
abstract class Mahasiswa {
    // Properti / Atribut Terenkapsulasi (Protected)
    // Nilai properti ini pas dengan kolom di tabel_mahasiswa (Tahap 1)
    protected $id_mahasiswa;
    protected $nama_mahasiswa;
    protected $nim;
    protected $semester;
    protected $tarifUktNominal; // Dipetakan dari kolom tarif_ukt_nominal
    protected $jenis_pembayaran;

    // Constructor untuk menginisialisasi atribut global saat objek dibuat
    public function __construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal, $jenis_pembayaran) {
        $this->id_mahasiswa = $id_mahasiswa;
        $this->nama_mahasiswa = $nama_mahasiswa;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUktNominal;
        $this->jenis_pembayaran = $jenis_pembayaran;
    }

    // ==================== ABSTRACT METHODS ====================
    // Wajib dideklarasikan tanpa isi (body) dan harus diimplementasikan di class anak
    
    // Metode untuk menghitung total tagihan semester mahasiswa
    abstract public function hitungTagihanSemester();

    // Metode untuk menampilkan informasi spesifik akademis masing-masing kategori
    abstract public function tampilkanSpesifikasiAkademik();
    
    // ==================== GETTER METHODS (Opsional tapi berguna) ====================
    // Karena properti protected, kita siapkan fungsi getter jika nanti butuh mencetak data global
    public function getIdMahasiswa() { return $this->id_mahasiswa; }
    public function getNamaMahasiswa() { return $this->nama_mahasiswa; }
    public function getNim() { return $this->nim; }
    public function getSemester() { return $this->semester; }
    public function getTarifUktNominal() { return $this->tarifUktNominal; }
    public function getJenisPembayaran() { return $this->jenis_pembayaran; }
}