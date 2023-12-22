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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["them"])) {
                    $ten_danh_muc = $_POST["tenDanhMuc"];
                    $trang_thai = $_POST["trangThai"];
                    addDanhMuc($ten_danh_muc, $trang_thai);
                    include "views/admin/danhMuc/list.php";
                }
            } else {
                $loadallDm = getAllDanhMuc();
                include "views/admin/danhMuc/add.php";
            }
            break;
        case "update_dm":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $loadoneDm = getOneDanhMuc($id);
                include "views/admin/danhMuc/update.php";
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["capnhat"])) {
                    $ten_danh_muc = $_POST["tenDanhMuc"];
                    $trang_thai = $_POST["trangThai"];
                    $id_dm = $_POST["iddm"];
                    updateDanhMuc($ten_danh_muc, $trang_thai, $id_dm);
                    $loadallDm = getAllDanhMuc();
                    include "views/admin/danhMuc/list.php";
                }
            }
            break;
        case "delete_dm":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $loadoneDm = getOneDanhMuc($id);
                deleteDanhMuc($id);
                $loadallDm = getAllDanhMuc();
                $loadallSach = getAllSach();
                include "views/admin/sach/list.php";
            }
            break;
        case "list_dm":
            $loadallDm = getAllDanhMuc();
            include "views/admin/danhMuc/list.php";
            break;

        case "add_sach":
            $loadallDm = getAllDanhMuc();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["them"])) {
                    $ky = $_POST['ky'];
                    $tenSach = $_POST['tenSach'];
                    $giaBan = $_POST['giaBan'];
                    $soLuong = $_POST['soLuong'];
                    $hinhAnh = img(); // lấy ở model/connectfb
                    $moTa = $_POST['moTa'];
                    $idDanhMuc = $_POST['idDanhMuc'];
                    $trangThai = $_POST['trangThai'];
                    addSach($ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $trangThai, $idDanhMuc);
                    $loadallSach = getAllSach();
                    $loadallDm = getAllDanhMuc();
                    include "views/admin/sach/list.php";
                }

            } else {
                $loadallDm = getAllDanhMuc();
                include "views/admin/sach/add.php";
            }

            break;
        case "delete_sach":
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $loadoneSach = getOneSach($id);
                deleteSach($id);
                $loadallDm = getAllDanhMuc();
                $loadallSach = getAllSach();
                include "views/admin/sach/list.php";
            }
            break;
        case "update_sach":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["capnhat"])) {
                    $ky = $_POST['ky'];
                    $tenSach = $_POST['tenSach'];
                    $giaBan = $_POST['giaBan'];
                    $soLuong = $_POST['soLuong'];
                    $oldimg = $_POST['oldimg']; // lấy đường dẫn ảnh cũ nếu chưa upload ảnh mới
                    $hinhAnh = $oldimg;
                    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
                        $hinhAnh = img(); // kiểm tra lếu có ảnh mới thì lấy đường dẫn ảnh mới
                    }
                    $moTa = $_POST['moTa'];
                    $idDanhMuc = $_POST['idDanhMuc'];
                    $trangThai = $_POST['trangThai'];
                    $id = $_POST['id'];
                    updateSach($ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai, $id);
                    $loadallDm = getAllDanhMuc();
                    $loadallSach = getAllSach();
                    include "views/admin/sach/list.php";
                }
            } else {
                $id = $_GET["id"];
                $loadoneSach = getOneSach($id);
                $loadallDm = getAllDanhMuc();
                //var_dump($loadallDm);
                include "views/admin/sach/update.php";
            }
            break;
        case "list_sach":
            $loadallSach = getAllSach();
            $loadallDm = getAllDanhMuc();
            //var_dump($loadallSach);
            include "views/admin/sach/list.php";
            break;

    }
}
include "views/admin/giaodien/footer.php";
?>