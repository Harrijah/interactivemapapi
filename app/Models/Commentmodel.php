<?php
    Namespace App\Models;

    Use CodeIgniter\Model;

    class Commentmodel extends Model
    {
        protected $table = ['commentaire'];
        protected $allowedFields = ['datecomment', 'commentaire', 'pidforcomment', 'midforcomment'];


    /* ----------------------------------------------------
                            ADD COMMENT
    --------------------------------------------------- */
        public function addcomment()
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
                'datecomment' => $jsonData['datecomment'],
                'commentaire' => $jsonData['commentaire'],
                'pidforcomment' => $jsonData['pidforcomment'],
                'midforcomment' => $jsonData['midforcomment'],
            ];

            return $this->insert($data);
        }


    /* ----------------------------------------------------
                            UPDATE COMMENTS
    --------------------------------------------------- */
        function updatecomment()
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
                            DELETE COMMENTS
    --------------------------------------------------- */
        public function deletecomment($id)
        {
            $this->where('id', $id);
            return $this->delete();
        }


    /* ----------------------------------------------------
                            GET COMMENTS
    --------------------------------------------------- */
            public function getcomment()
            {
                return $this->findAll();
            }
  
    }