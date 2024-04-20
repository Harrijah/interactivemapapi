<?php
    Namespace App\Controllers;
    Use App\Models\Logmodel;
    
    helper(['url', 'form']);

    class Log extends BaseController
    {
        public function logme ()
        {
            // header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            // header('Access-Control-Allow-Methods: POST, OPTIONS');
            // header('Access-Control-Allow-Headers: Content-Type');
            // header('Access-Control-Allow-Credentials: true');

            $model = model(Logmodel::class);
            $data = $model->logme();

            if($data['log'] == 'admin' && $data['pwd'] == 'admin1234'){
                redirect()->to('http://localhost:3000');
                return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setJSON(['isLoggedIn' => true]);
            } else {
                return redirect()->to('http://localhost:3000');
            }
        }
    }