<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ##======== CREATION D'UN ADMIN PAR DEFAUT ============####
        $users = [
            [
                'name' => 'Admin ',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$8JhR1nysW.mE1hI7CqkArelFuSLglJaBxJK5w1yLaNSpedc.4q.fq', #admin
                'phone' => "22961765590",
                'is_super_admin' => true,
            ],
            [
                'name' => 'PP JJOEL',
                'username' => 'ppjjoel',
                'email' => 'ppjjoel@gmail.com',
                'password' => '$2y$10$ZT2msbcfYEUWGUucpnrHwekWMBDe1H0zGrvB.pzQGpepF8zoaGIMC', #ppjjoel
                'phone' => "22997555619",
                'is_super_admin' => true,
            ],

            [
                'name' => 'RG GETECH',
                'username' => 'rg',
                'email' => 'gansaruth@gmail.com',
                'password' => 'Toto12',
                'phone' => "22967555619",
                'is_super_admin' => true,
            ]
        ];
        foreach ($users as $user) {
            \App\Models\User::factory()->create($user);
        }

        ##======== CREATION DES STATUS DES TRANSACTIONS PAR DEFAUT ============####
        $status = [
            [
                'name' => 'Ouvert',
                'description' => 'Le dossier est lancé',
            ],
            [
                'name' => 'En cours..',
                'description' => 'Le dossier est toujours d\'actualité',
            ],
            [
                'name' => 'Clos..',
                'description' => 'Le dossier à été traité et cloturé',
            ],
        ];
        foreach ($status as $statu) {
            \App\Models\Statut::factory()->create($statu);
        }

        ##======== CREATION DES TYPES DES TRANSACTIONS PAR DEFAUT ============####
        $categories = [
            [
                'name' => 'Penal',
            ],
            [
                'name' => 'Civil',
            ],
            [
                'name' => 'Social',
            ],
            [
                'name' => 'Administratif',
            ],
            [
                'name' => 'Commercial',
            ],
        ];
        foreach ($categories as $categorie) {
            \App\Models\CategorieDossier::factory()->create($categorie);
        }

        $avocats = [
            [
                'name' => 'TOSSOU Paul',
                'email' => ' tossou@gmail.com',
                'phone' => ' 97584563',

            ],
            [
                'name' => 'MARCOS Faiwaz',
                'email' => ' faiwazmarcos@gmail.com',
                'phone' => ' 67986763',


            ],
            [
                
                'name' => 'AGBO Nathan',
                'email' => ' natthanagbo@gmail.com',
                'phone' => ' 54252321',
            ],
        ];
        foreach ($avocats as $avocat) {
            \App\Models\Avocat::factory()->create($avocat);
        }

        $collabs = [
            [
                'name' => 'GANDAHO Luc',
                'email' => ' lucgan@gmail.com',
                'phone' => ' 90204563',

            ],
            [
                'name' => 'DARKO Fredy',
                'email' => ' fredydark@gmail.com',
                'phone' => ' 56422365',


            ],
            [
                
                'name' => 'MARIANO Norvice',
                'email' => ' norvice@gmail.com',
                'phone' => ' 61986764',
            ],
        ];
        foreach ($collabs as $collab) {
            \App\Models\Collaborateur::factory()->create($collab);
        }

       
        $rangs = [
            [
                "name" => "admin",
                "description" => "L'administrateur général du networking",
            ],
                    [
                "name" => "moderator",
                "description" => "Le modérateur du compte",
            ],
            [
                "name" => "user",
                "description" => "Un simple utilisateur du compte",
            ],
        ];
        foreach ($rangs as $rang) {
            \App\Models\Rang::factory()->create($rang);
        }

        

        ##======== CREATION DES STATUS DES TRANSACTIONS PAR DEFAUT ============####
        $docutcats = [
            [
                'label' => 'Assignation',
                'description' => 'Acte de procédure délivré par un huissier de justice.',
            ],
            [
                'label' => 'Courrier',
                'description' => 'Le pli judiciaire ',
            ],
            [
                'label' => 'Memoir',
                'description' => 'Document produit pour attaquer ou se defendre lors du procès',
            ],
        ];
        foreach ($docutcats as $docutcat) {
            \App\Models\DocumentCategory::factory()->create($docutcat);
        }
        ##======== CREATION DES STATUS DES TRANSACTIONS PAR DEFAUT ============####
        $juridictions = [
            [
                'label' => 'TPI',
                'description' => 'Tribunal de Premièere Instance.',
            ],
            [
                'label' => 'Appel',
                'description' => 'La cour d\'appel ',
            ],
            [
                'label' => 'Cassation',
                'description' => 'Cassation',
            ],

            [
                'label' => 'Tribunal arbitral',
                'description' => 'Tribunal arbitral',
            ],
            [
                'label' => 'Centre de méditation/Conciliation',
                'description' => 'Centre de méditation/Conciliation',
            ],
            
        ];
        foreach ($juridictions as $juridiction) {
            \App\Models\Juridiction::factory()->create($juridiction);
        }


        $partietypes = [
            [
                'label' => 'Client',
                'description' => ' Client de la banque',
            ],
            [
                'label' => 'Fournisseur',
                'description' => 'Fournisseur de la banque ',
            ],
            [
                'label' => 'Partenaire',
                'description' => 'Partenaire de la banque',
            ],

            [
                'label' => 'Tribunal arbitral',
                'description' => 'Tribunal arbitral',
            ],
            [
                'label' => 'Employé',
                'description' => 'Employé de la banque',
            ],
            
        ];
        foreach ($partietypes as $partietype) {
            \App\Models\PartiesType::factory()->create($partietype);
        }

        $partiecates = [
            [
                'label' => 'Demandeur',
                'description' => 'Personne qui à l\'initiative du procès.',
            ],
            [
                'label' => 'Défendeur',
                'description' => 'Personne contre laquelle est intentée une action en justice',
            ],
            

            [
                'label' => ' Intervenant',
                'description' => 'Personne qui intervient dans une intance,dans un procès pour defendre les intérêts de l\'une des parties',
            ],
            [
                'label' => 'Intervenant forcée',
                'description' => 'Le tiers n\'est pas partie du procès,mais sous certaines conditions,l\'une des partiespeur forcer un tier à intervenir dans le procès en tant que partie',
            ],
            
        ];
        foreach ($partiecates as $partiecate) {
            \App\Models\PartiesCategory::factory()->create($partiecate);
        }



        $parties = [
            [
                'email' => 'lucdo@gmail.com',
                'name' => 'DOSSOU Luc',
                'phone' => '90584512',
                'partietype_id' => 1,
                'partiecategory_id'=> 2,


            ],
            [
                'email' => 'lolo@gmail.com',
                'name' => 'TOSSA Eric',
                'phone' => '96584512',
                'partietype_id' => 1,
                'partiecategory_id'=> 3,
                
            ],

            

            [
                'email' => 'lokosa@gmail.com',
            'name' => 'LOKO  Blanche',
            'phone' => '97584512',
            'partietype_id' => 1,
            'partiecategory_id'=> 1,

                 
            ],
            [
                'email' => 'tosa@gmail.com',
                'name' => 'TOSSA Blandine',
                'phone' => '97584512',
                'partietype_id' => 1,
                'partiecategory_id'=> 1,

                
            ],
            
        ];
        foreach ($parties as $partie) {
            \App\Models\Partie::factory()->create($partie);
        }



#======== CREATION DES ACTIONS PAR DEFAUT=========#
$actions = [
    #####new actions
    [
        'name' => "list_collaborateur",
        'description' => "Lister les collaborateurs",
        'visible' => true
    ],
    [
        'name' => "add_collaborateur",
        'description' => "Ajouter un collaborateur",
        'visible' => true
    ],
    [
        'name' => "update_collaborateur",
        'description' => "Mettre à jour un collaborateur",
        'visible' => true
    ],
    [
        'name' => "delete_collaborateur",
        'description' => "Supprimer un collaborateur",
        'visible' => true
    ],
    [
        'name' => "view_collaborateur",
        'description' => "Détail d'un collaborateur",
        'visible' => true
    ],
    [
        'name' => "list_contactGroup",
        'description' => "Lister les groupe de cintact",
        'visible' => true
    ],
    [
        'name' => "add_contactGroup",
        'description' => "Ajouter un groupe de cintact",
        'visible' => true
    ],
    
    
    [
        'name' => "list_user",
        'description' => "Lister les users",
        'visible' => true
    ],
    [
        'name' => "update_user",
        'description' => "Mettre à jour un user",
        'visible' => true
    ],
    [
        'name' => "delete_user",
        'description' => "Supprimer un user",
        'visible' => true
    ],
    [
        'name' => "view_user",
        'description' => "Détail d'un user",
        'visible' => true
    ],
    [
        'name' => "list_right",
        'description' => "Lister les rights",
        'visible' => true
    ],
    [
        'name' => "add_right",
        'description' => "Ajouter un right",
        'visible' => true
    ],
    [
        'name' => "update_right",
        'description' => "Mettre à jour un right",
        'visible' => true
    ],
    [
        'name' => "delete_right",
        'description' => "Supprimer un right",
        'visible' => true
    ],
    [
        'name' => "view_right",
        'description' => "Détail d'un right",
        'visible' => true
    ],
    [
        'name' => "list_profil",
        'description' => "Lister les profils",
        'visible' => true
    ],
    [
        'name' => "add_profil",
        'description' => "Ajouter un profil",
        'visible' => true
    ],
    [
        'name' => "update_profil",
        'description' => "Mettre à jour un profil",
        'visible' => true
    ],
    [
        'name' => "delete_profil",
        'description' => "Supprimer un profil",
        'visible' => true
    ],
    [
        'name' => "view_profil",
        'description' => "Détail d'un profil",
        'visible' => true
    ],
    [
        'name' => "list_rang",
        'description' => "Lister les rangs",
        'visible' => true
    ],
    [
        'name' => "add_rang",
        'description' => "Ajouter un rang",
        'visible' => true
    ],
    [
        'name' => "update_rang",
        'description' => "Mettre à jour un rang",
        'visible' => true
    ],
    [
        'name' => "delete_rang",
        'description' => "Supprimer un rang",
        'visible' => true
    ],
    [
        'name' => "view_rang",
        'description' => "Détail d'un rang",
        'visible' => true
    ],
    [
        'name' => "list_action",
        'description' => "Lister les action",
        'visible' => true
    ],
    [
        'name' => "add_action",
        'description' => "Ajouter un action",
        'visible' => true
    ],
    [
        'name' => "update_action",
        'description' => "Mettre à jour un action",
        'visible' => true
    ],
    [
        'name' => "delete_action",
        'description' => "Supprimer un action",
        'visible' => true
    ],
    [
        'name' => "view_action",
        'description' => "Détail d'une action",
        'visible' => true
    ],
    

    ####old actions
    [
        'name' => 'add_user',
        'description' => 'Ajout d\'utilisateur',
        'visible' => true
    ],
    [
        'name' => 'global_stats',
        'description' => "Statistique globale de la plateforme : Nombre de distributeurs, cartes, agents commerciaux, etc.",
        'visible' => true
    ],
    [
        'name' => 'list_agency',
        'description' => 'Liste des distributeurs',
        'visible' => true
    ],
    
    [
        'name' => 'add_user_right',
        'description' => 'Ajout de droit',
        'visible' => true
    ],
    [
        'name' => 'admin',
        'description' => 'Administration',
        'visible' => true
    ],
    [
        'name' => 'activate_card',
        'description' => 'Activation de carte',
        'visible' => true
    ],
    [
        'name' => 'admin_agency',
        'description' => 'Administration pour distributeur',
        'visible' => true
    ],
  
   
    [
        'name' => 'list_avocat',
        'description' => 'Lister des avocats',
        'visible' => true
    ],
    [
        'name' => 'add_avocat',
        'description' => 'Ajouter des avocats',
        'visible' => true
    ],
   
   
    [
        'name' => 'delete_user_right',
        'description' => 'Retirer droit à un utilisateur',
        'visible' => true
    ],
    
   
    [
        'name' => 'deepsearch',
        'description' => 'Recherche approfondie',
        'visible' => true
    ],
    [
        'name' => 'list_deepsearch',
        'description' => 'Liste recherches approfondies',
        'visible' => true
    ],
    [
        'name' => 'set_deepsearch',
        'description' => 'Répondre recherches approfondies',
        'visible' => true
    ],
   
   
    
    
   
    [
        'name' => "list_avocats",
        'description' => "Lister les avocats",
        'visible' => true
    ],
    [
        'name' => "add_avocats",
        'description' => "Ajouter un avocats",
        'visible' => true
    ],
    [
        'name' => "update_master",
        'description' => "Mettre à jour un avocats",
        'visible' => true
    ],
    [
        'name' => "delete_avocats",
        'description' => "Supprimer un master",
        'visible' => true
    ],
    [
        'name' => "list_avocats",
        'description' => "Lister les agencies",
        'visible' => true
    ],
    
    
    
    [
        'name' => "update_agent",
        'description' => "Mettre à jour un agent",
        'visible' => true
    ],
    [
        'name' => "delete_agent",
        'description' => "Supprimer un agent",
        'visible' => true
    ],
   
   
    [
        'name' => "list_table",
        'description' => "Lister les tables",
        'visible' => true
    ],
    [
        'name' => "add_table",
        'description' => "Ajouter une table",
        'visible' => true
    ],
    [
        'name' => "update_table",
        'description' => "Mettre à jour une table",
        'visible' => true
    ],
    [
        'name' => "delete_table",
        'description' => "Supprimer une table",
        'visible' => true
    ],
    [
        'name' => "list_dossier",
        'description' => "Lister les dossier",
        'visible' => true
    ],
    [
        'name' => "add_dossier",
        'description' => "Ajouter un dossier",
        'visible' => true
    ],
    [
        'name' => "update_dossier",
        'description' => "Mettre à jour un dossier",
        'visible' => true
    ],
    [
        'name' => "delete_dossier",
        'description' => "Supprimer un dossier",
        'visible' => true
    ],
    
   
    [
        'name' => "list_dossier_category",
        'description' => "Lister les dossier_categories",
        'visible' => true
    ],
    [
        'name' => "add_dossier_category",
        'description' => "Ajouter un dossier_category",
        'visible' => true
    ],
    [
        'name' => "update_dossier_category",
        'description' => "Mettre à jour un dossier_category",
        'visible' => true
    ],
    [
        'name' => "delete_dossier_category",
        'description' => "Supprimer un dossier_category",
        'visible' => true
    ],
   
   
    [
        'name' => "list_user",
        'description' => "Lister les users",
        'visible' => true
    ],
    [
        'name' => "update_user",
        'description' => "Mettre à jour un user",
        'visible' => true
    ],
    [
        'name' => "delete_user",
        'description' => "Supprimer un user",
        'visible' => true
    ],
    [
        'name' => "list_right",
        'description' => "Lister les rights",
        'visible' => true
    ],
    [
        'name' => "add_right",
        'description' => "Ajouter un right",
        'visible' => true
    ],
    [
        'name' => "update_right",
        'description' => "Mettre à jour un right",
        'visible' => true
    ],
    [
        'name' => "delete_right",
        'description' => "Supprimer un right",
        'visible' => true
    ],
    [
        'name' => "list_profil",
        'description' => "Lister les profils",
        'visible' => true
    ],
    [
        'name' => "add_profil",
        'description' => "Ajouter un profil",
        'visible' => true
    ],
    [
        'name' => "update_profil",
        'description' => "Mettre à jour un profil",
        'visible' => true
    ],
    [
        'name' => "delete_profil",
        'description' => "Supprimer un profil",
        'visible' => true
    ],
    [
        'name' => "list_rang",
        'description' => "Lister les rangs",
        'visible' => true
    ],
    [
        'name' => "add_rang",
        'description' => "Ajouter un rang",
        'visible' => true
    ],
    [
        'name' => "update_rang",
        'description' => "Mettre à jour un rang",
        'visible' => true
    ],
    [
        'name' => "delete_rang",
        'description' => "Supprimer un rang",
        'visible' => true
    ],
    [
        'name' => "list_action",
        'description' => "Lister les action",
        'visible' => true
    ],
    [
        'name' => "add_action",
        'description' => "Ajouter une action",
        'visible' => true
    ],
    [
        'name' => "update_action",
        'description' => "Mettre à jour une action",
        'visible' => true
    ],
    [
        'name' => "delete_action",
        'description' => "Supprimer un action",
        'visible' => true
    ],
    [
        'name' => "affect_right",
        'description' => "Affecter un droit",
        'visible' => true
    ]
];

foreach ($actions as $action) {
    \App\Models\Action::factory()->create($action);
}



#======== CREATION DES PROFILS PAR DEFAUT=========#
$profils = [
    [
        "name" => "Système",
        "description" => "Gestionnaire du Système",
    ],
    [
        "name" => "Responsable",
        "description" => "Le Responsable du compte",
    ],
    [
        "name" => "Technicien",
        "description" => "Un Technicien de votre structure ou de FRIKLABEL",
    ],
    [
        "name" => "Employe",
        "description" => "Un Employe de votre structure",
    ],
    [
        "name" => "Agency",
        "description" => "Un Distributeur de votre structure",
    ],
    [
        "name" => "Master",
        "description" => "Master distributeur",
    ],
    [
        "name" => "Agent",
        "description" => "Agent commercial",
    ],
    [
        "name" => "Client",
        "description" => "Client",
    ],
    [
        "name" => "Admin",
        "description" => "L'administrateur",
    ],
];

foreach ($profils as $profil) {
    \App\Models\Profil::factory()->create($profil);
}





         
    }
}
