<?php
$servername = "localhost";
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "Restoran"; // nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);


// Fungsi untuk mengupdate data
function updateData($conn) {
    $id_menu = $_POST['id_menu'];
    $nama_makanan = $_POST['nama_makanan'];
    $jumlah_pesanan = $_POST['jumlah_pesanan'];
    $harga = $_POST['harga'];

    if (!empty($id_menu) && !empty($nama_makanan) && !empty($jumlah_pesanan) && !empty($harga)) {
        $sql = "UPDATE menu SET nama_makanan = ?, jumlah_pesanan = ?, harga = ? WHERE id_menu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $nama_makanan, $jumlah_pesanan, $harga, $id_menu);

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
updateData($conn);

// Menutup koneksi
$conn->close();
?>
