<?php
require_once "models/connectdb.php";

// Lấy tất cả các đăng ký
function getAllDangKy()
{
    $sql = "SELECT * FROM dang_ky";
    return getData($sql);
}

// Lấy thông tin một đăng ký theo ID
function getOneDangKy($id)
{
    $sql = "SELECT * FROM dang_ky WHERE id_nguoi_dung=?";
    return getData($sql, [$id]);
}

// Xóa một đăng ký
function deleteDangKy($id)
{
    $sql = "DELETE FROM dang_ky WHERE id_dang_ky=?";
    return getData($sql, [$id], false);
}

// Thêm một đăng ký mới
function addDangKy($idNguoiDung, $idSach, $soLuong, $diaChi, $tongGia, $ngayDat, $trangThai)
{
    $sql = "INSERT INTO dang_ky (id_nguoi_dung, id_sach, so_luong, dia_chi, tong_gia, ngay_dat, trang_thai) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    return getData($sql, [$idNguoiDung, $idSach, $soLuong, $diaChi, $tongGia, $ngayDat,  $trangThai], false);
}

// Cập nhật thông tin một đăng ký
function updateDangKy($idNguoiDung, $idSach, $soLuong, $diaChi, $tongGia, $ngayDat, $ngayNhan, $trangThai, $id)
{
    $sql = "UPDATE dang_ky 
            SET id_nguoi_dung=?, id_sach=?, so_luong=?, dia_chi=?, tong_gia=?, ngay_dat=?, ngay_nhan=?, trang_thai=? 
            WHERE id_dang_ky=?";
    return getData($sql, [$idNguoiDung, $idSach, $soLuong, $diaChi, $tongGia, $ngayDat, $ngayNhan, $trangThai, $id], false);
}
// Cập nhật trạng thái của đăng ký có ID $id thành "Đang giao" (giả sử 1 là trạng thái đang giao)
function updateDangGiao($id)
{

    $trangThaiMoi = 2;

    $sql = "UPDATE dang_ky SET trang_thai = ? WHERE id_dang_ky = ?";
    return getData($sql, [$trangThaiMoi, $id], false);
}
// Cập nhật trạng thái của đăng ký có ID $id thành "Đang giao" (giả sử 1 là trạng thái đang giao)
function updateDaGiao($id)
{
    $trangThaiMoi = 3;
    $sql = "UPDATE dang_ky SET trang_thai = ? WHERE id_dang_ky = ?";
    return getData($sql, [$trangThaiMoi, $id], false);
}
function updateHuy($id)
{
    $trangThaiMoi = 0;
    $sql = "UPDATE dang_ky SET trang_thai = ? WHERE id_dang_ky = ?";
    return getData($sql, [$trangThaiMoi, $id], false);
}
