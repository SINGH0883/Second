<?php
session_start();
include "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: admin_login.php");
    exit();
}


$total_q   = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$male_q    = mysqli_query($conn, "SELECT COUNT(*) AS male FROM students WHERE gender='Male'");
$female_q  = mysqli_query($conn, "SELECT COUNT(*) AS female FROM students WHERE gender='Female'");

$total  = mysqli_fetch_assoc($total_q)['total'];
$male   = mysqli_fetch_assoc($male_q)['male'];
$female = mysqli_fetch_assoc($female_q)['female'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>

body {
    margin: 0;
    background: linear-gradient(135deg, #0d0d0d, #1f1f1f, #000000);
    height: 100vh;
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
}

.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 230px;
    height: 100%;
    backdrop-filter: blur(20px);
    background: rgba(255,255,255,0.07);
    box-shadow: 0 8px 32px rgba(0,0,0,0.4);
    border-right: 1px solid rgba(255,255,255,0.2);
    padding: 30px 20px;
}

.sidebar h2 {
    color: #fff;
    font-size: 28px;
    margin-bottom: 40px;
    font-weight: 600;
}

.sidebar a {
    display: block;
    padding: 14px;
    margin: 12px 0;
    background: rgba(255,255,255,0.1);
    border-radius: 12px;
    text-decoration: none;
    font-size: 17px;
    color: white;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.25);
    transform: translateX(8px);
    box-shadow: 0 0 15px #00eaff;
}

.main {
    margin-left: 260px;
    padding: 40px;
    color: white;
}

.card-container {
    display: flex;
    gap: 25px;
    margin-top: 20px;
}

.card {
    width: 260px;
    height: 150px;
    background: rgba(255,255,255,0.12);
    border-radius: 18px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    padding: 20px;
    color: white;
    transition: 0.4s;
    transform-style: preserve-3d;
}

.card:hover {
    transform: translateY(-12px) rotateX(8deg) rotateY(-8deg);
    box-shadow: 0 20px 45px rgba(0,255,255,0.5);
}

.card h3 {
    font-size: 22px;
    margin-bottom: 10px;
}

.card p {
    font-size: 36px;
    font-weight: bold;
    text-shadow: 0 0 5px cyan;
}
</style>
<link rel="icon" href="k.jpg">

</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="dashboard.php">📊 Dashboard</a>
    <a href="manage_students.php">👨‍🎓 Manage Students</a>
    <a href="export_csv.php">📥 Export CSV</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<div class="main">
    <h1>📊Data Dashboard</h1>

    <div class="card-container">
        <div class="card">
            <h3>Total Students</h3>
            <p><?= $total ?></p>
        </div>

        <div class="card">
            <h3>Male Students</h3>
            <p><?= $male ?></p>
        </div>

        <div class="card">
            <h3>Female Students</h3>
            <p><?= $female ?></p>
        </div>
    </div>

</div>

</body>
</html>
