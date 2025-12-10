<?php
include "db.php";

$students = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Students</title>

<style>
body {
    background: #111;
    color: white;
    font-family: Arial, sans-serif;
    padding: 20px;
}
table {
    width: 100%; 
    border-collapse: collapse; 
    margin-top: 20px;
}
th, td {
    padding: 12px; 
    border-bottom: 1px solid #444;
}
th {
    background: #222; 
    color: cyan;
}
.delete-btn {
    color: #ff5555;
    font-weight: bold;
    text-decoration: none;
}
.delete-btn:hover {
    color: red;
}
</style>

</head>
<body>

<h2>Manage Students</h2>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Admission No</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Address</th>
    <th>message</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($students)) { ?>
<tr>
    <td><?= $row['id'] ?></td>

    <td><?= $row['first_name'] . " " . $row['last_name'] ?></td>

    <td><?= $row['admission_no'] ?></td>

    <td><?= $row['email'] ?></td>

    <td><?= $row['contact_number'] ?></td>

    <td><?= $row['gender'] ?></td>

    <td><?= $row['address'] ?></td>
    <td><?= $row['message'] ?></td>
    <td>
        <a class="delete-btn" 
           href="delete_student.php?id=<?= $row['id'] ?>" 
           onclick="return confirm('Delete this student?');">
           Delete
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
