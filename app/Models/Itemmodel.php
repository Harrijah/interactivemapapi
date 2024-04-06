<?php
    Namespace App\Models;

    Use CodeIgniter\Model;

    class Itemmodel extends Model
    {
        protected $table = 'items';
        protected $allowedFields = ['item', 'typeprestationsid'];

        public function addpriceitem ()
        {
            $jsonData = json_decode(file_get_contents('php://input'), true);
            if($jsonData == null) {
                http_response_code(400);
                echo json_encode(['error' => 'invalid json']);
            }

            $data = [
                'item' => $jsonData['item'],
                'typeprestationsid' => $jsonData['typeprestationsid'],
            ];
            return $this->insert($data);
        }

        public function getpriceitem ()
        {
            return $this->findAll();
        }


    }

    