<?php
    Namespace App\Models;

    Use CodeIgniter\Model;

    class Linkmodel extends Model
    {
        protected $table = ['projectlinks'];
        protected $allowedFields = ['filename', 'filelink', 'projectid', 'missionid'];


    /* ----------------------------------------------------
                            ADD LINK
    --------------------------------------------------- */
        public function addlink()
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
                'filename' => $jsonData['filename'],
                'filelink' => $jsonData['filelink'],
                'projectid' => $jsonData['projectid'],
                'missionid' => $jsonData['missionid']
            ];

            return $this->insert($data);
        }


    /* ----------------------------------------------------
                            UPDATE LINKS
    --------------------------------------------------- */
        function updatelink()
        {
            $jsonData = json_decode(file_get_contents('php://input'), true);

            // Vérifier si le décodage a réussi
            if ($jsonData === null) {
                http_response_code(400); // Code d'erreur BadRequest
                echo json_encode(['error' => 'Invalid JSON']);
                exit;
            }
            
            $this->where('id', $jsonData['id'])
            ->set('filelink', $jsonData['filelink']);
            
            $this->update();
        }


    /* ----------------------------------------------------
                            DELETE LINKS
    --------------------------------------------------- */
        public function deletelink($id)
        {
            $this->where('id', $id);
            return $this->delete();
        }


    /* ----------------------------------------------------
                            GET LINKS
    --------------------------------------------------- */
            public function getlink()
            {
                return $this->findAll();
            }   
  
    }