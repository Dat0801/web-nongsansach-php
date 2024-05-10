<?php
if (isset($_SESSION['cart_items'])) {
    echo count($_SESSION['cart_items']) > 0 ? count($_SESSION['cart_items']) : '0';
} else {
    echo '0';
}