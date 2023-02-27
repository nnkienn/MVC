<?php

namespace App\Controllers\API\V1;

use App\Middleware\CheckToken;
use App\Models\MenuModel;

class MenuController extends CheckToken
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel;

        parent::__construct();   
    }

    public function index()
    {
        return json([
            'error' => false,
            'menus' => $this->menuModel->getAllMenuIsActive()
        ]);
    }   
}