<?php
    Namespace App\Models;
    Use CodeIgniter\Model;



    class Pricemodel extends Model
    {
        protected $table ='prestation';
        protected $allowedFields = ['typeprestations'];

        public function addprestation()
        {

            /* ----------------------------------------------------
                                    ADD PRESTATION
            --------------------------------------------------- */
            $jsonData = json_decode(file_get_contents('php://input'), true);
            if($jsonData == null){
                http_response_code(400);
                echo json_encode(['error' => 'invalid JSON']);
                exit;
            }


            $data = [
                'typeprestations' => $jsonData['typeprestations'],
            ];
            return $this->insert($data);

        }

        public function gettypeprestations()
        {
            return $this->findAll();
        }


        

    }