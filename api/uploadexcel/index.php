<?php
require_once 'ExcelReader.php';
$data = new Spreadsheet_Excel_Reader(); //创建对象
$data->setOutputEncoding('UTF-8'); //设置编码格式
$data->read("example.xls"); //读取excel文档
echo "<pre>";
print_r($data->sheets);
echo "</pre>";