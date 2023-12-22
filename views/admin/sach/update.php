<main class="sach">
    <div class="ttSach-admin">
        <h1>Cập Nhật Sách</h1>
        <form action="index.php?act=update_sach" method="post" enctype="multipart/form-data">
            <?php foreach ($loadoneSach as $s) { ?>
                <label for="ky">Kỳ:</label>
                <input type="text" id="ky" name="ky" value="<?php echo $s['ky']; ?>"><br>

                <label for="tenSach">Tên Sách:</label>
                <input type="text" id="tenSach" name="tenSach" value="<?php echo $s['ten_sach']; ?>"><br>

                <label for="giaBan">Giá Bán:</label>
                <input type="text" id="giaBan" name="giaBan" value="<?php echo $s['gia_ban']; ?>"><br>

                <label for="soLuong">Số Lượng:</label>
                <input type="text" id="soLuong" name="soLuong" value="<?php echo $s['so_luong']; ?>"><br>

                <label for="hinhAnh">Hình Ảnh:</label>
                <input type="file" id="hinhAnh" name="hinhAnh"><br>

                <label for="moTa">Mô Tả:</label>
                <input type="text" id="moTa" name="moTa" value="<?php echo $s['mo_ta']; ?>"><br>

                <label for="idDanhMuc">ID Danh Mục:</label>
                <select name="idDanhMuc" id="">
                    <?php foreach ($loadallDm as $dm) { ?>
                        <option value="<?php echo $dm['id'] ?>" <?php if ($dm['id'] == $s['id_danh_muc'])
                              echo 'selected'; ?>>
                            <?php echo $dm['ten_danh_muc'] ?>
                        </option>
                    <?php } ?>
                </select>

                <label for="trangThai">Trạng Thái:</label>
                <input type="text" id="trangThai" name="trangThai" value="<?php echo $s['trang_thai']; ?>"><br>

                <input type="hidden" name="id" value="<?php echo $s['id']; ?>">

                <input type="hidden" name="oldimg" value="<?php echo $s['hinh_anh']; ?>">

                <input type="submit" value="Cập Nhật" name="capnhat">
            <?php } ?>
        </form>
        <a href="index.php">Trở lại</a>
    </div>
</main>