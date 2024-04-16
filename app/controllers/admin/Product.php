<?php
class Product extends Controller
{

    public $data = [];
    public $product, $category, $suppliers;

    public function __construct()
    {
        $this->product = $this->model('ProductModel');
        $this->category = $this->model('CategoryModel');
        $this->suppliers = $this->model('SuppliersModel');
    }

    public function index()
    {
        $this->data['content'] = '/admin/products/ViewProduct';
        $this->data['title'] = 'Danh sách sản phẩm';

        $dataProduct = $this->product->getProductList();

        if (!empty($_GET['msg'])) {
            $this->data['sub_content']['msg'] = $_GET['msg'];
        }

        $this->data['sub_content']['list'] = $dataProduct;
        $this->data['sub_content']['product_model'] = $this->product;
        $this->data['sub_content']['display'] = 7;

        $this->render('layouts/admin_layout', $this->data);
    }

    public function addProduct()
    {
        $this->data['content'] = '/admin/products/AddProduct';
        $this->data['title'] = 'Trang thêm sản phẩm';
        $this->data['sub_content']['category'] = $this->category->getCategoryList();
        $this->data['sub_content']['suppliers'] = $this->suppliers->getSuppliersList();

        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'TenHang' => 'required|min:5|max:30|unique:HangHoa:TenHang',
                'DVT' => 'required',
                'TrongLuong' => 'required|callback_checkGreaterThanZero',
                'DonViTrongLuong' => 'required',
                'GiaNhap' => 'required|callback_checkGreaterThanZero',
                'HeSo' => 'required|callback_checkGreaterThanZero',
                'SoLuongTon' => 'required|callback_checkGreaterThanZero',
            ]);

            $request->messages([
                'TenHang.required' => 'Tên hàng không được để trống',
                'TenHang.min' => 'Tên hàng phải lớn hơn 5 ký tự',
                'TenHang.max' => 'Ten hàng phải nhỏ hơn 30 ký tự',
                'TenHang.unique' => 'Tên hàng đã tồn tại. Vui lòng chọn tên khác!',
                'DVT.required' => 'Đơn vị tính không được để trống',
                'TrongLuong.required' => 'Trọng lượng không được để trống',
                'TrongLuong.callback_checkGreaterThanZero' => 'Trọng lượng phải lớn hơn 0',
                'DonViTrongLuong.required' => 'Đơn vị trọng lượng không được để trống',
                'GiaNhap.required' => 'Giá nhập không được để trống',
                'GiaNhap.callback_checkGreaterThanZero' => 'Giá nhập phải lớn hơn 0',
                'HeSo.required' => 'Hệ số không được để trống',
                'HeSo.callback_checkGreaterThanZero' => 'Hệ số phải lớn hơn 0',
                'SoLuongTon.required' => 'Số lượng tồn không được để trống',
                'SoLuongTon.callback_checkGreaterThanZero' => 'Số lượng tồn phải lớn hơn 0',
            ]);

            $validate = $request->validate();
            
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                $this->product->addProduct($data);
                header('Location: ' . _WEB_ROOT . '/admin/product/index?msg=Thêm thành công!');
            }
        }
        $this->render('layouts/admin_layout', $this->data);

    }

    public function checkGreaterThanZero($value)
    {
        if ($value <= 0)
            return false;
        return true;
    }

    public function editProduct()
    {
        $this->data['content'] = '/admin/products/EditProduct';
        $this->data['title'] = 'Trang sửa sản phẩm';

        $request = new Request();

        $this->data['sub_content']['category'] = $this->category->getCategoryList();
        $this->data['sub_content']['suppliers'] = $this->suppliers->getSuppliersList();

        $id = $_GET["MaHang"];

        if ($request->isPost()) {

            $giaBan = $_GET["GiaBan"];

            $dataProduct = $request->getFields();

            if (empty($dataProduct["HinhAnh"])) {
                $hinhAnh = $_GET["HinhAnh"];
            } else {
                $hinhAnh = $dataProduct["HinhAnh"];
            }

            $dataProduct["MaHang"] = $id;
            $dataProduct["GiaBan"] = $giaBan;
            $dataProduct["HinhAnh"] = $hinhAnh;

            $request->rules([
                'TenHang' => 'required|min:5|max:30|unique:HangHoa:TenHang:MaHang='.$id.'',
                'DVT' => 'required',
                'TrongLuong' => 'required|callback_checkGreaterThanZero',
                'DonViTrongLuong' => 'required',
                'GiaNhap' => 'required|callback_checkGreaterThanZero',
                'HeSo' => 'required|callback_checkGreaterThanZero',
                'SoLuongTon' => 'required|callback_checkGreaterThanZero',
            ]);

            $request->messages([
                'TenHang.required' => 'Tên hàng không được để trống',
                'TenHang.min' => 'Tên hàng phải lớn hơn 5 ký tự',
                'TenHang.max' => 'Ten hàng phải nhỏ hơn 30 ký tự',
                'TenHang.unique' => 'Tên hàng đã tồn tại. Vui lòng chọn tên khác!',
                'DVT.required' => 'Đơn vị tính không được để trống',
                'TrongLuong.required' => 'Trọng lượng không được để trống',
                'TrongLuong.callback_checkGreaterThanZero' => 'Trọng lượng phải lớn hơn 0',
                'DonViTrongLuong.required' => 'Đơn vị trọng lượng không được để trống',
                'GiaNhap.required' => 'Giá nhập không được để trống',
                'GiaNhap.callback_checkGreaterThanZero' => 'Giá nhập phải lớn hơn 0',
                'HeSo.required' => 'Hệ số không được để trống',
                'HeSo.callback_checkGreaterThanZero' => 'Hệ số phải lớn hơn 0',
                'SoLuongTon.required' => 'Số lượng tồn không được để trống',
                'SoLuongTon.callback_checkGreaterThanZero' => 'Số lượng tồn phải lớn hơn 0',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['product'] = $dataProduct;
            } else {
                $this->product->updateProduct($dataProduct, $id);
                header('Location: ' . _WEB_ROOT . '/admin/product/index?msg=Sửa thành công!');
            }
        } else {
            $dataProduct = $this->product->getDetail($id);
            $this->data['sub_content']['product'] = $dataProduct;
        }
        $this->render('layouts/admin_layout', $this->data);
    }

    public function deleteProduct()
    {
        $id = $_GET["MaHang"];
        $this->product->deleteProduct($id);
        header('Location: ' . _WEB_ROOT . '/admin/product/index?msg=Xóa thành công!');
    }

    public function recycleProduct()
    {
        $this->data['content'] = '/admin/products/RecycleProduct';
        $this->data['title'] = 'Thùng rác sản phẩm';

        $dataProduct = $this->product->getRecycleProductList();

        if (!empty($_GET['msg'])) {
            $this->data['sub_content']['msg'] = $_GET['msg'];
        }
        $this->data['sub_content']['list'] = $dataProduct;
        $this->data['sub_content']['product_model'] = $this->product;
        $this->data['sub_content']['display'] = 7;

        $this->render('layouts/admin_layout', $this->data);
    }

    public function recoverProduct()
    {
        $id = $_GET["MaHang"];
        $this->product->recoverProduct($id);
        header('Location: ' . _WEB_ROOT . '/admin/product/recycleProduct/index?msg=Khôi phục thành công!');
    }

    public function deletePermanentProduct()
    {
        $id = $_GET["MaHang"];
        $this->product->deletePermanentProduct($id);
        header('Location: ' . _WEB_ROOT . '/admin/product/recycleProduct/index?msg=Xóa vĩnh viễn thành công!');
    }
}