<?php
require_once 'config.php';


// Kết nối CSDL
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


// Câu lệnh INSERT
$sql_insert = "INSERT INTO tbl_binhluan (tieude, noidung, luotlike, thoigian, id_bantin, id_docgia)
               VALUES (
                 'Bài viết hay!',
                 'Mình nghĩ Samsung sẽ làm tốt hơn vì họ hiểu thị trường hơn Apple. Nhưng so sánh vậy có phần ngốc nghếch.',
                 0,
                 NOW(),
                 (SELECT id_bantin FROM tbl_bantin WHERE tieude = 'Liệu Samsung sẽ thành công với Galaxy S4 hay sẽ rơi vào tình trạng suy giảm sự tin cậy của nhà đầu tư như Apple' LIMIT 1),
                 1
               )";


// Thực thi câu lệnh INSERT
if (mysqli_query($conn, $sql_insert)) {
    echo "Dữ liệu đã được chèn thành công vào bảng tbl_binhluan.<br>";
    // Lấy ID của bình luận vừa chèn
    $last_inserted_id = mysqli_insert_id($conn);
    echo "ID của bình luận vừa chèn: " . $last_inserted_id . "<br>";
} else {
    echo "Lỗi khi chèn dữ liệu: " . mysqli_error($conn);
}


// Đóng kết nối
mysqli_close($conn);
?>



