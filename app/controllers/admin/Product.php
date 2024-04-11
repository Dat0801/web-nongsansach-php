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
        $this->data['sub_content']['list'] = $dataProduct;
        $this->data['sub_content']['product_model'] = $this->product;
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
                'TenHang' => 'required|min:5|max:30',
            ]);

            $request->messages([
                'TenHang.required' => 'Họ tên không được để trống',
                'TenHang.min' => 'Họ tên phải lớn hơn 5 ký tự',
                'TenHang.max' => 'Họ tên phải nhỏ hơn 30 ký tự',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                $this->product->addProduct($data);
                header('Location: ' . _WEB_ROOT . '/admin/product');
            }
        }
        $this->render('layouts/admin_layout', $this->data);

    }

    public function editProduct()
    {
        $this->data['content'] = '/admin/products/EditProduct';
        $this->data['title'] = 'Trang sửa sản phẩm';

        $request = new Request();

        $this->data['sub_content']['category'] = $this->category->getCategoryList();
        $this->data['sub_content']['suppliers'] = $this->suppliers->getSuppliersList();

        if ($request->isPost()) {

            $id = $_GET["MaHang"];

            $request->rules([
                'TenHang' => 'required|min:5|max:30',
            ]);

            $request->messages([
                'TenHang.required' => 'Họ tên không được để trống',
                'TenHang.min' => 'Họ tên phải lớn hơn 5 ký tự',
                'TenHang.max' => 'Họ tên phải nhỏ hơn 30 ký tự',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $giaBan = $_GET["GiaBan"];
                $dataProduct = $request->getFields();
                if(empty($dataProduct["HinhAnh"])) {
                    $hinhAnh = $_GET["HinhAnh"];
                } else {
                    $hinhAnh = $dataProduct["HinhAnh"];
                }
                $dataProduct["MaHang"] = $id;
                $dataProduct["GiaBan"] = $giaBan;
                $dataProduct["HinhAnh"] = $hinhAnh;
                $this->data['sub_content']['product'] = $dataProduct;
            } else {
                $dataProduct = $this->product->getDetail($id);
                $this->product->updateProduct($dataProduct, $id);
                header('Location: ' . _WEB_ROOT . '/admin/product');
            }
        } else {
            $product = $request->getFields();
            $dataProduct = $this->product->getDetail($product["MaHang"]);
            $this->data['sub_content']['product'] = $dataProduct;
        }
        $this->render('layouts/admin_layout', $this->data);
    }

    public function deleteProduct()
    {
        $id = $_GET["MaHang"];
        $this->product->deleteProduct($id);
        header('Location: ' . _WEB_ROOT . '/admin/product');
    }


}