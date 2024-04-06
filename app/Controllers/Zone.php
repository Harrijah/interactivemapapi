<?php

namespace App\Controllers;

use App\Models\Zonemodel;
$model = model(Zonemodel::class);
helper(['form', 'url']);

class Zone extends BaseController
{
    public function afficherzone() {
        $model = model(Zonemodel::class);
        $data = $model->getzone();
        return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setJSON($data);
    }

}
