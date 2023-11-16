<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "posttest5";

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (!$conn) {
    die("Cannot connect to database: " . mysqli_connect_error());
}

// Periksa apakah fungsi query sudah ada sebelumnya
if (!function_exists('query')) {
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
}
?>
