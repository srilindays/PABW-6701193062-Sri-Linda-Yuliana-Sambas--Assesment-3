<?php

namespace App\Controllers;

use App\Models\trainerModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Throttle\ThrottlerInterface;

class trainer extends BaseController
{
    protected $trainerModel;


    public function __construct()
    {
        $this->trainerModel = new trainerModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_trainer') ? $this->request->getVar('page_trainer') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $trainer = $this->trainerModel->search($keyword);
        } else {
            $trainer = $this->trainerModel;
        }

        $data = [
            'title' => 'Data Trainer',
            // 'trainer' => $this->trainerModel->findAll()
            'trainer' => $trainer->paginate(8, 'trainer'),
            'pager' => $this->trainerModel->pager,
            'currentPage' => $currentPage
        ];

        return view('trainer/index', $data);
    }
}
