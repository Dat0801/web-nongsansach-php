<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (!empty($title))?$title:'Trang chủ admin'?></title>
</head>
<body>
    <?php 
        $this->render('blocks/admin_header');
        if(!empty($sub_content)) {
            $this->render($content, $sub_content);
        } else {
            $this->render($content);
        }
        $this->render('blocks/admin_footer');
    ?>
</body>
</html>