<?php
class Products extends Controller
{
    public $data = [];
    public $product;

    public function __construct()
    {
        $this->product = $this->model('ProductModel');
    }

    public function processCollectionRequest(string $method, string $param = null)
    {
        require_once __DIR__ROOT . '/app/errors/ErrorHandler.php';
        set_exception_handler('ErrorHandler::handleException');
        switch ($method) {
            case 'GET':
                if ($param !== null) {
                    $product = $this->product->getProduct($param);
                    if (!$product) {
                        http_response_code(404);
                        return json_encode(['message' => 'Product not found']);
                    }
                    return json_encode($product);
                } else {
                    return json_encode($this->product->getProductList());
                }
            case 'PATCH': 
                $data = [];
                parse_str(file_get_contents('php://input'), $data);
                if (empty($data["TenHang"])) {
                    throw new ErrorException("Product name is required");
                }

                if ($this->product->updateProduct($data, $param)) {
                    return json_encode(['message' => "Product $param updated"]);
                } else {
                    return json_encode(['message' => 'Failed to update product']);
                }
            case 'POST':
                $data = $_POST;

                if (empty($data["TenHang"])) {
                    throw new ErrorException("Product name is required");
                }

                http_response_code(201);

                if ($this->product->addProduct($data)) {
                    return json_encode(['message' => 'Product added']);
                } else {
                    return json_encode(['message' => 'Failed to add product']);
                }
            default:
                http_response_code(405);
                header('Allow: GET, POST');
                break;
        }
    }

    public function index(string $param = null)
    {
        if ($param !== null) {
            $dataProduct = $this->processCollectionRequest($_SERVER['REQUEST_METHOD'], $param);
        } else {
            $dataProduct = $this->processCollectionRequest($_SERVER['REQUEST_METHOD']);
        }
        $this->data['products'] = $dataProduct;
        $this->render('/api/products/index', $this->data);
    }


}