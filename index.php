<?php
include "models/connectdb.php";
include "models/dangKy.php";
include "models/danhMuc.php";
include "models/nguoiDung.php";
include "models/sach.php";

include "views/admin/giaodien/header.php";

if (isset($_GET["act"])) {
    $act = $_GET['act'];
    switch ($act) {
        case "add_dm":
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(isset($_POST["them"])){
                    $ten_danh_muc = $_POST["tenDanhMuc"];
                    $trang_thai = $_POST["trangThai"];
                    addDanhMuc($ten_danh_muc, $trang_thai);
                    include "views/admin/danhMuc/list.php";
                }
            }else{
                $loadallDm = getAllDanhMuc();
                include "views/admin/danhMuc/add.php";
            }
            break;
        case "update_dm":
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $loadoneDm = getOneDanhMuc($id);
                include "views/admin/danhMuc/update.php";
            }
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(isset($_POST["capnhat"])){
                    $ten_danh_muc = $_POST["tenDanhMuc"];
                    $trang_thai = $_POST["trangThai"];
                    $id_dm = $_POST["iddm"];
                    updateDanhMuc($ten_danh_muc, $trang_thai, $id_dm);
                    $loadallDm = getAllDanhMuc();
                    include "views/admin/danhMuc/list.php";
                }
            }
            break;
        case "list_dm":
            $loadallDm = getAllDanhMuc();
            include "views/admin/danhMuc/list.php";
            break;
    }
}
include "views/admin/giaodien/footer.php";
?>