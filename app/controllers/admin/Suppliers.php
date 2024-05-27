<?php

class Suppliers extends AdminController
{
    public $data = [];
    public $suppliers;

    public function __construct()
    {
        parent::__construct();
        $this->suppliers = $this->model('SuppliersModel');
    }

    public function index()
    {
        $this->data['content'] = '/admin/suppliers/ViewSuppliers';
        $this->data['title'] = 'Danh mục các nhà cung cấp';
        
        if (isset($_GET['searchStr'])) {
            $searchStr = $_GET['searchStr'];
            $datasuppliers = $this->suppliers->searchSuppliers($searchStr);
        } else {
            $datasuppliers = $this->suppliers->getSuppliersList();
        }
        $this->data['sub_content']['display'] = 5;
        $this->data['sub_content']['list'] = $datasuppliers;
        $this->data['sub_content']['suppliers_model'] = $this->suppliers;
                
        $this->render('layouts/admin_layout', $this->data);
    }

    // Validate phone number
    public function checkPhoneNumber($phone)
    {
        if (preg_match('/^(0|\+84)(3[2-9]|5[2689]|7[06789]|8[0-9]|9[0-9])[0-9]{7}$/', $phone)) {
            return true;
        }
        return false;
    }

    // Edit suppliers
    public function editSuppliers()
    {
        $this->data['content'] = '/admin/suppliers/Editsuppliers';
        $this->data['title'] = 'Trang sửa thông tin nhà cung cấp';
        $request = new Request();
        $suppliersId = $_GET["MaNCC"];

        if ($request->isPost()) {
            $suppliers = $request->getFields();
            $suppliers["MaNCC"] = $suppliersId;

            $request->rules([
                'TenNCC' => 'required|min:5|unique:NhaCungCap,TenNCC,'.$suppliersId.',MaNCC',
                'DiaChi' => 'required|min:5|unique:NhaCungCap,DiaChi,'.$suppliersId.',MaNCC',
                'SDT' => 'required|unique:NhaCungCap,SDT,'.$suppliersId.',MaNCC|callback_checkPhoneNumber',
            ]);

            $request->messages([
                'TenNCC.required' => 'Tên nhà cung cấp không được để trống!',
                'TenNCC.min' => 'Tên nhà cung cấp phải có ít nhất 5 ký tự!',
                'TenNCC.unique' => 'Nhà cung cấp đã tồn tại. Vui lòng kiểm tra lại!',
                'DiaChi.required' => 'Địa chỉ không được để trống!',
                'DiaChi.min' => 'Địa chỉ phải có ít nhất 5 ký tự!',
                'DiaChi.unique' => 'Địa chỉ đã tồn tại. Vui lòng kiểm tra lại!',
                'SDT.required' => 'Số điện thoại không được để trống!',
                'SDT.unique' => 'Số điện thoại đã tồn tại. Vui lòng kiểm tra lại!',
                'SDT.callback_checkPhoneNumber' => 'Số điện thoại không hợp lệ!',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xảy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['suppliers'] = $suppliers;
            } else {
                $this->suppliers->updatesuppliers($suppliers, $suppliersId);
                header('Location: '._WEB_ROOT.'/admin/suppliers');
            }
        } else {
            $datasuppliers = $this->suppliers->getDetail($suppliersId);
            $this->data['sub_content']['suppliers'] = $datasuppliers;
        }
        $this->render('layouts/admin_layout', $this->data);
    }
    // Add suppliers
    public function AddSuppliers()
    {
        $this->data['content'] = '/admin/suppliers/Addsuppliers';
        $this->data['title'] = 'Trang thêm thông tin nhà cung cấp';
        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'TenNCC' => 'required|min:5|unique:NhaCungCap,TenNCC',
                'DiaChi' => 'required|min:5|unique:NhaCungCap,DiaChi',
                'SDT' => 'required|unique:NhaCungCap,SDT|callback_checkPhoneNumber',
                ]);

            $request->messages([
                'TenNCC.required' => 'Tên nhà cung cấp không được để trống!',
                'TenNCC.min' => 'Tên nhà cung cấp phải có ít nhất 5 ký tự!',
                'TenNCC.unique' => 'Nhà cung cấp đã tồn tại. Vui lòng kiểm tra lại!',
                'DiaChi.required' => 'Địa chỉ không được để trống!',
                'DiaChi.min' => 'Địa chỉ phải có ít nhất 5 ký tự!',
                'DiaChi.unique' => 'Địa chỉ đã tồn tại. Vui lòng kiểm tra lại!',
                'SDT.required' => 'Số điện thoại không được để trống!',
                'SDT.unique' => 'Số điện thoại đã tồn tại. Vui lòng kiểm tra lại!',
                'SDT.callback_checkPhoneNumber' => 'Số điện thoại không hợp lệ!',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xảy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['suppliers'] = $request->getFields();
            } else {
                $suppliers = $request->getFields();
                $this->suppliers->addsuppliers($suppliers);
                header('Location: '._WEB_ROOT.'/admin/suppliers');
            }
        }
        $this->render('layouts/admin_layout', $this->data);
    }
}
