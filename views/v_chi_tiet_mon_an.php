<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết món ăn</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <?php 
        require_once '../models/m_mon_an.php';
        $m_mon_an = new M_mon_an();
        $url = $_SERVER['REQUEST_URI'];
        $filename = basename($url);
        $id = explode('.', $filename)[0];
        $mon_an = $m_mon_an->Doc_mon_an_theo_id($id);
        if ($mon_an) { ?>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="/Lap_07_1/images/hinh_mon_an/<?php echo $mon_an->hinh; ?>" class="img-fluid rounded" alt="<?php echo $mon_an->ten_mon ?>">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-4"><?php echo $mon_an->ten_mon ?></h2>
                    <p class="lead"><?php echo $mon_an->noi_dung_tom_tat ?></p>
                    <p><?php echo $mon_an->noi_dung_chi_tiet ?></p>
                    <p>Khuyễn mãi: <?php echo $mon_an->khuyen_mai ?></p>
                    <p>Giá: <?php echo $mon_an->don_gia ?></p>
                    <!-- Thêm thông tin khác của món ăn nếu cần -->
                    <button type="button" class="btn btn-danger " >Mua</button>
        </br>
                    <a href="/Lap_07_1/mon_an.php" class="btn btn-primary mt-4">Quay lại danh sách món ăn</a>
                </div>
            </div>
        <?php } else { ?>
            <p class="alert alert-danger">Món ăn không tồn tại.</p>
        <?php } ?>
    </div>
    <!-- Bootstrap JS và các tập tin JavaScript tùy chọn khác -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
