<?php
    Namespace App\Controllers;

    Use App\Models;
    helper(['form', 'url']); 

    class Todolist extends BaseController
    {
        public function additem()
        {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            header('Access-Control-Allow-Methods: POST, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type');
            header('Access-Control-Allow-Credentials: true');

            $model = model(Todolistmodel::class);
            $success = $model->additem();

            // Exemple : Retourner une réponse JSON
            if ($success) {
                $response = ['success' => true, 'message' => 'Todo ajouté avec succès'];
            } else {
                $response = ['success' => false, 'message' => 'Échec de l\'ajout de la tâche'];
            }
            echo json_encode($response);

            // return redirect->to('https://carte.axel.mg');
        }



        /* ----------------------------------------------------
                             UPDATE
        --------------------------------------------------- */
        public function updateitem()
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

            $model = model(Todolistmodel::class);
            $success = $model->updatetodo();

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

        public function deleteitem($id)
    {
        // header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        // header('Access-Control-Allow-Methods: DELETE, OPTIONS');
        // header('Access-Control-Allow-Headers: Content-Type');
        // header('Access-Control-Allow-Credentials: true');

        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            header('Access-Control-Allow-Methods: DELETE, OPTIONS');
        }

        $model = model(TodolistModel::class);
        $success = $model->deleteTodo($id);

        if ($success) {
            return $this->response->setStatusCode(200)->setBody(['success' => true, 'message' => 'Tâche supprimée avec succès']);
        } else {
            return $this->response->setStatusCode(500)->setBody(['success' => false, 'message' => 'Échec de la suppression de la tâche']);
        }
    }


    /* ----------------------------------------------------
                         GET
    ----------------------------------------------------- */ 
    public function getitem()
    {
        $model = model(Todolistmodel::class);
        $data = $model->getitem();
        return $this->response->setHeader('Access-Control-Allow-Origin', 'http://localhost:3000')->setStatusCode(200)->setJSON($data);
    }

}
