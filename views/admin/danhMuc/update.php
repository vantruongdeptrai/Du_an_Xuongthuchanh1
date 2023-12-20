<main class="sach">
    <div class="ttSach-admin">
        <h1>Cập nhật danh mục</h1>
        <form action="index.php?act=update_dm" method="post">
            <?php foreach ($loadoneDm as $dm) {?>
            <input type="text" name="tenDanhMuc" value="<?php echo $dm['ten_danh_muc']?>">
            <input type="text" name="trangThai" value="<?php echo $dm['trang_thai']?>">
            <input type="hidden" name="iddm" value="<?php echo $dm['id']?>">
            <input type="submit" value="Cập nhật" name="capnhat">
            <?php } ?>
        </form>
        <a href="index.php">Trở lại</a>
    </div>
</main>