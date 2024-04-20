<?php
Namespace App\Controllers;
Use App\Models\Missionmodel;

helper(['form', 'url']);

class Missions extends BaseController
{
    public function addnewmission()
    {
        $model = model(Missionmodel::class);

        $validationRules = [
            'nom' => 'required',
        ];

        if($this->request->getMethod() == 'post'){
            //
        }
        if($this->validate($validationRules)){
            $model->addnewmission();
            return redirect()->to('https://carte.axel.mg');
        } else {
            echo("Une erreur s'est produite");
        }

    }
    public function getmissions()
    {
        $model = model(Missionmodel::class);
        $data = $model->getmissions();
        return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setJSON($data);
    }


    /* ----------------------------------------------------
                         UPDATE
    --------------------------------------------------- */
    public function updatepriomission()
    {
        // header('Access-Control-Allow-Origin: *' . ($_SERVER['HTTP_ORIGIN'] ?? '*'));
        // header('Access-Control-Allow-Methods: POST, PUT, OPTIONS');
        // header('Access-Control-Allow-Headers: Content-Type');
        // header('Access-Control-Allow-Credentials: true');

        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            header('Access-Control-Allow-Methods: PUT, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type');
        }

        $model = model(Missionmodel::class);
        $success = $model->updatepriomission();

        // return $this->response->setHeader('Access-Control-Allow-Origin', '*')->setStatusCode(200)->setJSON($data);

        // Exemple : Retourner une réponse JSON
        if ($success) {
            $response = ['success' => true, 'message' => 'Changement effectué avec succès'];
        } else {
            $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
        }

        echo json_encode($response);
  
    }

    
    public function updatestatusmission()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Methods: PUT, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        
    }
        $model = model(Missionmodel::class);
        $success = $model->updatestatusmission();

        if ($success) {
            $response = ['success' => true, 'message' => 'Changement effectué avec succès'];
        } else {
            $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
        }
    }
}

