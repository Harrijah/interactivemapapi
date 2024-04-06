<?php
    Namespace App\Controllers;



    Use App\Models;

    helper(['form', 'url']);

    class Unitprice extends BaseController
    {
        public function addunitprice()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            $model = model(Unitpricemodel::class);
            $model->addunitprice();
        }
        public function getunitprice()
        {
            $model = model(Unitpricemodel::class);
            $data = $model->getunitprice();
            return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setStatusCode(200)->setJSON($data);
        }

    }