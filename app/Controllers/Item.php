<?php
    Namespace App\Controllers;
    use App\Model;

    helper(['url', 'form']);

    class Item extends BaseController
    {
        public function addpriceitem()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);

            $model= model(Itemmodel::class);
            $model->addpriceitem();
        }
        public function getpriceitem()
        {
            $model = model(Itemmodel::class);
            $data = $model->getpriceitem();
            return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setStatusCode(200)->setJSON($data);
            
        }






    }