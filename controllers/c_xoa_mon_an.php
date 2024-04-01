
<?php
require_once '../models/m_mon_an.php';

if (isset($_GET['ma_mon'])) {
    $ma_mon = $_GET['ma_mon'];

    $m_mon_an = new M_mon_an();
    $ket_qua = $m_mon_an->Xoa_mon_an($ma_mon);

    if ($ket_qua) {
        // Xóa thành công, chuyển hướng hoặc thông báo thành công
        header("Location:/Lap_07_01/views/v_mon_an.php");
        exit();
    } else {
        // Xóa thất bại, thông báo lỗi hoặc thực hiện xử lý phù hợp
        echo "Có lỗi xảy ra khi xóa món ăn.";
    }
} else {
    // Nếu không có tham số ma_mon, chuyển hướng hoặc xử lý lỗi phù hợp
    echo "Thiếu tham số ma_mon.";
}
?>
