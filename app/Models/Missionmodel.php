<?php
    Namespace App\Models;
    Use CodeIgniter\Model;


    class Missionmodel extends Model
    {
        protected $table = ['missions'];
        protected $allowedFields = ['nom', 'typeprestations', 'datedemande', 'deadline', 'budgetestimatif',  'datedebutprevisionnelle', 'dureeprevisionnelle', 'datefinprevisionnelle', 'description', 'statut', 'responsable', 'client', 'interlocuteur', 'poste', 'mail', 'telephone', 'ville', 'departement', 'priorite'];

        public function addnewmission()
        {
            $data = [
                'nom' => ($_POST['nom']),
                'typeprestations' => ($_POST['typeprestations']),
                'datedemande' => ($_POST['datedemande']),
                'deadline' => ($_POST['deadline']),
                'description' => ($_POST['description']),
                'statut' => ($_POST['statut']),
                'responsable' => ($_POST['responsable']),
            ];

            return $this->insert($data);
        }
        public function getmissions()
        {
            return $this->findAll();
        }

    /* ----------------------------------------------------
                            UPDATE PRIO
    --------------------------------------------------- */

    function updatepriomission()
    {
        $jsonData = json_decode(file_get_contents('php://input'), true);

        // Vérifier si le décodage a réussi
        if ($jsonData === null) {
            http_response_code(400); // Code d'erreur BadRequest
            echo json_encode(['error' => 'Invalid JSON']);
            exit;
        }
        
        $this->where('id', $jsonData['id'])
        ->set('priorite', $jsonData['priorite']);
        
        $this->update();
    }



    /* ----------------------------------------------------
                            UPDATE STATUT
    --------------------------------------------------- */

    public function updatestatusmission()
    {
        $jsonData = json_decode(file_get_contents('php://input'), true);
        $this->where('id', $jsonData['id'])->set('statut', $jsonData['statut']);
        $this->update();
    }


    }