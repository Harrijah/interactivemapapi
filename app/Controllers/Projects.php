<?php
Namespace App\Controllers;
Use App\Models\Projectmodel;

helper(['form', 'url']);

class Projects extends BaseController
{
    public function addnewproject()
    {
        $model = model(Projectmodel::class);

        $validationRules = [
            'nom' => 'required',
            'departement' => 'required'
        ];

        if($this->request->getMethod() == 'post'){
            //
        }
        if($this->validate($validationRules)){
            $model->addprojects();
            return redirect->to('https://carte.axel.mg');
        } else {
            echo("Une erreur s'est produite");
        }

    }
    public function getprojects()
    {
        $model = model(Projectmodel::class);
        $data = $model->getprojects();
        return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setJSON($data);
    }


    /* ----------------------------------------------------
                         UPDATE
    --------------------------------------------------- */
    public function updateprio()
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

        $model = model(Projectmodel::class);
        $success = $model->updateprio();

        // return $this->response->setHeader('Access-Control-Allow-Origin', '*')->setStatusCode(200)->setJSON($data);

        // Exemple : Retourner une réponse JSON
        if ($success) {
            $response = ['success' => true, 'message' => 'Changement effectué avec succès'];
        } else {
            $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
        }

        echo json_encode($response);
  
    }

    
    public function updatestatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Methods: PUT, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        
    }
        $model = model(Projectmodel::class);
        $success = $model->updatestatus();

        if ($success) {
            $response = ['success' => true, 'message' => 'Changement effectué avec succès'];
        } else {
            $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
        }
    }
}

