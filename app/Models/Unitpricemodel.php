<?php
    Namespace App\Models;
    Use CodeIgniter\Model;



    class Unitpricemodel extends Model
    {
        protected $table ='price';
        protected $allowedFields = ['prestation', 'item', 'description', 'price', 'unity', 'date', 'generic', 'comment', 'projectid'];

        public function addunitprice()
        {

            /* ----------------------------------------------------
                                    ADD 
            --------------------------------------------------- */
            $jsonData = json_decode(file_get_contents('php://input'), true);
            if($jsonData == null){
                http_response_code(400);
                echo json_encode(['error' => 'invalid JSON']);
                exit;
            }


            $data = [
                'prestation' => $jsonData['prestation'],
                'item' => $jsonData['item'],
                'description' => $jsonData['description'],
                'price' => $jsonData['price'],
                'unity' => $jsonData['unity'],
                'date' => $jsonData['date'],
                'generic' => $jsonData['generic'],
                'comment' => $jsonData['comment'],
                'projectid' => $jsonData['projectid'],
            ];
            return $this->insert($data);

        }

            /* ----------------------------------------------------
                                    GET 
            --------------------------------------------------- */
        public function getunitprice()
        {
            return $this->findAll();
        }


        

    }