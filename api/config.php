<?php
// $servername = "sdm816737144.my3w.com";
// $username = "sdm816737144";
// $password = "gniYeuJ.520";
// $dbname = "sdm816737144_db";
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "xhs";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
// $conn->close();