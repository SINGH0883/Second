<?php
include "db.php";

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=students.csv");

$output = fopen("php://output", "w");
fputcsv($output, ["ID", "Name", "Admission No", "Email", "Contact", "Gender", "Address"]);

$result = mysqli_query($connect, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, [
        $row['id'],
        $row['name'],
        $row['admission_no'],
        $row['email'],
        $row['contact'],
        $row['gender'],
        $row['address']
    ]);
}

fclose($output);
exit();
?>
