<?php
require_once "models/connectdb.php";

// Lấy tất cả sách
function getAllSach()
{
    $sql = "SELECT * FROM sach";
    return getData($sql);
}
// lấy 8 sách
function getAllSach8($page, $max)
{
    $start = ($page - 1) * $max;
    $sql = "SELECT * FROM sach  LIMIT $start, $max";
    return getData($sql);
}
// đếm toàn bộ sách
function getAllCount()
{
    $sql = "SELECT COUNT(*) as total FROM sach";
    return getData($sql);
}
// đếm sách danh mục
function getAllCountD($id_d)
{
    $sql = "SELECT COUNT(*) as total FROM sach where id_danh_muc=?";
    return getData($sql, [$id_d]);
}
// Lấy thông tin một quyển sách theo ID
function getOneSach($id)
{
    $sql = "SELECT * FROM sach WHERE id_sach=?";
    return getData($sql, [$id]);
}

// Xóa một quyển sách
function deleteSach($id)
{
    $sql = "DELETE FROM sach WHERE id_sach=?";
    return getData($sql, [$id], false);
}

// Thêm một quyển sách mới
function addSach($ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai)
{
    $sql = "INSERT INTO sach (ky, ten_sach, gia_ban, so_luong, hinh_anh, mo_ta, id_danh_muc, trang_thai) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    return getData($sql, [$ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai], false);
}

// Cập nhật thông tin một quyển sách
function updateSach($ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai, $id)
{
    $sql = "UPDATE sach 
            SET ky=?, ten_sach=?, gia_ban=?, so_luong=?, hinh_anh=?, mo_ta=?, id_danh_muc=?, trang_thai=? 
            WHERE id_sach=?";
    return getData($sql, [$ky, $tenSach, $giaBan, $soLuong, $hinhAnh, $moTa, $idDanhMuc, $trangThai, $id], false);
}
// Đếm số lượng sách trong một danh mục cụ thể
function countSachInDanhMuc($idDanhMuc)
{
    $sql = "SELECT COUNT(*) as danhMuc FROM sach WHERE id_danh_muc=?";
    $result = getData($sql, [$idDanhMuc]);
    return $result[0]['danhMuc'];
}
// Lấy tất cả sách có id_danh_muc nhất định
function getSachByIdDanhMuc($idDanhMuc)
{
    $sql = "SELECT * FROM sach join danh_muc on sach.id_danh_muc = danh_muc.id_danh_muc WHERE sach.id_danh_muc=?";
    return getData($sql, [$idDanhMuc]);
}
function getSearch($page, $max, $txt)
{
    $start = ($page - 1) * $max;
    $keyword = '%' . $txt . '%'; // Thêm '%' ở đầu và cuối chuỗi tìm kiếm
    $sql = "SELECT * FROM `sach`  WHERE `ten_sach` LIKE '$keyword' LIMIT $start, $max ";
    return getData($sql);
}
