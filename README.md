# Lab7Web
# Laporan Praktikum 7: PHP Dasar

Ini adalah Laporan untuk Praktikum Pemrograman Web (Praktikum 7) yang berfokus pada dasar-dasar PHP.

* **Nama:** M.Ridho Febrian
* **NIM:** 312410500
* **Kelas:** TI.24.A.5

---

## 1. Penyiapan Lingkungan

Langkah pertama adalah memastikan XAMPP Control Panel berjalan, khususnya modul **Apache Web Server**. Ini diperlukan agar skrip PHP dapat dieksekusi di sisi server (server-side).

**[Screenshot XAMPP Control Panel Anda yang menunjukkan Apache berjalan]**

## 2. Latihan Dasar-Dasar PHP

Bagian ini mencakup semua latihan yang ada di modul, yang dikerjakan dalam satu file `php_dasar.php`.

### A. Hello World & Variabel
Latihan awal untuk mencetak "Hello World" menggunakan `echo` dan menampilkan isi variabel (seperti `$nim` dan `$nama`).

**[Screenshot hasil latihan Variabel Anda]**

### B. Form Input (Metode POST)
Latihan membuat form HTML sederhana dengan `method="post"` dan menangkap data yang dikirim menggunakan *predefine variable* `$_POST` di PHP.

**[Screenshot hasil latihan Form Input (sebelum dan sesudah submit)]**

### C. Operator, Kondisi IF & Switch
Latihan menggunakan operator aritmatika untuk menghitung gaji dan struktur kondisi `if-elseif-else` serta `switch-case` untuk menampilkan nama hari.

**[Screenshot hasil latihan Operator, IF, dan Switch Anda]**

### D. Perulangan (For, While, Do-While)
Latihan terakhir adalah mengimplementasikan tiga jenis perulangan:
* `for` (untuk perulangan naik dan turun)
* `while`
* `do-while`

**[Screenshot hasil latihan Perulangan Anda]**

---

## 3. Tugas Akhir Praktikum

Ini adalah program utama yang diminta oleh tugas praktikum.

Program ini terdiri dari form input yang meminta:
1.  Nama
2.  Tanggal Lahir
3.  Pekerjaan

Setelah form disubmit, skrip PHP akan memproses data tersebut untuk:
* **Menghitung Umur:** Menggunakan selisih (`diff`) antara tanggal hari ini (`new DateTime('today')`) dan tanggal lahir yang diinput.
* **Menentukan Gaji:** Menggunakan struktur `switch-case` untuk memberikan nilai gaji yang berbeda berdasarkan pilihan pekerjaan.

### Tampilan Form Input

Ini adalah tampilan awal program saat dimuat di browser.

**[Screenshot Form Input Tugas Akhir Anda (sebelum diisi)]**

### Hasil Output Program

Ini adalah hasil setelah form diisi dan tombol "Kirim" ditekan. Program berhasil menampilkan nama, tanggal lahir, umur (hasil kalkulasi), pekerjaan, dan gaji (sesuai `switch-case`).

**[Screenshot Hasil Output Tugas Akhir Anda (setelah diisi)]**

### Kode Program (php_dasar.php)

Berikut adalah kode lengkap yang digunakan untuk tugas akhir ini.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas Praktikum 7 - PHP Dasar</title>
    <style>
        /* CSS Sederhana untuk mempercantik tampilan */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9f7ef;
            border: 1px solid #b8dcb8;
            border-radius: 5px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Form Input Karyawan</h2>
        
        <form method="post" action="">
            <label>Nama: </label>
            <input type="text" name="nama" required>
            
            <label>Tanggal Lahir: </label>
            <input type="date" name="tgl_lahir" required>
            
            <label>Pekerjaan: </label>
            <select name="pekerjaan" required>
                <option value="">-- Pilih Pekerjaan --</option>
                <option value="Programmer">Programmer</option>
                <option value="Designer">Designer</option>
                <option value="Manager">Manager</option>
                <option value="Marketing">Marketing</option>
            </select>
            
            <input type="submit" name="submit" value="Kirim">
        </form>

        <?php
        // Blok PHP ini akan dieksekusi HANYA jika tombol 'submit' ditekan
        if (isset($_POST['submit'])) {
            
            // 1. Ambil data dari form
            $nama = $_POST['nama'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $pekerjaan = $_POST['pekerjaan'];

            // 2. Menghitung Umur berdasarkan tanggal lahir
            $tgl_lahir_obj = new DateTime($tgl_lahir);
            $hari_ini = new DateTime('today');
            $umur = $hari_ini->diff($tgl_lahir_obj);
            $umur_tahun = $umur->y;

            // 3. Menentukan Gaji berdasarkan Pekerjaan (menggunakan 'switch')
            $gaji = 0;
            switch ($pekerjaan) {
                case "Programmer":
                    $gaji = 12000000;
                    break;
                case "Designer":
                    $gaji = 10000000;
                    break;
                case "Manager":
                    $gaji = 20000000;
                    break;
                case "Marketing":
                    $gaji = 8000000;
                    break;
                default:
                    $gaji = 4000000; // Gaji default jika tidak ada pilihan
            }

            // 4. Menampilkan Output
            echo '<div class="result">';
            echo '<h3>Hasil Data Karyawan:</h3>';
            echo 'Nama: <strong>' . htmlspecialchars($nama) . '</strong><br>';
            echo 'Tanggal Lahir: <strong>' . $tgl_lahir . '</strong><br>';
            echo 'Umur: <strong>' . $umur_tahun . ' tahun</strong><br>';
            echo 'Pekerjaan: <strong>' . htmlspecialchars($pekerjaan) . '</strong><br>';
            echo 'Gaji: <strong>Rp. ' . number_format($gaji, 0, ',', '.') . '</strong>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>
