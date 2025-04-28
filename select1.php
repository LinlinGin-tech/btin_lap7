<?php
require_once 'config.php';

// Kết nối CSDL
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Câu: Lấy 10 bản tin có lượt like cao nhất
$sql1 = "SELECT * FROM tbl_bantin ORDER BY luotlike DESC LIMIT 10";
$result1 = mysqli_query($conn, $sql1);

echo "<h3>Câu: Lấy 10 bản tin có lượt like cao nhất</h3>";
while ($row = mysqli_fetch_assoc($result1)) {
    echo "Tiêu đề: " . $row['tieude'] . " - Lượt like: " . $row['luotlike'] . "<br>";
}

// Câu: Tìm kiếm bản tin có tiêu đề chứa từ 'công nghệ'
$sql2 = "SELECT * FROM tbl_bantin WHERE tieude LIKE '%công nghệ%'";
$result2 = mysqli_query($conn, $sql2);

echo "<h3>Câu: Bản tin chứa 'công nghệ' trong tiêu đề</h3>";
while ($row = mysqli_fetch_assoc($result2)) {
    echo "Tiêu đề: " . $row['tieude'] . "<br>";
}

// Câu: Lấy các bản tin thuộc danh mục 'Giáo dục' hoặc 'Đời sống'
$sql3 = "SELECT bt.* FROM tbl_bantin bt JOIN tbl_danhmuc dm ON bt.id_danhmuc = dm.id_danhmuc WHERE dm.ten_danhmuc IN ('Giáo dục', 'Đời sống')";
$result3 = mysqli_query($conn, $sql3);

echo "<h3>Câu: Bản tin thuộc danh mục 'Giáo dục' hoặc 'Đời sống'</h3>";
while ($row = mysqli_fetch_assoc($result3)) {
    echo "Tiêu đề: " . $row['tieude'] . "<br>";
}

// Đóng kết nối
mysqli_close($conn);
?>
