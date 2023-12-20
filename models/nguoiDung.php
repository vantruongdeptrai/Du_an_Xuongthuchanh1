<?php
require_once "models/connectdb.php";

// Lấy tất cả người dùng
function getAllNguoiDung()
{
    $sql = "SELECT * FROM nguoi_dung";
    return getData($sql);
}

// Lấy một người dùng theo ID
function getOneNguoiDung($id)
{
    $sql = "SELECT * FROM nguoi_dung WHERE id_nguoi_dung=?";
    return getData($sql, [$id]);
}

// Xóa một người dùng
function deleteNguoiDung($id)
{
    $sql = "DELETE FROM nguoi_dung WHERE id_nguoi_dung=?";
    return getData($sql, [$id], false);
}

// Thêm một người dùng mới
function addNguoiDung($maNguoiDung, $tenNguoiDung, $email, $soDienThoai, $matKhau, $capBac, $trangThai)
{
    $sql = "INSERT INTO nguoi_dung (ma_nguoi_dung, ten_nguoi_dung, email, so_dien_thoai, mat_khau, cap_bac, trang_thai) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    return getData($sql, [$maNguoiDung, $tenNguoiDung, $email, $soDienThoai, $matKhau, $capBac, $trangThai], false);
}

// Cập nhật thông tin người dùng
function updateNguoiDung($maNguoiDung, $tenNguoiDung, $email, $soDienThoai, $matKhau, $capBac, $trangThai, $id)
{
    $sql = "UPDATE nguoi_dung 
            SET ma_nguoi_dung=?, ten_nguoi_dung=?, email=?, so_dien_thoai=?, mat_khau=?, cap_bac=?, trang_thai=? 
            WHERE id_nguoi_dung=?";
    return getData($sql, [$maNguoiDung, $tenNguoiDung, $email, $soDienThoai, $matKhau, $capBac, $trangThai, $id], false);
}
function getAdmin()
{
    $sql = "SELECT * FROM nguoi_dung WHERE cap_bac = 1 ORDER BY id_nguoi_dung DESC";
    return getData($sql);
}
function getND()
{
    $sql = "SELECT * FROM nguoi_dung WHERE cap_bac = 0 ORDER BY id_nguoi_dung DESC";
    return getData($sql);
}
function checkInfo($email, $mat_khau)
{
    $sql = "SELECT * FROM nguoi_dung WHERE email = ? AND mat_khau = ?";
    $info = getData($sql, [$email, $mat_khau]);
    if (count($info) > 0) {
        return $info[0];
    } else {
        return null;
    }
}
function deletend($id)
{
    $sql = "DELETE FROM `nguoi_dung`  WHERE id_nguoi_dung=?";
    return getData($sql, [$id], false);
}
