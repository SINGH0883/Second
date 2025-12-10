<?php
include "db.php";  // MUST load $conn

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = intval($_GET['id']); // Security

// Delete query
$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql)) {
    echo "<script>
            alert('Student deleted successfully!');
            window.location.href='manage_students.php';
          </script>";
} else {
    echo "Error deleting student: " . $conn->error;
}
?>
