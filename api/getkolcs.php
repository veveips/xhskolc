<?php
header('Access-Control-Allow-Origin:*');
$r = [];
for ($i = 0; $i < 20; $i++) {
    array_push($r, array(
        "id" => "1",
        "name" => "达人昵称1",
        "cates" => "母婴宠物、美妆护肤、户外运动",
        "infos" => "场均销售额：20w、直播观看人数7.2w、直播带货场次8次",
        "brief" => "👉直播时间：全天24小时不间断直播，宝宝们赶紧关注我！",
        "date" => "2021/12/30",
        "aid" => "66710976",
        "fans" => "19.1万"
    ));
}
echo json_encode($r);
