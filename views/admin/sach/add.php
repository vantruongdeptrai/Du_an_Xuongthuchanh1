<main class="sach">
    <div class="ttSach-admin">
        <h1>Thêm Sách</h1>
        <form action="index.php?act=add_sach" method="post" enctype="multipart/form-data">
            <label for="ky">Kỳ:</label>
            <input type="text" id="ky" name="ky"><br>

            <label for="tenSach">Tên Sách:</label>
            <input type="text" id="tenSach" name="tenSach"><br>

            <label for="giaBan">Giá Bán:</label>
            <input type="text" id="giaBan" name="giaBan"><br>

            <label for="soLuong">Số Lượng:</label>
            <input type="text" id="soLuong" name="soLuong"><br>

            <label for="hinhAnh">Hình Ảnh:</label>
            <input type="file" id="hinhAnh" name="hinhAnh"><br>

            <label for="moTa">Mô Tả:</label>
            <input type="text" id="moTa" name="moTa"><br>

            <label for="idDanhMuc">ID Danh Mục:</label>
            <select name="idDanhMuc" id="">
                <?php foreach ($loadallDm as $dm) {?>
                <option value="<?php echo $dm['id']?>"><?php echo $dm['ten_danh_muc']?></option>
                <?php } ?>
            </select>
            <label for="trangThai">Trạng Thái:</label>
            <input type="text" id="trangThai" name="trangThai" value="0"><br>

            <input type="submit" value="Thêm" name="them">
        </form>
        <a href="index.php">Trở lại</a>
    </div>
</main>
