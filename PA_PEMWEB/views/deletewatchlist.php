<?php
session_start();
require "../actions/db_connect.php";

if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];

    $user_id = $_SESSION['user_id'];

    $check_entry_query = $conn->prepare("SELECT * FROM watchlist WHERE user_id = ? AND film_id = ?");
    $check_entry_query->bind_param("ii", $user_id, $film_id);
    $check_entry_query->execute();
    $result = $check_entry_query->get_result();

    if ($result->num_rows > 0) {

        $delete_query = $conn->prepare("DELETE FROM watchlist WHERE user_id = ? AND film_id = ?");
        $delete_query->bind_param("ii", $user_id, $film_id);

        if ($delete_query->execute()) {
            echo "
                <script>
                    alert('Film berhasil dihapus dari watchlist!');
                    window.location.href = 'dashboardUser.php';
                </script>";
        } else {
            echo "Error: " . $delete_query->error;
        }

        $delete_query->close();
    } else {
        echo "
            <script>
                alert('Film tidak ditemukan dalam watchlist!');
                window.location.href = 'dashboardUser.php';
            </script>";
    }
} else {
    echo "
        <script>
            alert('Parameter film_id tidak ditemukan!');
            window.location.href = 'dashboardUser.php';
        </script>";
}
?>
