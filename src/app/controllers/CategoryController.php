<?php
class CategoryController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{
    public function __construct()
    {
        $this->name = 'category';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $categoryModel = new CategoryModel();
        $rawdataCategories = $categoryModel->getCategories();

        // UITableView
        $customCategories = $this->datasource($rawdataCategories);
        $categoryTable = $this->tableView($customCategories);

        $this->params['title'] = 'Categorias';
        $this->params['data'] = $categoryTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('category/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {
        $this->params['title'] = 'Nueva Categoria';

        if (isset($_POST['name'])) {
            $categoryModel = new CategoryModel();
            $data = Flight::request()->data->getData();
            $this->params['data'] = $data;

            $categoryModel->name = Flight::request()->data->name;
            $categoryModel->description = Flight::request()->data->description;
            $response = $categoryModel->createCategory();

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/category');
        }

        Flight::render('category/add', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $oCategoryModel = new CategoryModel($id);
        $oCategoryModel->delete();
        Flight::redirect('/dashboard/category');
    }
    public function form($viewForm = null)
    {

    }

    /**
     * UITableViewDataSource
     */
    public function datasource($rawdataCategory)
    {
        return array_map(function($category){
            $data = array(
                $category['id_category'],
                $category['name'],
                $category['description'],
            );
            return $data;
        }, $rawdataCategory);
    }

    public function tableView($categories)
    {
        $categoryModel = new CategoryModel();
        return $categoryModel->getPagination($categories);
    }

    /**
      * UITableViewDelegate
      */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Nombre',
            'Descripcion'
        );
    }

}

$oCategoryController = new CategoryController();

Flight::route('GET|POST /dashboard/category', array($oCategoryController, 'index'));
Flight::route('GET|POST /dashboard/category/new', array($oCategoryController, 'create'));
