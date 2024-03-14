<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (!empty($title))?$title:'Trang chủ'?></title>
</head>
<body>
    <?php 
        $this->render('blocks/header');
        $this->render($content);
        $this->render('blocks/footer');
    ?>
</body>
</html>