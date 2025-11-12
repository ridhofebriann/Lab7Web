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
            // Buat objek tanggal dari string tanggal lahir
            $tgl_lahir_obj = new DateTime($tgl_lahir);
            // Buat objek tanggal untuk hari ini
            $hari_ini = new DateTime('today');
            // Hitung selisih antara hari ini dan tanggal lahir
            $umur = $hari_ini->diff($tgl_lahir_obj);
            // Ambil hanya bagian tahun dari selisih tersebut
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
            // htmlspecialchars() untuk keamanan dasar
            echo 'Nama: <strong>' . htmlspecialchars($nama) . '</strong><br>';
            echo 'Tanggal Lahir: <strong>' . $tgl_lahir . '</strong><br>';
            echo 'Umur: <strong>' . $umur_tahun . ' tahun</strong><br>';
            echo 'Pekerjaan: <strong>' . htmlspecialchars($pekerjaan) . '</strong><br>';
            // number_format() untuk menampilkan format mata uang
            echo 'Gaji: <strong>Rp. ' . number_format($gaji, 0, ',', '.') . '</strong>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>