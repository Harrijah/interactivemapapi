<?php 
    Namespace App\Models;

    Use CodeIgniter\Model;

    class Descriptionmodel extends Model
    {
        protected $table = 'descriptions';
        protected $allowedFields = ['description', 'item'];

        public function adddescription ()
        {
            $jsonData = json_decode(file_get_contents('php://input'), true);
            if($jsonData == null) {
                http_response_code(400);
                echo json_encode(['error' => 'invalid json']);
            }
            $data = 
            [
                'description' => $jsonData['description'],
                'item' => $jsonData['item'],
            ];

            return $this-> insert($data);
        
        }
        public function getdescription ()
        {
            return $this->findAll();
        }
    }