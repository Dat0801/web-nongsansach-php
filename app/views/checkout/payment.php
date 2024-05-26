<!DOCTYPE html>
<body>
<div class="container-fluid page-header py-5">
                    <h1 class="text-center text-white display-6">Đặt hàng</h1>
                </div>    
                <div class="container-fluid py-5">
                    <div class="container">
                        <?php
                            if(isset($success_msg)) {
                                echo '<div class="alert alert-success">' . $success_msg . '</div>';
                            } 
                            if(isset($error_msg)) {
                                echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                            }
                        ?>                        
                    </div>
                </div>
    
</body>
</html>
