<?php
    Namespace App\Controllers;
    use App\Model;

    helper(['url', 'form']);

    class Unity extends BaseController
    {
        public function addunity()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);

            $model= model(Unitymodel::class);
            $model->addunity();
        }
        public function getunity()
        {
            $model = model(Unitymodel::class);
            $data = $model->getunity();
            return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setStatusCode(200)->setJSON($data);
            
        }






    }