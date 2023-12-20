<?php
require_once "models/connectdb.php";

// Lấy tất cả các danh mục
function getAllDanhMuc() {
    $sql = "SELECT * FROM danh_muc";
    return getData($sql);
}

// Lấy thông tin một danh mục theo ID
function getOneDanhMuc($id) {
    $sql = "SELECT * FROM danh_muc WHERE id=?";
    return getData($sql, [$id]);
}

// Xóa một danh mục
function deleteDanhMuc($id) {
    $sql = "DELETE FROM danh_muc WHERE id=?";
    return getData($sql, [$id], false);
}

// Thêm một danh mục mới
function addDanhMuc($tenDanhMuc, $trangThai) {
    $sql = "INSERT INTO danh_muc (ten_danh_muc, trang_thai) VALUES (?, ?)";
    return getData($sql, [$tenDanhMuc, $trangThai], false);
}

// Cập nhật thông tin một danh mục
function updateDanhMuc($tenDanhMuc, $trangThai, $id) {
    $sql = "UPDATE danh_muc SET ten_danh_muc=?, trang_thai=? WHERE id=?";
    return getData($sql, [$tenDanhMuc, $trangThai, $id], false);
}
