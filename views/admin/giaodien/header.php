<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sản phẩm</title>
    <link rel="stylesheet" href="public/css/styleAD.css">
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <h3><a href="index.php" style="color: white">Admin</a></h3>
        </div>
        <div class="timKiem">
            <form action="">
                <input type="search" placeholder="Tìm kiếm">
            </form>
        </div>
        <nav>
            <ul class="menunav">
                <li><a href="index.php?act=danhmuc">Danh mục</a>
                <ul class="conmenu">
                    <li>
                        <a href="index.php?act=add_dm">Thêm danh mục</a>
                    </li>
                    <li>
                        <a href="index.php?act=list_dm">Danh sách danh mục</a>
                    </li>
                </ul>
            </li>
                <li><a href="index.php?act=sach">Sách</a>
                <ul class="conmenu">
                    <li>
                        <a href="index.php?act=add_sach">Thêm sách</a>
                    </li>
                    <li>
                        <a href="index.php?act=list_sach">Danh sách sách</a>
                    </li>
                </ul></li>
                <li><a href="index.php?act=nguoiDung">Người dùng</a></li>
                <li><a href="index.php?act=dangXuat">Đăng xuất</a></li>
            </ul>
        </nav>
    </header>