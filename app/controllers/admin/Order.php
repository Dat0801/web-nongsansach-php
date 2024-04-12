<?php
class Order extends Controller
{

    public $data = [];
    public $order, $orderDetail, $product, $customer, $employee;

    public function __construct()
    {
        $this->order = $this->model('OrderModel');
        $this->orderDetail = $this->model('OrderDetailModel');
        $this->product = $this->model('ProductModel');
        $this->customer = $this->model('CustomerModel');
        $this->employee = $this->model('EmployeeModel');
    }

    public function index()
    {
        $this->data['content'] = '/admin/orders/ViewOrder';
        $this->data['title'] = 'Trang hóa đơn';

        $dataOrder = $this->order->getorderList();
        
        $this->data['sub_content']['list'] = $dataOrder;
        $this->data['sub_content']['order_model'] = $this->order;

        $this->render('layouts/admin_layout', $this->data);
    }

    public function orderDetail()
    {
        $this->data['content'] = '/admin/orders/OrderDetail';
        $this->data['title'] = 'Trang chi tiết hóa đơn';

        $request = new Request();
        $Order = $request->getFields();

        $dataOrder = $this->order->getDetail($Order["MaHD"]);
        $dataDetailOrder = $this->orderDetail->getDetail($Order["MaHD"]);
        $dataEmployee = $this->employee->getDetail($dataOrder["MaNV"]);
        $dataCustomer = $this->customer->getDetail($dataOrder["MaKH"]);

        $list_product = [];
        foreach ($dataDetailOrder as $detailOrder) {
            $product = $this->product->getDetail($detailOrder["MaHang"]);
            $product["SoLuong"] = $detailOrder["SoLuong"];
            $product["ThanhTien"] = $detailOrder["ThanhTien"];
            array_push($list_product, $product);
        }

        $this->data['sub_content']['order'] = $dataOrder;
        $this->data['sub_content']['detailOrder'] = $dataDetailOrder;
        $this->data['sub_content']['listProduct'] = $list_product;
        $this->data['sub_content']['employee'] = $dataEmployee;
        $this->data['sub_content']['customer'] = $dataCustomer;

        $this->render('layouts/admin_layout', $this->data);
    }

    public function editOrder()
    {
        $this->data['content'] = '/admin/orders/EditOrder';
        $this->data['title'] = 'Trang sửa hóa đơn';

        $MaHD = $_GET["MaHD"];

        $dataOrder = $this->order->getDetail($MaHD);
        $dataEmployee = $this->employee->getDetail($dataOrder["MaNV"]);
        $dataListEmloyee = $this->employee->getList();

        $this->data['sub_content']['employee'] = $dataEmployee;
        $this->data['sub_content']['listEmployee'] = $dataListEmloyee;
        $this->data['sub_content']['order'] = $dataOrder;

        $this->render('layouts/admin_layout', $this->data);
    }

    public function acceptOrder()
    {
        $id = $_GET["MaHD"];
        $this->order->acceptOrder($id);
        header('Location: ' . _WEB_ROOT . '/admin/order');
    }
    public function cancelOrder()
    {
        $id = $_GET["MaHD"];
        $this->order->cancelOrder($id);
        header('Location: ' . _WEB_ROOT . '/admin/order');
    }

}