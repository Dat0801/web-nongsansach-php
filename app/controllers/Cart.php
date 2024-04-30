<?php
class Cart extends Controller
{

    public $data = [];

    public function __construct()
    {

    }

    public function index()
    {
        $this->data['title'] = 'Trang giỏ hàng';
        $this->data['content'] = 'cart/index';
        $this->render('layouts/client_layout', $this->data);
    }

    //ajaxCalls
    public function ajaxCalls()
    {
        //add
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            $productID = $_POST['productID'];
            $qty = $_POST['qty'];
            $productQty = $_POST['productQty'];
            $productDVT = $_POST['productDVT'];
            $productPrice = $_POST['productPrice'];
            $productName = $_POST['productName'];
            $productImg = $_POST['productImg'];

            $calculateTotalPrice = $qty * $productPrice;

            $cartArray = [
                'product_id' => $productID,
                'qty' => $qty,
                'product_name' => $productName,
                'product_price' => $productPrice,
                'product_dvt' => $productDVT,
                'product_qty' => $productQty,
                'total_price' => $calculateTotalPrice,
                'product_img' => $productImg
            ];

            if (isset($_SESSION['cart_items']) &&  is_array($_SESSION['cart_items'])) {
                $productIDs = array();
                foreach ($_SESSION['cart_items'] as $cartKey => $cartItem) {
                    $productIDs[] = $cartItem['product_id'];
                    if ($cartItem['product_id'] == $productID) {
                        $_SESSION['cart_items'][$cartKey]['qty'] += $qty;
                        if ($_SESSION['cart_items'][$cartKey]['qty'] > $productQty) {
                            $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                        }
                        $_SESSION['cart_items'][$cartKey]['total_price'] += $calculateTotalPrice;
                        break;
                    }
                }

                if (!in_array($productID, $productIDs)) {
                    $_SESSION['cart_items'][] = $cartArray;
                }
                echo json_encode(['msg' => 'success']);
                exit();
            } else {
                $_SESSION['cart_items'][] = $cartArray;
                $data = ['msg' => 'success'];
                echo json_encode($data);
                exit();
            }
        }

        //update
        if (isset($_POST['action']) && $_POST['action'] == 'update-qty') {
            $sessionItem = $_POST['itemID'];
            $sessionItemQty = $_POST['qty'];
            $productSessionPrice = $_SESSION['cart_items'][$sessionItem]['product_price'];

            $_SESSION['cart_items'][$sessionItem]['qty'] = $sessionItemQty;
            $_SESSION['cart_items'][$sessionItem]['total_price'] = $sessionItemQty * $productSessionPrice;

            echo json_encode(['msg' => 'success']);
            exit();
        }

        //remove all
        if (isset($_POST['action']) && $_POST['action'] == 'empty') {
            unset($_SESSION['cart_items']);
            echo json_encode(['msg' => 'success']);
            exit();
        }

        //remove single
        if (isset($_POST['action']) && $_POST['action'] == 'remove') {
            unset($_SESSION['cart_items'][$_POST['itemID']]);
            echo json_encode(['msg' => 'success']);
            exit();
        }
    }

    public function tableCart()
    {
        $this->render('cart/tableCart');
    }
}