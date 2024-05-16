<?php
class ProductController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{
    public function __construct()
    {
        $this->name = 'product';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $productModel = new ProductModel();
        $rawdataProducts = $productModel->getProducts();

        // UITableView
        $customProducts = $this->datasource($rawdataProducts);
        $productTable = $this->tableView($customProducts);

        $this->params['title'] = 'Productos';
        $this->params['data'] = $productTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('product/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {
        $this->params['title'] = 'Nuevo Producto';

        if (isset($_POST['name'])) {
            $productModel = new ProductModel();
            $data = Flight::request()->data->getData();
            $this->params['data'] = $data;

            $productModel->name = Flight::request()->data->name;
            $productModel->price = Flight::request()->data->price;
            $productModel->barcode = Flight::request()->data->barcode;

            //$productModel->id_category = Flight::request()->data->id_category;
            //$productModel->active = Flight::request()->data->active;
            $response = $productModel->createProduct();

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/product');
        }

        Flight::render('product/add', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $oProductModel = new ProductModel($id);
        $oProductModel->delete();
        Flight::redirect('/dashboard/product');
    }

    public function form($viewForm = null)
    {

    }

    /**
     * UITableViewDataSource
     */
    public function datasource($rawdataProduct)
    {
        return array_map(function($product){
            $data = array(
                $product['id_product'],
                $product['name'],
                $product['price'],
                $product['barcode'],
                $product['id_category'],
                $product['active'],
            );
            return $data;
        }, $rawdataProduct);
    }

    public function tableView($products)
    {
        $productModel = new ProductModel();
        return $productModel->getPagination($products);
    }

    /**
      * UITableViewDelegate
      */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Nombre',
            'Precio',
            'Codigo barra',
            'Categoria',
            'Activado'
        );
    }

}

$oProductController = new ProductController();
//Flight::route('GET|POST /dashboard', array($oProductController, 'index'));
Flight::route('GET|POST /dashboard/product', array($oProductController, 'index'));
Flight::route('GET|POST /dashboard/product/new', array($oProductController, 'create'));
//Flight::route('GET|POST /dashboard/user/new', array($oProductController, 'add'));
//Flight::route('GET|POST /dashboard/user/delete/@id', array($oProductController, 'delete'));
