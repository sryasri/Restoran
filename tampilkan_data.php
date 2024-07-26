<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Restoran"; 

$conn = new mysqli($servername, $username, $password, $dbname);



// Fungsi untuk menampilkan data
function tampilkanData($conn) {
    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo "Data kosong";
    }

    echo json_encode($data);
}

// Menjalankan fungsi
tampilkanData($conn);

// Menutup koneksi
$conn->close();
?>
