<?php
class Category extends Controller{

    public $data = [];
    public $category;

    public function __construct(){
        $this->category = $this->model('categoryModel');
    }

    public function index() {
        $this->data['content'] = '/admin/categorys/ViewCategory';
        $this->data['title'] = 'Danh mục hàng hoá';
        $datacategory = $this->category->getcategoryList();
        $this->data['sub_content']['list'] = $datacategory;
        $this->data['sub_content']['category_model'] = $this->category;
        $this->render('layouts/admin_layout', $this->data);
    }
    //Edit category
    public function editcategory()
    {
        $this->data['content'] = '/admin/categorys/EditCategory';
        $this->data['title'] = 'Trang sửa danh mục';
        $request = new Request();
        $categoryId = $_GET["MaNhomHang"];
        //
        if ($request->isPost()) {
            $category = $request->getFields();
            $category["MaNhomHang"] = $categoryId;
            $request->rules([
                'TenNhomHang' => 'required|min:1|max:30|unique:NhomHang:TenNhomHang:MaNhomHang='.$categoryId.'',
            ]);

            $request->messages([
                'TenNhomHang.required' => 'Tên danh mục không được để trống!',
                'TenNhomHang.min' => 'Tên danh mục phải có ít nhất 5 ký tự!',
                'TenNhomHang.max' => 'Tên danh mục không được vượt quá 30 ký tự!',
                'TenNhomHang.unique' => 'Tên danh mục đã tồn tại. Vui lòng chọn tên khác!',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xảy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['category'] = $category;
            } else {
                $this->category->updatecategory($category, $categoryId);
                header('Location: '._WEB_ROOT.'/admin/category');
            }
        }else{
            $datacategory = $this->category->getDetail($categoryId);
            $this->data['sub_content']['category'] = $datacategory;
            }
            $this->render('layouts/admin_layout', $this->data);
    }
    
    ///Add category
    public function addcategory() {
        $this->data['content'] = '/admin/categorys/Addcategory';
        $this->data['title'] = 'Trang thêm danh mục';
        $request = new Request();

    //
    if ($request->isPost()) {
        $request->rules([
            'TenNhomHang' => 'required|min:1|max:30|unique:NhomHang:TenNhomHang',
        ]);

        $request->messages([
            'TenNhomHang.required' => 'Tên danh mục không được để trống!',
            'TenNhomHang.min' => 'Tên danh mục phải có ít nhất 5 ký tự!',
            'TenNhomHang.max' => 'Tên danh mục không được vượt quá 30 ký tự!',
            'TenNhomHang.unique' => 'Tên danh mục đã tồn tại. Vui lòng chọn tên khác!',
        ]);

        $validate = $request->validate();

        if (!$validate) {
            $this->data['sub_content']['errors'] = $request->errors();
            $this->data['sub_content']['msg'] = "Đã có lỗi xảy ra. Vui lòng kiểm tra lại!";
            $this->data['sub_content']['category'] = $request->getFields();
        } else {
            $category = $request->getFields();
            $this->category->addcategory($category);
            header('Location: '._WEB_ROOT.'/admin/category');
        }
    }
        $this->render('layouts/admin_layout', $this->data);
    }
    
    public function deletecategory() {
        $id = $_GET["MaNhomHang"];
        $this->category->deletecategory($id);
        header('Location: '._WEB_ROOT.'/admin/category');
    }
}