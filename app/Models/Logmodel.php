<?php
    Namespace App\Models;
    use CodeIgniter\Model;

    class Logmodel extends Model
    {
        protected $table = 'log';
        protected $allowedFields = ['log', 'pwd'];

        public function logme () 
        {
            $jsonData = json_decode(file_get_contents('php://input'), true);
            if($jsonData == null){
                http_response_code(400);
                echo json_encode(['error' => 'invalid json']);
            }

            $data = [
                'log' => $jsonData['log'],
                'pwd' => $jsonData['pwd'],
                // 'log' => 'admin',
                // 'pwd' => 'admin1234',
            ];
            return $data;
        }
    }





