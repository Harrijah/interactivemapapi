<?php
    Namespace App\Models;

    Use CodeIgniter\Model;

    class Unitymodel extends Model
    {
        protected $table = 'unite';
        protected $allowedFields = ['unite', 'description'];

        public function addunity ()
        {
            $jsonData = json_decode(file_get_contents('php://input'), true);
            if($jsonData == null) {
                http_response_code(400);
                echo json_encode(['error' => 'invalid json']);
            }

            $data = [
                'unite' => $jsonData['unite'],
                'description' => $jsonData['description'],
            ];
            return $this->insert($data);
        }

        public function getunity ()
        {
            return $this->findAll();
        }


    }

    