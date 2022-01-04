<?php
header("Access-Control-Allow-Origin: *");
header('content-type:text/html;charset=utf-8;multipart/from-data');

session_start();
$conn = ConnectSQLServer();
test();

$ip = getIp();

$action = $_POST['action'];
if (!empty($action)) {
    call_user_func($action);
}

////////////////////////////自定义api接口/////////////////////////////////

function login() //登录
{

    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if (empty($user) || empty($pwd))
        return;
    global $conn;
    $sql = "SELECT * FROM users WHERE `user`='" . $user . "' AND `pwd`='" . $pwd . "'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_array()) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['ide'] = $row['ide'];
        $_SESSION['company'] = $row['company'];
        echo json_encode(array(
            "id" => $row['id'],
            "name" => $row['name'],
            "ide" => $row['ide'],
            "company" => $row['company']
        ));
    }
}

function getlogin() //获取登录
{
    $id = $_SESSION['id'];
    global $conn;
    $sql = "SELECT * FROM users WHERE `id`='" . $id . "'";
    $result = $conn->query($sql);
    if ($row = $result->fetch_array()) {
        echo json_encode(array("id" => $id, "name" =>  $row['name'], "ide" =>  $row['ide'], "company" =>  $row['company']));
    }
}
function logout() //登出
{
    $_SESSION['id'] = null;
    $_SESSION['name'] = null;
    $_SESSION['ide'] = null;
    $_SESSION['company'] = null;
    echo "ok";
}

function register() //注册
{
    $name = $_POST['name'];
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $ide = $_POST['ide'];
    $time = time();
    if (empty($name) || empty($ide) || empty($phone) || empty($pwd) || empty($user) || empty($company)) {
        echo "不能为空";
        return;
    }
    global $conn;
    $sql = "SELECT * FROM users WHERE `user`='" . $user . "'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql2 = "INSERT INTO users (`name`,`user`,`pwd`,`company`,`img`,`phone`,`ide`,`time`) 
        VALUES ('" . $name . "','" . $user . "','" . $pwd . "','" . $company . "','','" . $phone . "','" . $ide . "','" . $time . "')";
        $res = $conn->query($sql2);
        if ($res) {
            // $_SESSION['id'] = $conn->insert_id;
            // $_SESSION['name'] = $name;
            // $_SESSION['ide'] = $ide;
            // $_SESSION['company'] = $company;
            echo json_encode(array(
                "id" => $conn->insert_id,
                "name" => $name,
                "ide" => $ide,
                "company" => $company
            ));
        }
    } else {
        echo "账号已存在";
    }
}
////////////////////////////附加api接口/////////////////////////////////

function getIp() //获取访问IP
{
    if ($_SERVER["HTTP_CLIENT_IP"] && strcasecmp($_SERVER["HTTP_CLIENT_IP"], "unknown")) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } else {
        if ($_SERVER["HTTP_X_FORWARDED_FOR"] && strcasecmp($_SERVER["HTTP_X_FORWARDED_FOR"], "unknown")) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if ($_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"], "unknown")) {
                $ip = $_SERVER["REMOTE_ADDR"];
            } else {
                if (
                    isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp(
                        $_SERVER['REMOTE_ADDR'],
                        "unknown"
                    )
                ) {
                    $ip = $_SERVER['REMOTE_ADDR'];
                } else {
                    $ip = "unknown";
                }
            }
        }
    }
    return ($ip);
}
function ConnectSQLServer() //连接SQL
{
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $dbname = "xhs";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    return $conn;
}
function test() //测试
{
    // $lasttime = strtotime(date("Y-m-d H:i:s", strtotime("+30seconds", time())));
    // echo $lasttime;
    // echo "</br>";
    // echo date("Y-m-d H:i:s", $lasttime);
    // echo "</br>";

    // $time = strtotime(date("Y-m-d H:i:s"), time());
    // echo $time;
    // echo "</br>";
    // echo date("Y-m-d H:i:s", $time);
    // echo "</br>";

    // if ($time > $lasttime) {
    //     echo "未签到";
    // } else {
    //     echo "已签到";
    // }
}
