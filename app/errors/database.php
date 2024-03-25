<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang lỗi</title>
</head>
<?php
    require_once __DIR__ROOT . '/app/views/blocks/header.php';
?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Database Error</h1>
</div>
<!-- Single Page Header End -->


<!-- 404 Start -->
<div class="container-fluid py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                <h2 class="mb-4">Đã có lỗi liên quan đến cơ sở dữ liệu</h2>
                <p class="mb-4"><?php echo !empty($message)?$message:false; ?></p>
                <a class="btn border-secondary rounded-pill py-3 px-5" href="<?php echo _WEB_ROOT ?>/home">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
<?php
    require_once __DIR__ROOT . '/app/views/blocks/footer.php';
?>