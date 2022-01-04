<?php
header("Access-Control-Allow-Origin: *");
header('content-type:text/html;charset=utf-8;multipart/from-data');

require 'vendor/autoload.php';
require "../config.php";

$type = $_GET["type"];
$name = $_GET["name"];
$filename = "../excels/" . $name . "." . $type;
$type = ucfirst($type);

$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($type);
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($filename); //创建读取对象
$sheet = $spreadsheet->getActiveSheet(); // 取得活动表
$highestRow    = $sheet->getHighestRow(); // 取得总行数
$highestColumm = $sheet->getHighestColumn(); // 取得总列数

$data          = [];
$error = false;
$r = [];
$belong = "111111";
for ($row = 1; $row <= $highestRow; $row++) //行号从1开始
{
    if ($error) {
        break;
    };
    $r = [];
    for ($column = 'A'; $column <= 'G'; $column++) //列数是以A列开始
    {
        // if (empty($sheet->getCell($column . $row)->getValue()) == false) {
        //     $data[$row][$column] = $sheet->getCell($column . $row)->getValue();
        // }
        $tabname = $sheet->getCell($column . $row)->getValue();
        if ($row == 1) {
            if ($tabname != "名称" && $column == "A") {
                $error = true;
                break;
            }
            if ($tabname != "类型" && $column == "B") {
                $error = true;
                break;
            }
            if ($tabname != "ID" && $column == "C") {
                $error = true;
                break;
            }
            if ($tabname != "粉丝" && $column == "D") {
                $error = true;
                break;
            }
            if ($tabname != "总赞藏" && $column == "E") {
                $error = true;
                break;
            }
            if ($tabname != "链接" && $column == "F") {
                $error = true;
                break;
            }
            if ($tabname != "状态" && $column == "G") {
                $error = true;
                break;
            }
        } else {
            array_push($r, $tabname);
        }
    }
    if ($row != 1) {
        // echo json_encode($r);
        if (count($r) == 7) {
            $sql = "SELECT * FROM kolcs WHERE `aid`='" . $r[2] . "'";
            $result = $conn->query($sql);
            if ($result->num_rows != 1) {
                $sql = "INSERT INTO kolcs (`name`,`type`,`aid`,`fans`,`zan`,`link`,`state`,`time`,`belong`) VALUES ('" . $r[0] . "','" . $r[1] . "','" . $r[2] . "','" . $r[3] . "','" . $r[4] . "','" . $r[5] . "','" . $r[6] . "','" . time() . "','" . $belong . "')";
                $result = $conn->query($sql);
            }
        } else {
            echo "出错";
        }
    }
    // if (!isset($data[$row]['B'])) unset($data[$row]);
}
return;
// echo (json_encode($data));
