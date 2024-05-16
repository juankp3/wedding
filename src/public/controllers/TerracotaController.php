<?php
class TerracotaController 
{
    
    public function index()
    {
        $userModel = new UserModel();
        $rawdataUsers = $userModel->getUsers();

        // UITableView
        $customUsers = $this->datasource($rawdataUsers);
        $userTable = $this->tableView($customUsers);

        $this->params['title'] = 'Usuarios';
        $this->params['data'] = $userTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('user/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

}

$oTerracotaController = new TerracotaController();
Flight::route('GET /boda/angelica-y-luis', array($oTerracotaController, 'index'));
