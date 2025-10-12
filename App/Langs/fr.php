<?php

return [
    'menu' => [
        'home' => 'Accueil',
        'companies' => 'Entreprises',
        'collaborators' => 'Collaborateurs',
        'calendar' => 'Calendrier',
        'resources' => 'Ressources',
        'clients' => 'Clients',
        'audits' => 'Audits'
    ],
    'navbar' => [
        'profile' => 'Profil',
        'logout' => 'Déconnexion',
    ],
    'filters' => [
        'title' => 'Filtres',
        'clear' => 'Effacer les filtres',
        'search' => [
            'label' => 'Rechercher',
            'placeholder' => 'Rechercher par nom',
        ],
        'search_event' => [
            'label' => 'Recherche',
            'placeholder' => 'Rechercher par nom, titre d’événement ou valeurs',
        ],
        'user' => [
            'placeholder' => 'Sélectionner un utilisateur',
        ],
        'event_type' => [
            'placeholder' => 'Sélectionner un type d’événement',
        ],
        'date_start' => [
            'placeholder' => 'Date de début',
        ],
        'date_end' => [
            'placeholder' => 'Date de fin',
        ]
    ],
    'buttons' => [
        'create' => 'Créer',
        'edit' => 'Modifier',
        'delete' => 'Supprimer',
        'save' => 'Enregistrer',
        'cancel' => 'Annuler',
        'yes' => 'Oui',
        'no' => 'Non',
        'back' => 'Retour',
        'close' => 'Fermer',
    ],
    'selects' => [
        'select_an_option' => 'Sélectionner une option',
    ],
    'validations' => [
        'required' => 'Ce champ est obligatoire.',
        'min' => 'Ce champ doit contenir au moins :min caractères.',
        'max' => 'Ce champ ne peut pas dépasser :max caractères.',
        'email' => 'Ce champ doit être une adresse email valide.',
        'invalid_date' => 'Format de date invalide.',
        'login_error' => "Email ou mot de passe incorrect.",
        'something_went_wrong' => 'Une erreur est survenue. Veuillez réessayer plus tard.',
        'email_not_found' => 'Email non trouvé.',
    ],
    'messages' => [
        'create_success' => 'L’enregistrement a été créé avec succès.',
        'update_success' => 'L’enregistrement a été mis à jour avec succès.',
        'delete_success' => 'L’enregistrement a été supprimé avec succès.',
        'delete_confirm' => 'Êtes-vous sûr de vouloir supprimer cet enregistrement ?',
        'error' => 'Une erreur est survenue lors du traitement de la requête.',
        'login_success' => 'Connexion réussie.',
        'unauthorized_access' => 'Accès non autorisé. Veuillez vous connecter.',
    ],
    'modals' => [
        'success' => [
            'title' => 'Succès',
            'message' => "L'enregistrement a été créé avec succès.",
        ],
        'delete' => [
            'title' => 'Supprimer l’enregistrement',
            'message' => "Voulez-vous vraiment supprimer cet enregistrement ?",
        ],
        'error' => [
            'title' => 'Erreur',
            'message' => "Une erreur s'est produite lors du traitement de la requête.",
        ],
        'buttons' => [
            'yes' => 'Oui',
            'no' => 'Non',
            'ok' => 'Ok',
        ],
    ],
    'celebrants' => [
        'birthday_today' => '🎉 Anniversaire aujourd’hui',
        'birthday_on' => '🎉 Anniversaire le',
    ],
    'modules' => [
        'login' => [
            'title' => 'Bienvenue',
            'description' => 'Entrez vos identifiants pour accéder au système.',
            'fields' => [
                'email' => [
                    'label' => 'E-mail',
                    'placeholder' => 'Entrez votre email',
                ],
                'password' => [
                    'label' => 'Mot de passe',
                    'placeholder' => 'Entrez votre mot de passe',
                ],
                'button' => 'Connexion',
                'forgot_password' => 'Mot de passe oublié ?',
            ],
        ],
        'resetPassoword' => [
            'title' => 'Réinitialiser le mot de passe',
            'description' => 'Entrez votre e-mail pour réinitialiser votre mot de passe.',
            'reset_password_success' => 'Les instructions pour réinitialiser votre mot de passe ont été envoyées à votre e-mail. Veuillez vérifier votre boîte de réception et suivre les étapes pour réinitialiser votre mot de passe.',
            'fields' => [
                'email' => [
                    'label' => 'E-mail',
                    'placeholder' => 'Entrez votre e-mail',
                ],
                'button' => 'Réinitialiser le mot de passe',
                'back_to_login' => 'Retour à la connexion',
            ],
            'sendEmail' => [
                'title' => 'Réinitialiser le mot de passe',
                'description' => 'Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte. Un mot de passe temporaire a été généré. Veuillez le changer après vous être connecté. Si vous n’avez pas demandé cette réinitialisation, ignorez ce message.',
            ],
        ],
        'companies' => [
            'title' => 'Entreprises',
            'description' => 'Description des entreprises',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Nom',
                        'country' => 'Pays',
                        'active' => 'Actif',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Créer une entreprise',
                    'fields' => [
                        'company' => [
                            'label' => 'Nom de l’entreprise',
                            'placeholder' => "Entrez le nom de l'entreprise",
                        ],
                        'country_id' => [
                            'label' => 'Pays',
                            'placeholder' => 'Sélectionner un pays',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Modifier l’entreprise',
                ],
            ],
            'frontEndRoutes' => [
                'index' => 'companies',
                'create' => 'companies/create',
            ],
        ],
        'collaborators' => [
            'title' => 'Collaborateurs',
            'description' => 'Description des collaborateurs',
            'fields' => [
                'name' => 'Nom',
                'email' => 'E-mail',
                'company_id' => 'Entreprise',
                'active' => 'Actif',
            ],
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Nom',
                        'function' => 'Fonction',
                        'email' => 'E-mail',
                        'profile' => 'Profil',
                        'company' => 'Entreprise',
                        'active' => 'Actif',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Créer un collaborateur',
                    'fields' => [
                        'name' => [
                            'label' => 'Nom complet',
                            'placeholder' => 'Entrez le nom complet',
                        ],
                        'email' => [
                            'label' => 'E-mail',
                            'placeholder' => 'Entrez l’email',
                        ],
                        'password' => [
                            'label' => 'Mot de passe',
                            'placeholder' => 'Entrez le mot de passe',
                        ],
                        'gender' => [
                            'label' => 'Genre',
                            'placeholder' => 'Sélectionner le genre',
                        ],
                        'company_id' => [
                            'label' => 'Entreprise',
                            'placeholder' => 'Sélectionner l’entreprise',
                        ],
                        'birthdate' => [
                            'label' => 'Date de naissance',
                            'placeholder' => 'Entrez la date de naissance',
                        ],
                        'function' => [
                            'label' => 'Fonction',
                            'placeholder' => 'Entrez la fonction',
                        ],
                        'nationality' => [
                            'label' => 'Nationalité',
                            'placeholder' => 'Sélectionner la nationalité',
                        ],
                        'profile' => [
                            'label' => 'Profil',
                            'placeholder' => 'Sélectionner le profil',
                        ],
                        'head_of_teams_id' => [
                            'label' => 'Responsable d’équipe',
                            'placeholder' => 'Sélectionner le responsable d’équipe',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Modifier le collaborateur',
                ],
            ],
            'information' => [
                'title' => 'Informations',
                'description' => 'Description des informations',
            ],
            'settings' => [
                'title' => 'Paramètres',
                'description' => 'Description des paramètres',
                'languages' => [
                    'title' => 'Sélection de la langue',
                ],
            ],
            'welcome_email' => [
                'title' => 'Bienvenue dans l’équipe !',
                'email' => 'E-mail',
                'password' => 'Mot de passe',
                'hi' => 'Bonjour',
                'button_go' => "Aller au système de planification",
                'description' => "Bienvenue à bord !
Votre compte a été créé avec succès dans le système de planification.
Vous pouvez maintenant vous connecter et commencer à explorer la plateforme.
Voici vos identifiants :",
            ],
        ],
        'calendar' => [
            'title' => 'Calendrier',
            'description' => 'Description du calendrier',
            'event_audit' => [
                'message' => '<em>:user</em> a :action l’événement le :date',
                'action' => [
                    'created' => 'créé',
                    'updated' => 'mis à jour',
                    'deleted' => 'supprimé',
                ],
            ],
            'fields' => [
                'name' => 'Nom',
                'description' => 'Description',
                'active' => 'Actif',
            ],
            'success' => [
                'event_created' => "Événement créé avec succès.",
                'event_updated' => "Événement mis à jour avec succès.",
                'users_order_updated' => "Ordre des utilisateurs mis à jour avec succès.",
                'event_deleted' => "Événement supprimé avec succès.",
                'event_created_other' => '{name} a créé un événement.',
                'event_updated_other' => '{name} a mis à jour un événement.',
                'event_deleted_other' => '{name} a supprimé un événement.',
            ],
            'errors' => [
                'company_not_found' => "Entreprise non trouvée.",
                'event_users_required' => "Des utilisateurs de l’événement sont requis.",
                'event_required_fields' => "Le titre, la date de début et la date de fin sont obligatoires pour l’événement.",
                'event_start_date_must_be_before_end_date' => "La date de début doit être antérieure à la date de fin.",
                'event_not_found' => "Événement non trouvé.",
                'event_creation_failed' => "Échec de la création de l’événement.",
                'event_update_failed' => "Échec de la mise à jour de l’événement.",
                'event_dates_invalid' => "La date de début doit être antérieure à la date de fin.",
                'users_order_required' => "L’ordre des utilisateurs est requis.",
                'users_order_invalid' => "L’ordre des utilisateurs est invalide.",
                'users_order_failed' => "Échec de la mise à jour de l’ordre des utilisateurs.",
                'pusher_event_failed' => "Échec du déclenchement de l’événement Pusher.",
                'event_delete_failed' => "Échec de la suppression de l’événement.",
            ],
        ],
        'clients' => [
            'title' => 'Clients',
            'description' => 'Description des clients',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Nom',
                        'company' => 'Entreprise',
                        'email' => 'E-mail',
                        'phone' => 'Téléphone',
                        'address' => 'Adresse',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Créer un client',
                    'fields' => [
                        'name' => [
                            'label' => 'Nom',
                            'placeholder' => 'Entrez le nom du client',
                        ],
                        'company_name' => [
                            'label' => 'Marque',
                            'placeholder' => 'Entrez le nom de l’entreprise',
                        ],
                        'email' => [
                            'label' => 'E-mail',
                            'placeholder' => 'Entrez l’email',
                        ],
                        'phone' => [
                            'label' => 'Téléphone',
                            'placeholder' => 'Entrez le numéro de téléphone',
                        ],
                        'address' => [
                            'label' => 'Adresse',
                            'placeholder' => 'Entrez l’adresse',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Modifier le client',
                    'fields' => [
                        'name' => [
                            'label' => 'Nom',
                            'placeholder' => 'Entrez le nom du client',
                        ],
                        'company_name' => [
                            'label' => 'Marque',
                            'placeholder' => 'Entrez le nom de l’entreprise',
                        ],
                        'email' => [
                            'label' => 'E-mail',
                            'placeholder' => 'Entrez l’email',
                        ],
                        'phone' => [
                            'label' => 'Téléphone',
                            'placeholder' => 'Entrez le numéro de téléphone',
                        ],
                        'address' => [
                            'label' => 'Adresse',
                            'placeholder' => 'Entrez l’adresse',
                        ],
                    ],
                ],
            ],
            'frontEndRoutes' => [
                'index' => 'clients',
                'create' => 'clients/create',
            ],
        ],
        'resources' => [
            'title' => 'Ressources',
            'description' => 'Description des ressources',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Nom',
                        'brand' => 'Marque',
                        'model' => 'Modèle',
                        'license_plate_number' => 'Numéro de plaque',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Créer une ressource',
                    'fields' => [
                        'name' => [
                            'label' => 'Nom',
                            'placeholder' => 'Entrez le nom de la ressource',
                        ],
                        'brand' => [
                            'label' => 'Marque',
                            'placeholder' => 'Entrez la marque',
                        ],
                        'model' => [
                            'label' => 'Modèle',
                            'placeholder' => 'Entrez le modèle',
                        ],
                        'license_plate_number' => [
                            'label' => 'Numéro de plaque',
                            'placeholder' => 'Entrez le numéro de plaque',
                        ],
                        'responsible' => [
                            'label' => 'Responsable',
                            'placeholder' => 'Sélectionner le responsable',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Modifier la ressource',
                    'fields' => [
                        'name' => [
                            'label' => 'Nom',
                            'placeholder' => 'Entrez le nom de la ressource',
                        ],
                        'brand' => [
                            'label' => 'Marque',
                            'placeholder' => 'Entrez la marque',
                        ],
                        'model' => [
                            'label' => 'Modèle',
                            'placeholder' => 'Entrez le modèle',
                        ],
                        'license_plate_number' => [
                            'label' => 'Numéro de plaque',
                            'placeholder' => 'Entrez le numéro de plaque',
                        ],
                        'responsible' => [
                            'label' => 'Responsable',
                            'placeholder' => 'Sélectionner le responsable',
                        ],
                    ],
                ],
            ],
            'frontEndRoutes' => [
                'index' => 'resources',
                'create' => 'resources/create',
            ],
        ],
        'components' => [
            'modals' => [
                'event_modal' => [
                    'new_event' => 'Nouvel événement',
                    'title' => [
                        'label' => 'Titre',
                        'placeholder' => "Titre de l'événement",
                    ],
                    'place' => [
                        'label' => 'Lieu',
                        'placeholder' => "Lieu de l'événement",
                    ],
                    'description' => [
                        'label' => 'Description',
                    ],
                    'start_date' => [
                        'label' => 'Date de début',
                        'placeholder' => 'Choisir une date',
                    ],
                    'end_date' => [
                        'label' => 'Date de fin',
                        'placeholder' => 'Choisir une date',
                    ],
                    'all_day' => 'Toute la journée',
                    'invite_employee' => [
                        'placeholder' => 'Inviter un employé',
                    ],
                    'invite_resident' => [
                        'placeholder' => 'Inviter un résident',
                    ],
                    'invite_client' => [
                        'placeholder' => 'Inviter un client',
                    ],
                    'select_client' => [
                        'placeholder' => 'Sélectionner un client',
                    ],
                    'add_resource' => [
                        'label' => 'Ajouter une ressource',
                        'placeholder' => 'Sélectionner une ressource',
                    ],
                    'buttons' => [
                        'cancel' => 'Annuler',
                        'save' => 'Enregistrer',
                        'delete' => 'Supprimer',
                    ],
                    'employee' => [
                        'edit' => "L'employé d'un événement planifié ne peut pas être modifié.",
                        'add' => 'Ajouter un employé',
                        'placeholder' => 'Employé',
                        'additional' => 'Employé supplémentaire',
                        'additional_placeholder' => 'Sélectionner un employé supplémentaire',
                        'add_more' => 'Ajouter un autre employé',
                    ],
                    'validation' => [
                        'title_and_date_required' => 'Le titre et la date sont obligatoires.',
                        'date_range' => 'La date de début doit être avant la date de fin.',
                        'user_required' => 'Au moins un utilisateur doit être sélectionné pour l’événement.',
                    ],
                    'delete_confirmation' => [
                        'title' => 'Supprimer l’événement',
                        'message' => "Voulez-vous vraiment supprimer cet événement ? Cette action est irréversible.",
                        'confirm' => 'Supprimer',
                        'cancel' => 'Annuler',
                    ],
                    'recurring' => [
                        'delete' => [
                            'title' => 'Supprimer un événement récurrent',
                            'message' => "Cet événement fait partie d’une série. Que souhaitez-vous faire ?",
                        ],
                        'update' => [
                            'title' => 'Mettre à jour un événement récurrent',
                            'message' => "Cet événement fait partie d’une série. Comment souhaitez-vous le mettre à jour ?",
                        ],
                        'options' => [
                            'this_event' => [
                                'delete' => [
                                    'label' => 'Supprimer uniquement cet événement',
                                    'description' => 'Supprime seulement cet événement spécifique de la série',
                                ],
                                'update' => [
                                    'label' => 'Mettre à jour uniquement cet événement',
                                    'description' => 'Modifie seulement cet événement (il sera séparé de la série)',
                                ],
                            ],
                            'future_events' => [
                                'delete' => [
                                    'label' => 'Supprimer cet événement et tous les suivants',
                                    'description' => 'Supprime cet événement et tous les événements subséquents de la série',
                                ],
                                'update' => [
                                    'label' => 'Mettre à jour cet événement et tous les suivants',
                                    'description' => 'Applique les modifications à cet événement et à tous les suivants',
                                ],
                            ],
                            'all_events' => [
                                'delete' => [
                                    'label' => 'Supprimer toute la série d’événements',
                                    'description' => 'Supprime complètement toute la série d’événements',
                                ],
                                'update' => [
                                    'label' => 'Mettre à jour toute la série d’événements',
                                    'description' => 'Applique les modifications à tous les événements de la série',
                                ],
                            ],
                        ],
                        'buttons' => [
                            'confirm' => 'Confirmer',
                            'cancel' => 'Annuler',
                        ],
                    ],
                ],
            ],
            'shared' => [
                'primaryCalendar' => [
                    'month' => 'Mois',
                    'week' => 'Semaine',
                    'businessWeek' => 'Semaine ouvrable',
                    'today' => "Aujourd’hui",
                    'users' => 'Utilisateurs',
                    'locale' => [
                        'weekdays' => [
                            'sun' => 'Dim',
                            'mon' => 'Lun',
                            'tue' => 'Mar',
                            'wed' => 'Mer',
                            'thu' => 'Jeu',
                            'fri' => 'Ven',
                            'sat' => 'Sam',
                        ],
                        'months' => [
                            'jan' => 'Janvier',
                            'feb' => 'Février',
                            'mar' => 'Mars',
                            'apr' => 'Avril',
                            'may' => 'Mai',
                            'jun' => 'Juin',
                            'jul' => 'Juillet',
                            'aug' => 'Août',
                            'sep' => 'Septembre',
                            'oct' => 'Octobre',
                            'nov' => 'Novembre',
                            'dec' => 'Décembre',
                        ],
                    ],
                    'viewAll' => 'Voir tous les événements',
                    'close' => 'Fermer',
                    'manage' => 'Gérer le calendrier',
                ],
                'userSidebar' => [
                    'userProfile' => "Profil de l'utilisateur",
                    'noUserSelected' => "Aucun utilisateur sélectionné",
                    'viewProfile' => 'Voir le profil',
                ],
                'manageCalendarSidebar' => [
                    'title' => 'Gérer le calendrier',
                    'description' => "Glissez-déposez les utilisateurs pour les réorganiser. Utilisez l’icône œil pour afficher ou masquer les utilisateurs du calendrier.",
                    'otherUsers' => 'Autres utilisateurs',
                    'save' => 'Enregistrer les modifications',
                    'colorDisabledForTeamMember' => "Modification de couleur désactivée – Cet utilisateur suit la couleur du responsable (:leader)",
                ],
            ],
        ],
        'audits' => [
            'title' => 'Audits d\'événements',
            'description' => 'Afficher et suivre tous les changements apportés aux événements',
            'pages' => [
                'index' => [
                    'title' => 'Audits d\'événements',
                    'grid' => [
                        'event_type' => 'Type',
                        'event_title' => 'Événement',
                        'values' => 'Valeurs',
                        'user' => 'Utilisateur',
                        'date' => 'Date',
                        'actions' => 'Actions'
                    ],
                    'event_types' => [
                        'created' => 'Créé',
                        'updated' => 'Mis à jour',
                        'deleted' => 'Supprimé'
                    ],
                    'buttons' => [
                        'view_details' => 'Voir les détails',
                        'close' => 'Fermer',
                        'export_csv' => 'Exporter en CSV',
                        'export_details_csv' => 'Exporter les détails en CSV'
                    ],
                    'messages' => [
                        'no_data_to_export' => 'Aucune donnée disponible pour l\'exportation',
                        'export_success' => 'Données exportées avec succès',
                        'export_error' => 'Une erreur est survenue lors de l\'exportation'
                    ],
                    'export' => [
                        'progress_title' => 'Exportation des données',
                        'progress_text' => 'Chargement de la page',
                        'starting' => 'Démarrage de l\'exportation...',
                        'loading_page' => 'Chargement de la page {page}...',
                        'generating_csv' => 'Génération du fichier CSV...',
                        'completed' => 'Exportation terminée avec succès!',
                        'error' => 'Une erreur est survenue lors de l\'exportation'
                    ],
                    'modal' => [
                        'title' => 'Détails de l\'audit',
                        'event' => 'Événement',
                        'type' => 'Type',
                        'user' => 'Utilisateur',
                        'date' => 'Date',
                        'old_values' => 'Anciennes valeurs',
                        'new_values' => 'Nouvelles valeurs',
                        'all_day' => 'All day',
                        'company' => 'Company',
                        'created_at' => 'Created At',
                        'description' => 'Description',
                        'end_date' => 'End Date',
                        'is_recurring' => 'Is Recurring',
                        'original_start_date' => 'Original Start Date',
                        'place' => 'Place',
                        'recurring_type' => 'Recurring Type',
                        'start_date' => 'Start Date',
                        'title' => 'Title',
                        'updated_at' => 'Updated At',
                        'yes' => 'Yes',
                        'no' => 'No',
                        'unknown' => 'Unknown'
                    ]
                ]
            ]
        ],
    ],
];
