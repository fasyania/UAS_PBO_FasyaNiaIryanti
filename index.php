<?php
// Memuat koneksi database dan semua class komponen PBO (Tahap 3, 4, 5)
require_once 'koneksi.php';
require_once 'Mahasiswa.php';
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikmisi.php';
require_once 'MahasiswaPrestasi.php';

// Array bantuan untuk mengelompokkan kategori, class, dan judul tabel
$kategori_list = [
    [
        'judul' => 'Daftar Mahasiswa Jalur Mandiri',
        'class' => 'MahasiswaMandiri',
        'th_spesifik' => 'Spesifikasi Akademik (Golongan UKT & Wali)'
    ],
    [
        'judul' => 'Daftar Mahasiswa Jalur Bidikmisi',
        'class' => 'MahasiswaBidikmisi',
        'th_spesifik' => 'Spesifikasi Akademik (KIP & Dana Saku)'
    ],
    [
        'judul' => 'Daftar Mahasiswa Jalur Prestasi',
        'class' => 'MahasiswaPrestasi',
        'th_spesifik' => 'Spesifikasi Akademik (Instansi & Syarat IPK)'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Registrasi Pembayaran Kuliah Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f7f6; color: #333; }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        h2 { color: #2980b9; border-left: 5px solid #2980b9; padding-left: 10px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; margin-bottom: 20px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #34495e; color: #fff; }
        tr:hover { background-color: #f5f5f5; }
        .text-right { text-align: right; }
        .badge { padding: 5px 10px; background: #27ae60; color: white; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>

    <h1>SISTEM REGISTRASI PEMBAYARAN KULIAH MAHASISWA</h1>

    <?php foreach ($kategori_list as $kat): ?>
        <h2><?php echo $kat['judul']; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Semester</th>
                    <th>Tarif Dasar UKT</th>
                    <th><?php echo $kat['th_spesifik']; ?></th>
                    <th>Total Tagihan (Polimorfisme)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 1. Buat objek tiruan (dummy) untuk memanggil method query SELECT-WHERE milik subclass (Tahap 4)
                // Objek diisi nilai default dulu karena hanya dipakai untuk memanggil getQuerySelect()
                $dummyObj = new $kat['class'](0, '', '', 0, 0, '', '', '');
                $result = $dummyObj->getQuerySelect($dbConnection);

                if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                        
                        // 2. Instansiasi Objek Konkrit Secara Dinamis berdasarkan data asli database
                        if ($kat['class'] == 'MahasiswaMandiri') {
                            $mahasiswa = new MahasiswaMandiri(
                                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                                $row['semester'], $row['tarif_ukt_nominal'], 'Mandiri', 
                                $row['golongan_ukt'], $row['nama_wali']
                            );
                        } elseif ($kat['class'] == 'MahasiswaBidikmisi') {
                            $mahasiswa = new MahasiswaBidikmisi(
                                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                                $row['semester'], 0, 'Bidikmisi', 
                                $row['nomor_kip_kuliah'], $row['dana_saku_subsidi']
                            );
                        } else {
                            $mahasiswa = new MahasiswaPrestasi(
                                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                                $row['semester'], $row['tarif_ukt_nominal'], 'Prestasi', 
                                $row['nama_instansi_beasiswa'], $row['minimal_ipk_syarat']
                            );
                        }
                        ?>
                        <tr>
                            <td><?php echo $mahasiswa->getNim(); ?></td>
                            <td><strong><?php echo $mahasiswa->getNamaMahasiswa(); ?></strong></td>
                            <td>Semester <?php echo $mahasiswa->getSemester(); ?></td>
                            <td>Rp <?php echo number_format($mahasiswa->getTarifUktNominal(), 2, ',', '.'); ?></td>
                            <td><em><?php echo $mahasiswa->tampilkanSpesifikasiAkademik(); ?></em></td>
                            <td>
                                <strong>Rp <?php echo number_format($mahasiswa->hitungTagihanSemester(), 2, ',', '.'); ?></strong>
                            </td>
                        </tr>
                    <?php 
                    endwhile;
                else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: #999;">Tidak ada data untuk kategori ini.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endforeach; ?>

</body>
</html>

<?php
// Menutup koneksi di akhir halaman
$dbConnection->close();
?>