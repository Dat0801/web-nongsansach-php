<?php
class ProductReceipt extends Controller{

    public $data = [];
    public $productRC;

    public function __construct(){
        $this->productRC = $this->model('ProductReceiptModel');
    }

    public function index() {
        $this->data['content'] = '/admin/productRC/ViewProductReceipt';
        $this->data['title'] = 'Trang nhập hàng';
        $dataProduct = $this->productRC->getProductRCList();
        $this->data['sub_content']['list'] = $dataProduct;
        $this->data['sub_content']['productRC_model'] = $this->productRC;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function editProductRC() {
        $this->data['content'] = '/admin/productRC/EditProductReceipt';
        $this->data['title'] = 'Trang sửa phiếu nhập';
        $request = new Request();
        $MaPN = $request->getFields();
        $dataProductRC = $this->productRC->getDetail($MaPN["MaPN"]);
        $this->data['sub_content']['productRC'] = $dataProductRC;
        $this->render('layouts/admin_layout', $this->data); 
    }

    // public function viewAddProductRC() {
    //     $this->data['content'] = '/admin/products/AddProduct';
    //     $this->data['title'] = 'Trang thêm sản phẩm';
    //     $this->render('layouts/admin_layout', $this->data);
    // }

    // public function addProductRC() {
    //     $request = new Request();
    //     $data = $request->getFields();
    //     $this->productRC->addProductReceipt($data);
    //     header('Location: '._WEB_ROOT.'/admin/productReceipt');
    // }

    public function updateProductRC() {
        $request = new Request();
        $id = $_GET["MaPN"];
        $data = $request->getFields();
        $this->productRC->updateProductReceipt($data, $id);
        header('Location: '._WEB_ROOT.'/admin/productReceipt');
    }   
    
    // public function deleteProductRC() {
    //     $id = $_GET["MaPN"];
    //     $this->productRC->deleteProductReceipt($id);
    //     header('Location: '._WEB_ROOT.'/admin/productReceipt');
    // }

    

    
}