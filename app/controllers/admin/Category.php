<?php
class Category extends Controller{

    public $data = [];
    public $category;

    public function __construct(){
        $this->category = $this->model('CategoryModel');
    }

    public function index() {
        $this->data['content'] = '/admin/categorys/ViewCategory'; //Nhìn theo đường đẫn 
        $this->data['title'] = 'Danh mục sản phẩm';
        $datacategory = $this->category->getCategoryList();
        $this->data['sub_content']['category_list'] = $datacategory;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function editcategory() {
        $this->data['content'] = '/admin/categorys/EditCategory';
        $this->data['title'] = 'Trang sửa sản phẩm';
        $request = new Request();
        $MaNhomHang = $request->getFields();
        $datacategory = $this->category->getDetail($MaNhomHang["MaNhomHang"]);
        $this->data['sub_content']['category'] = $datacategory;
        $this->render('layouts/admin_layout', $this->data); 
    }

    public function updatecategory() {
        $request = new Request();
        $id = $_GET["MaNhomHang"];
        $data = $request->getFields();
        $this->category->updatecategory($data, $id);
        header('Location: '._WEB_ROOT.'/admin/Category');
    }
    
}