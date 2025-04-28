<?php
require_once 'config.php';


// Kết nối CSDL
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


// Câu lệnh UPDATE
$sql = "UPDATE tbl_bantin
        SET noidung = 'Nội dung đã được cập nhật cho bài viết id 123.'
        WHERE id_bantin = 123";


// Thực thi câu lệnh UPDATE
if (mysqli_query($conn, $sql)) {
    echo "Cập nhật thành công bài viết với ID 123.";
} else {
    echo "Lỗi cập nhật: " . mysqli_error($conn);
}


// Đóng kết nối
mysqli_close($conn);
?>