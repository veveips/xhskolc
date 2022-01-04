<?php
header("Access-Control-Allow-Origin: *");
header('content-type:text/html;charset=utf-8;multipart/from-data');

require 'uploadexcel/vendor/autoload.php';
require "config.php";

$temp = iconv("UTF-8", "GBK",  getUnixTimestamp());
$filename = $_FILES['file']['name'];
$filename = str_replace(strrchr($filename, "."), "", $filename);
if (!file_exists("excels")) {
    mkdir("excels");
};

if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], "excels/" . $temp . "." . $_POST["type"])) {
        $rtn = upload($temp, $_POST["type"]);
        if (substr($rtn, 0, 12) == "上传成功") {
            $state = "上传成功";
            $rtn = substr($rtn, 12);
        } else {
            $state = "上传失败";
        }
        echo json_encode(array(
            "name" =>  $_FILES['file']['name'],
            "size" =>  $_FILES['file']['size'],
            "type" =>  $_POST["type"],
            "state" => $state,
            "brief" => $rtn
        ));
    };
}

function getUnixTimestamp()
{
    list($s1, $s2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}


function upload($name, $type)
{
    $filename = "excels/" . $name . "." . $type;
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
    global $conn;
    $num = 0;
    $repeat = 0;
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
                    return "表格无名称列";
                    break;
                }
                if ($tabname != "类型" && $column == "B") {
                    $error = true;
                    return "表格无类型列";
                    break;
                }
                if ($tabname != "ID" && $column == "C") {
                    $error = true;
                    return "表格无ID列";
                    break;
                }
                if ($tabname != "粉丝" && $column == "D") {
                    $error = true;
                    return "表格无粉丝列";
                    break;
                }
                if ($tabname != "总赞藏" && $column == "E") {
                    $error = true;
                    return "表格无总赞藏列";
                    break;
                }
                if ($tabname != "链接" && $column == "F") {
                    $error = true;
                    return "表格无链接列";
                    break;
                }
                if ($tabname != "状态" && $column == "G") {
                    $error = true;
                    return "表格无状态列";
                    break;
                }
            } else {
                array_push($r, $tabname);
            }
        }
        if ($row != 1) {
            if (count($r) == 7) {
                $sql = "SELECT * FROM kolcs WHERE `aid`='" . $r[2] . "' and `belong`='" . $belong . "'";
                $result = $conn->query($sql);
                if ($result->num_rows != 1) {
                    $sql = "INSERT INTO kolcs (`name`,`type`,`aid`,`fans`,`zan`,`link`,`state`,`time`,`belong`) VALUES ('" . $r[0] . "','" . $r[1] . "','" . $r[2] . "','" . $r[3] . "','" . $r[4] . "','" . $r[5] . "','" . $r[6] . "','" . time() . "','" . $belong . "')";
                    $result = $conn->query($sql);
                    $num += 1;
                } else {
                    $repeat += 1;
                }
            } else {
                return "表格数据不足";
            }
        }
    }
    return "上传成功共录入" . $num . "个\n重复录入" . $repeat . "个";
}
