<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa món ăn</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="mt-5">Chỉnh sửa món ăn</h3>
        <?php 
        require_once '../models/m_mon_an.php';
        $m_mon_an = new M_mon_an();
        $url = $_SERVER['REQUEST_URI'];
        $filename = basename($url);
        $id = explode('.', $filename)[0];
        $mon_an = $m_mon_an->Doc_mon_an_theo_id($id);
        // Kiểm tra nếu có dữ liệu món ăn
        if ($mon_an) { ?>
            <form action="/Lap_07_1/controllers/c_cap_nhat_mon_an.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ma_mon" value="<?php echo $mon_an->ma_mon ?>">
                <div class="mb-3">
                    <label for="ten_mon" class="form-label">Tên món</label>
                    <input type="text" class="form-control" id="ten_mon" name="ten_mon" value="<?php echo $mon_an->ten_mon ?>">
                </div>
                
                <div class="mb-3">
                    <label for="noi_dung_chi_tiet" class="form-label">Nội dung chi tiết</label>
                    <textarea class="form-control" id="noi_dung_chi_tiet" name="noi_dung_chi_tiet"><?php echo $mon_an->noi_dung_chi_tiet ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="hinh" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="hinh" name="hinh">
                    <img height="200" src="/Lap_07_1/images/hinh_mon_an/<?php echo $mon_an->hinh; ?>" class="img-thumbnail mt-2" alt="<?php echo $mon_an->ten_mon ?>">
                </div>
                <div class="mb-3">
                    <label for="don_gia" class="form-label">Đơn giá</label>
                    <input type="text" class="form-control" id="don_gia" name="don_gia" value="<?php echo $mon_an->don_gia ?>">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        <?php } else { ?>
            <p class="alert alert-danger">Món ăn không tồn tại.</p>
        <?php } ?>
    </div>

    <!-- Bootstrap JS và các tập tin JavaScript tùy chọn khác -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
