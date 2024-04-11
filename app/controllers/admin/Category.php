<?php
class Category extends Controller{

    public $data = [];
    public $category;

    public function __construct(){
        $this->category = $this->model('categoryModel');
    }

    public function index() {
        $this->data['content'] = '/admin/categorys/Viewcategory';
        $this->data['title'] = 'Danh mục hàng hoá';
        $datacategory = $this->category->getcategoryList();
        $this->data['sub_content']['category_list'] = $datacategory;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function editcategory() {
        $this->data['content'] = '/admin/categorys/Editcategory';
        $this->data['title'] = 'Trang sửa danh mục';
        $request = new Request();
        $MaNhomHang = $request->getFields();
        $datacategory = $this->category->getDetail($MaNhomHang["MaNhomHang"]);
        $this->data['sub_content']['category'] = $datacategory;
        $this->render('layouts/admin_layout', $this->data); 
    }

    public function viewAddcategory() {
        $this->data['content'] = '/admin/categorys/Addcategory';
        $this->data['title'] = 'Trang thêm danh mục';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function addcategory() {
        $request = new Request();
        $data = $request->getFields();
        $this->category->addcategory($data);
        header('Location: '._WEB_ROOT.'/admin/category');
    }

    public function updatecategory() {
        $request = new Request();
        $id = $_GET["MaNhomHang"];
        $data = $request->getFields();
        $this->category->updatecategory($data, $id);
        header('Location: '._WEB_ROOT.'/admin/category');
    }
    
    public function deletecategory() {
        $request = new Request();
        $id = $_GET["MaNhomHang"];
        $this->category->deletecategory($id);
        header('Location: '._WEB_ROOT.'/admin/category');
    }
}