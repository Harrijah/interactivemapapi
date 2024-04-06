<?php
    Namespace App\Controllers;



    Use App\Models;

    helper(['form', 'url']);

    class Price extends BaseController
    {
        public function addprestation()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            $model = model(Pricemodel::class);
            $model->addprestation();
        }
        public function gettypeprestations()
        {
            $model = model(Pricemodel::class);
            $data = $model->gettypeprestations();
            return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setStatusCode(200)->setJSON($data);
        }

    }