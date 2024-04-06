<?php
    Namespace App\Controllers;
    Use App\Model;

    class Description extends BaseController
    {
        public function adddescription()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);

            $model = model(Descriptionmodel::class);
            $model->adddescription();
        }

        public function getdescription()
        {
            $model = model(Descriptionmodel::class);
            $data = $model->getdescription();
            return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setStatusCode(200)->setJSON($data);
       
        }

    }