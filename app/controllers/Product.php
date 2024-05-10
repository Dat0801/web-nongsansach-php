<?php
class Product extends Controller
{

    public $data = [];
    public $product, $category, $supplier;

    public function __construct()
    {
        $this->product = $this->model('ProductModel');
        $this->category = $this->model('CategoryModel');
        $this->supplier = $this->model('SuppliersModel');
    }

    public function index()
    {
        $this->data['content'] = 'products/index';
        $this->data['title'] = 'Trang sản phẩm';

        $this->data['sub_content']['name'] = 'Sản Phẩm';
        $this->data['sub_content']['display'] = 9;

        if (isset($_GET['categoryid']) && empty($_GET['searchStr'])) {
            $this->data['sub_content']['categoryid'] = $_GET['categoryid'];
            $this->data['sub_content']['list'] = $this->product->getProductByCategory($_GET['categoryid']);
        } else if (!empty($_GET['searchStr'])) {
            $this->data['sub_content']['list'] = $this->product->searchProductClient($_GET['searchStr']);
        } else {
            $this->data['sub_content']['list'] = $this->product->getProductList();
        }

        $categories = $this->category->getCategoryList();

        foreach ($categories as $key => $category) {
            $categories[$key]['productCount'] = $this->category->countProductsInCategory($category['MaNhomHang']);
        }

        $this->data['sub_content']['categories'] = $categories;
        $this->data['sub_content']['productsBestSelling'] = $this->product->getListWithLimit(3, 0);
        $this->data['sub_content']['product_model'] = $this->product;

        $this->render('layouts/client_layout', $this->data);
    }

    public function cartQuantity()
    {
        $this->render('products/cartQuantity');
    }

    public function detail()
    {
        $this->data['content'] = 'products/detail';
        $this->data['title'] = 'Chi tiết sản phẩm';
        $request = new Request();
        if ($request->getFields()['productid']) {
            $productID = $request->getFields()['productid'];
        } else {
            $productID = intval($request->getFields()['MaHang']);
            $this->data['sub_content']['successMsg'] = $this->addToCart($request);
        }

        $dataProduct = $this->product->getDetail($productID);

        $this->data['sub_content']['product'] = $dataProduct;
        $this->data['sub_content']['category'] = $this->category->getDetail($dataProduct["MaNhomHang"]);
        $this->data['sub_content']['categories'] = $this->category->getCategoryList();
        $this->data['sub_content']['supplier'] = $this->supplier->getDetail($dataProduct["MaNCC"]);
        $this->data['sub_content']['productsByCategory'] = $this->product->getProductByCategory($dataProduct["MaNhomHang"]);

        $this->render('layouts/client_layout', $this->data);
    }

    // create function add to cart
    public function addToCart($request)
    {
        if (isset($request->getFields()['add_to_cart']) && $request->getFields()['add_to_cart'] == 'add to cart') {
            $productID = intval($request->getFields()['MaHang']);
            $productQty = intval($request->getFields()['SoLuong']);

            $product = $this->product->getDetail($productID);

            $calculateTotalPrice = $productQty * $product['GiaBan'];

            $cartArray = [
                'product_id' => $productID,
                'qty' => $productQty,
                'product_name' => $product['TenHang'],
                'product_price' => $product['GiaBan'],
                'product_dvt' => $product['DVT'],
                'product_qty' => $product['SoLuongTon'],
                'total_price' => $calculateTotalPrice,
                'product_img' => $product['HinhAnh']
            ];

            if (is_array($_SESSION['cart_items'])) {
                $productIDs = array();
                foreach ($_SESSION['cart_items'] as $cartKey => $cartItem) {
                    $productIDs[] = $cartItem['product_id'];
                    if ($cartItem['product_id'] == $productID) {
                        $_SESSION['cart_items'][$cartKey]['qty'] += $productQty;
                        if ($_SESSION['cart_items'][$cartKey]['qty'] > $product['SoLuongTon']) {
                            $_SESSION['cart_items'][$cartKey]['qty'] = $product['SoLuongTon'];
                            $_SESSION['cart_items'][$cartKey]['total_price'] = $_SESSION['cart_items'][$cartKey]['qty'] * $product['GiaBan'];
                        } else {
                            $_SESSION['cart_items'][$cartKey]['total_price'] += $calculateTotalPrice;
                        }
                        break;
                    }
                }

                if (!in_array($productID, $productIDs)) {
                    $_SESSION['cart_items'][] = $cartArray;

                }
                return true;
            } else {
                $_SESSION['cart_items'][] = $cartArray;
                return true;
            }
        }
    }
}