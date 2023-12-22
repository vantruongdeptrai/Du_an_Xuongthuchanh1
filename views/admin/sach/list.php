<main class="sach">
    <div class="ttSach-admin">
        <h1>Danh mục</h1>
        <a href="index.php?act=add_dm" class="them">Thêm</a>
        <table>
            <tr class="line">
                <td>Stt</td>
                <td>Tên danh mục</td>
                <td>Trạng thái</td>
                <td>Số lượng sản phẩm</td>
                <td>Hành động</td>
            </tr>
            <?php foreach ($loadallDm as $i => $dm) {?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $dm['ten_danh_muc']?></td>
                <td><?php echo $dm['trang_thai']?></td>
                <?php  ?>
                <td><?php echo countSachInDanhMuc($dm['id'])?></td>
                <td>
                    <a href="index.php?act=update_dm&id=<?php echo $dm['id']?>">Sửa</a>
                    <a href="index.php?act=delete_dm&id=<?php echo $dm['id']?>">Xóa</a>
                    <a href="index.php?act=danhMuc&nd=view&id=<?php echo $dm['id']?>">view</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="index.php" class="them">Tất cả sản phẩm</a>
    </div>
    <div class="ttSach-admin">
        <h1>Sách</h1>
        <a href="index.php?act=sach&nd=addS" class="them">Thêm</a> <br>
        <table>
            <tr class="line">
                <td>Stt</td>
                <td>Tên sách</td>
                <td>Ảnh</td>
                <td>Id sách</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Trạng thái</td>
                <td>Kì học</td>
                <td>Hành động</td>
            </tr>
            <?php foreach ($loadallSach as $i => $s) {?>
            <tr>
                <td><?php echo $i?></td>
                <td>
                    <h3><?php echo $s['ten_sach']?></h3>
                    <p>
                        <?php
                        foreach ($loadallDm as $dm) {
                            if ($s['id_danh_muc'] == $dm['id']){
                                echo $dm['ten_danh_muc'];
                            }
                        }
                        ?>
                    </p>
                </td>
                <td >
                    <img src="<?php echo $s['hinh_anh']?>" alt="">
                </td>
                <td><?php echo $s['id']?></td>
                <td><?php echo $s['gia_ban']?></td>
                <td><?php echo $s['so_luong']?></td>
                <td><?php echo $s['trang_thai']?></td>
                <td><?php echo $s['ky']?></td>
                <td>
                    <a href="index.php?act=update_sach&id=<?php echo $s['id']?>">Sửa</a>
                    <a href="index.php?act=delete_sach&id=<?php echo $s['id']?>">Xóa</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</main>