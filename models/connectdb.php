<?php
function connect()
{
    $dburl = "mysql:host=localhost;dbname=quan_li_sach;charset=utf8";
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Success";
    } catch (PDOException $e) {
        //echo "Fail";
    }

    return $conn;
}
function getData($query, $params = [], $getAll = true)
{
    // hàm này dùng để thêm sửa xóa select
    // nếu muốn thêm sử xóa thì chuyền false
    // nếu muốn select thì không cần chuyền gì
    $conn = connect();
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    if ($getAll) {
        return $stmt->fetchAll();
    }
    return $stmt->fetch();
}
function img(){
    if (isset($_FILES["hinhAnh"]) && $_FILES["hinhAnh"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "models/uploads/";
        $target_file = $target_dir . basename($_FILES["hinhAnh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra file ảnh là ảnh thật hay ảnh giả
        $check = getimagesize($_FILES["hinhAnh"]["tmp_name"]);
        if ($check === false) {
            throw new Exception("File is not an image.");
        }
        // Kiểm tra kích thước tệp
        // Cho phép một số định dạng tệp nhất định
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        //            // Kiểm tra xem tập tin đã tồn tại chưa và ngăn ghi đè
        //            if (file_exists($target_file)) {
        //                $target_file = $target_dir . uniqid() . "." . $imageFileType; // thêm một ID duy nhất vào tên tệp
        //            }

        // Tải tập tin lên
        if (!move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $target_file)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        return $target_file;
    } else {
        throw new Exception("No image file uploaded or an error occurred.");
    }
}
?>