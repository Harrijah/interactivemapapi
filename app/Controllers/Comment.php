<?php
    Namespace App\Controllers;

    Use App\Models;
    helper(['form', 'url']); 

    class Comment extends BaseController
    {
        public function addcomment()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            header('Access-Control-Allow-Methods: POST, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type');
            header('Access-Control-Allow-Credentials: true');

            $model = model(Commentmodel::class);
            $success = $model->addcomment();

            // Exemple : Retourner une réponse JSON
            if ($success) {
                $response = ['success' => true, 'message' => 'comment ajouté avec succès'];
            } else {
                $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
            }
            echo json_encode($response);
        }



        /* ----------------------------------------------------
                             UPDATE
        --------------------------------------------------- */
        public function updatecomment()
        {
            // header('Access-Control-Allow-Origin: *' . ($_SERVER['HTTP_ORIGIN'] ?? '*'));
            // header('Access-Control-Allow-Methods: POST, PUT, OPTIONS');
            // header('Access-Control-Allow-Headers: Content-Type');
            // header('Access-Control-Allow-Credentials: true');

            // if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            //     header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            //     header('Access-Control-Allow-Methods: PUT, OPTIONS');
            //     header('Access-Control-Allow-Headers: Content-Type');
            // }

            $model = model(Commentmodel::class);
            $success = $model->updatecomment();

            // return $this->response->setHeader('Access-Control-Allow-Origin', '*')->setStatusCode(200)->setJSON($data);

            // Exemple : Retourner une réponse JSON
            if ($success) {
                $response = ['success' => true, 'message' => 'Changement effectué avec succès'];
            } else {
                $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
            }

            echo json_encode($response);

      
        }

        /* ----------------------------------------------------
                             DELETE
        --------------------------------------------------- */

        public function deletecomment($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            header('Access-Control-Allow-Methods: DELETE, OPTIONS');
        }

        $model = model(Commentmodel::class);
        $success = $model->deletecommentaire($id);

        if ($success) {
            return $this->response->setStatusCode(200)->setBody(['success' => true, 'message' => 'Tâche supprimée avec succès']);
        } else {
            return $this->response->setStatusCode(500)->setBody(['success' => false, 'message' => 'Échec de la suppression de la tâche']);
        }
    }


    /* ----------------------------------------------------
                         GET
    ----------------------------------------------------- */ 
    public function getcomment()
    {
        $model = model(Commentmodel::class);
        $data = $model->getcomment();
        return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setJSON($data);

    }






    }
