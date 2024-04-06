<?php 
    Namespace App\Models;
    use CodeIgniter\Model;

    class Zonemodel extends Model
    {
        protected $table = ['paths'];
        protected $allowedFields = ['id', 'title', 'coul', 'url', 'target', 'path'];

        public function getzone()
        {
            return $this->findAll();
        }

        public function getzonebyid($id)
        {
            return $this->where('id', $id)->first();
        }

    }