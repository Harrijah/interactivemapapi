<?php 
    Namespace App\Models;
    use CodeIgniter\Model;

    class Testmodel extends Model
    {
        protected $table = ['test']  ;
        protected $allowedFields = ['valeur'];

        public function addtest()
        {
            $data = [
                'valeur' => ($_POST['valeur']),
            ];

            return $this->insert($data);
        }
        
    }