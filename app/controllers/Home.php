<?php
class Home extends Controller
{

    public $data = [];
    public $product, $category, $productController;
    public function __construct()
    {
        $this->product = $this->model('ProductModel');
        $this->category = $this->model('CategoryModel');
        $this->productController = $this->controller('Product');

    }

    public function index()
    {
        $this->data['title'] = 'Nông Sản Sạch';
        $this->data['content'] = 'home/index';

        $this->productController->addToCart(new Request());

        $this->data['sub_content']['products'] = $this->product->getProductList();
        $this->data['sub_content']['productsBestSelling'] = $this->product->getListWithLimit(6, 0);
        $this->data['sub_content']['categories'] = $this->category->getCategoryList();
        $this->render('layouts/client_layout', $this->data);
    }


}