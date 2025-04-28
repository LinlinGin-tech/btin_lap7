<?php
require_once 'config.php';


// Kết nối CSDL
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


// Câu : Lấy các bình luận của bài viết 'Sự thay đổi cách thức mua sắm...'
$sql4 = "SELECT bl.* FROM tbl_binhluan bl JOIN tbl_bantin bt ON bl.id_bantin = bt.id_bantin WHERE bt.tieude = 'Sự thay đổi cách thức mua sắm của khách hàng trong thời kì thương mại điện tử'";
$result4 = mysqli_query($conn, $sql4);


echo "<h3>Câu : Các bình luận của bài viết 'Sự thay đổi cách thức mua sắm...'</h3>";
while ($row = mysqli_fetch_assoc($result4)) {
    echo "Nội dung bình luận: " . $row['noidung'] . "<br>";
}




// Câu : Lấy tiêu đề và lượt like tất cả các bài
$sql6 = "SELECT tieude, luotlike FROM tbl_bantin";
$result6 = mysqli_query($conn, $sql6);


echo "<h3>Câu : Tiêu đề và lượt like của tất cả các bài</h3>";
while ($row = mysqli_fetch_assoc($result6)) {
    echo "Tiêu đề: " . $row['tieude'] . " - Lượt like: " . $row['luotlike'] . "<br>";
}


// Đóng kết nối
mysqli_close($conn);
?>


