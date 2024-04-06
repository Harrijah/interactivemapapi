<?php
    Namespace App\Models;
    Use CodeIgniter\Model;
    class Todolistmodel extends Model
    {
        protected $table = ['todolist'];
        protected $allowedFields = ['project', 'mission', 'todo', 'checked'];


    /* ----------------------------------------------------
                            ADD TODOS
    --------------------------------------------------- */
        public function additem()
        {           

            // Récupérer les données JSON du corps de la requête POST
            $jsonData = json_decode(file_get_contents('php://input'), true);

            // Vérifier si le décodage a réussi
            if ($jsonData === null) {
                http_response_code(400); // Code d'erreur BadRequest
                echo json_encode(['error' => 'Invalid JSON']);
                exit;
            }
            // Utiliser $jsonData pour traiter les données
            $data = [
                'project' => $jsonData['project'],
                'mission' => $jsonData['mission'],
                'todo' => $jsonData['todo']
            ];

            return $this->insert($data);
        }


    /* ----------------------------------------------------
                            UPDATE TODOS
    --------------------------------------------------- */
        function updatetodo()
        {
            $jsonData = json_decode(file_get_contents('php://input'), true);

            // Vérifier si le décodage a réussi
            if ($jsonData === null) {
                http_response_code(400); // Code d'erreur BadRequest
                echo json_encode(['error' => 'Invalid JSON']);
                exit;
            }
            
            $this->where('id', $jsonData['id'])
            ->set('checked', $jsonData['checked']);
            
            $this->update();
        }


    /* ----------------------------------------------------
                            DELETE TODOS
    --------------------------------------------------- */
        public function deleteTodo($id)
        {
            $this->where('id', $id);
            return $this->delete();
        }


    /* ----------------------------------------------------
                            GET TODOS
    --------------------------------------------------- */
            public function getitem()
            {
                return $this->findAll();
            }
    
    



    
  
    }