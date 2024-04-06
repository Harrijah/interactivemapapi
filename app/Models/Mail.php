<?php
    namespace App\Models;

    use CodeIgniter\Model;

    class Mail extends Model
    {
        protected $allowedFields = ['nom', 'email', 'telephone', 'demande', 'message'];

        public function mailinfo()
        {
            $data = [
                'nom' => ($_POST['nom']),
                'email' => ($_POST['email']),
                'telephone' => ($_POST['telephone']),
                // 'demande' => ($_GET['demande']),
                'message' => ($_POST['message'])
            ];
            return $data;
        }

        public function mailcontact()
        {
            $data = [
                'nom' => ($_POST['nom']),
                'email' => ($_POST['email']),
                'telephone' => ($_POST['telephone']),
                'demande' => ($_GET['demande']),
                'message' => ($_POST['message'])
            ];
            return $data;
        }



















    }