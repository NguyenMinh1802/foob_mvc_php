<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách món ăn</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/Lap_07_1/css/style.css">
</head>
<body>
    <div class="container">
        <h3 style="display: flex; justify-content: center;" class="mt-5">Món ăn</h3>
        <div class="row mt-3">
            <?php foreach ($mon_ans as $mon) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img height="200px" src="./images/hinh_mon_an/<?php echo $mon->hinh; ?>" class="card-img-top" alt="<?php echo $mon->ten_mon ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $mon->ten_mon ?></h5>
                            <p class="card-title"><?php echo $mon->noi_dung_tom_tat ?></p>
                            <p class="card-title">Giá: <?php echo $mon->don_gia ?></p>
                            <a href="/Lap_07_1/views/v_chi_tiet_mon_an.php/<?php echo isset($mon->ma_mon) ? $mon->ma_mon : '' ?>" class="btn btn-primary">Chi tiết</a>
							<a href="/Lap_07_1/views/v_sua_mon_an.php/<?php echo isset($mon->ma_mon) ? $mon->ma_mon : '' ?>" class="btn btn-primary">Sửa</a>
							<a href="/Lap_07_1/controllers/c_xoa_mon_an.php?ma_mon=<?php echo $mon->ma_mon ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá món ăn này?')">Xoá</a>

						</div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Bootstrap JS và các tập tin JavaScript tùy chọn khác -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

