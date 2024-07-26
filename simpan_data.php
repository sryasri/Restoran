<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Restoran"; 

$conn = new mysqli($servername, $username, $password, $dbname);


// Fungsi untuk menyimpan data
function simpanData($conn) {
    $nama_makanan = $_POST['nama_makanan'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $harga = $_POST['harga'];

    if (!empty($nama_makanan) && !empty($jumlah_pesanan) && !empty($harga)) {
        $sql = "INSERT INTO pesanan (nama_makanan, jumlah_pesanan, harga) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $nama_makanan, $jumlah_pesanan, $harga);

        if ($stmt->execute()) {
            echo "1";
        } else {
            echo "2";
        }

        $stmt->close();
    } else {
        echo "Semua input harus diisi!";
    }
}

// Menjalankan fungsi
simpanData($conn);

// Menutup koneksi
$conn->close();
?>
