<?php
    Namespace App\Models;
    Use CodeIgniter\Model;


    class Projectmodel extends Model
    {
        protected $table = ['projects'];
        protected $allowedFields = ['nom', 'typeprestations', 'datedemande', 'deadline', 'budgetestimatif',  'datedebutprevisionnelle', 'dureeprevisionnelle', 'datefinprevisionnelle', 'description', 'statut', 'responsable', 'client', 'interlocuteur', 'poste', 'mail', 'telephone', 'ville', 'departement', 'priorite'];

        public function addprojects()
        {
            $data = [
                'nom' => ($_POST['nom']),
                'typeprestations' => ($_POST['typeprestations']),
                'datedemande' => ($_POST['datedemande']),
                'deadline' => ($_POST['deadline']),
                'budgetestimatif' => ($_POST['budgetestimatif']),
                'datedebutprevisionnelle' => ($_POST['datedebutprevisionnelle']),
                'dureeprevisionnelle' => ($_POST['dureeprevisionnelle']),
                'datefinprevisionnelle' => ($_POST['datefinprevisionnelle']),
                'description' => ($_POST['description']),
                'statut' => ($_POST['statut']),
                'responsable' => ($_POST['responsable']),
                'client' => ($_POST['client']),
                'interlocuteur' => ($_POST['interlocuteur']),
                'poste' => ($_POST['poste']),
                'mail' => ($_POST['mail']),
                'telephone' => ($_POST['telephone']),
                'ville' => ($_POST['ville']),
                'departement' => ($_POST['departement']),
            ];

            return $this->insert($data);
        }
        public function getprojects()
        {
            return $this->findAll();
        }

    /* ----------------------------------------------------
                            UPDATE PRIO
    --------------------------------------------------- */

    function updateprio()
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

    public function updatestatus()
    {
        $jsonData = json_decode(file_get_contents('php://input'), true);
        $this->where('id', $jsonData['id'])->set('statut', $jsonData['statut']);
        $this->update();
    }


    }