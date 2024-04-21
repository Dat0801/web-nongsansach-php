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
            $list = $this->product->searchProduct($_GET['searchStr']);
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

    public function detail()
    {
        $this->data['content'] = 'products/detail';
        $this->data['title'] = 'Chi tiết sản phẩm';

        $id = $_GET['productid'];

        $dataProduct = $this->product->getDetail($id);

        $this->data['sub_content']['product'] = $dataProduct;
        $this->data['sub_content']['category'] = $this->category->getDetail($dataProduct["MaNhomHang"]);
        $this->data['sub_content']['categories'] = $this->category->getCategoryList();
        $this->data['sub_content']['supplier'] = $this->supplier->getDetail($dataProduct["MaNCC"]);
        $this->data['sub_content']['productsByCategory'] = $this->product->getProductByCategory($dataProduct["MaNhomHang"]);

        $this->render('layouts/client_layout', $this->data);
    }
}