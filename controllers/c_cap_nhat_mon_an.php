<?php
// Kết nối đến cơ sở dữ liệu
require_once '../models/m_mon_an.php';
// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Thư mục lưu trữ hình ảnh trên máy chủ
    $uploadDir = $_SERVER['DOCUMENT_ROOT'];
    $filePath = '';
    // Kiểm tra xem các trường dữ liệu cần thiết có được gửi không
    if (isset($_POST["ma_mon"]) && isset($_POST["ten_mon"]) && isset($_POST["noi_dung_chi_tiet"]) && isset($_POST["don_gia"])) {



        $m_mon_an = new M_mon_an();

        // Lấy dữ liệu từ biểu mẫu
        $ma_mon = $_POST["ma_mon"];
        $ten_mon = $_POST["ten_mon"];
        $noi_dung_chi_tiet = $_POST["noi_dung_chi_tiet"];
        $don_gia = $_POST["don_gia"];

        // Kiểm tra xem có hình ảnh mới được gửi không
        if (isset($_FILES["hinh"]) && $_FILES["hinh"]["error"] == UPLOAD_ERR_OK) {
            $hinhName = $_FILES["hinh"]["name"];
            $hinhTmpName = $_FILES["hinh"]["tmp_name"];

            // Đường dẫn đầy đủ tới hình ảnh trên máy chủ
            $filePath = $uploadDir  . "//Lap_07_01/images/hinh_mon_an/" . $hinhName;


            // Di chuyển hình ảnh vào thư mục lưu trữ trên máy chủ
            if (move_uploaded_file($hinhTmpName, $filePath)) {
                // Cập nhật món ăn trong cơ sở dữ liệu
                $ket_qua = $m_mon_an->Cap_nhat_mon_an($ma_mon, $ten_mon, $noi_dung_chi_tiet, $hinh, $don_gia);

                if ($ket_qua) {
                    // Nếu cập nhật thành công, chuyển hướng người dùng đến trang chi tiết món ăn
                    header("Location: /Lap_07_1/views/v_chi_tiet_mon_an.php/" . $ma_mon);
                    exit();
                } else {
                    // Nếu có lỗi xảy ra, thông báo cho người dùng
                    echo "Có lỗi xảy ra khi cập nhật món ăn.";
                }
                echo "File uploaded successfully.\n";
                echo "File URL: " . $filePath . "\n"; // Hiển thị URL của hình ảnh đã được upload
            } else {
                echo "Error uploading file.\n";
            }
        } else {
            echo "No file uploaded or an error occurred.\n";
        }
    } else {
        // Nếu thiếu dữ liệu cần thiết, thông báo cho người dùng
        echo "Thiếu dữ liệu cần thiết.";
    }
} else {
    // Nếu không phải là phương thức POST, chuyển hướng người dùng đến trang không tồn tại
    header("Location: /Lap_07_1/views/v_404.php");
    exit();
}
