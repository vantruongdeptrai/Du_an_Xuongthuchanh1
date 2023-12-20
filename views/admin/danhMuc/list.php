<main class="sach">
    <div class="ttSach-admin">
        <table>
            <thead>
                <tr>
                    <th>ID danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <?php 
                foreach($loadallDm as $dm){
                    extract($dm);
                    $capnhat="index.php?act=update_dm&id=".$id;
                    echo '<tbody>
                    <tr>
                        <td>'.$id.'</td>
                        <td>'.$ten_danh_muc.'</td>
                        <td>'.$trang_thai.'</td>
                        <td><a href="'.$capnhat.'">Cập nhật</a></td>
                    </tr>
                </tbody>';
                }
            ?>
            
        </table>
    </div>
</main>