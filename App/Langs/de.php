<?php

return [
    'menu' => [
        'home' => 'Startseite',
        'companies' => 'Unternehmen',
        'collaborators' => 'Mitarbeitende',
        'calendar' => 'Kalender',
        'resources' => 'Ressourcen',
    ],
    'navbar' => [
        'profile' => 'Profil',
        'logout' => 'Abmelden',
    ],
    'filters' => [
        'title' => 'Filter',
        'clear' => 'Filter zurücksetzen',
        'search' => [
            'label' => 'Suche',
            'placeholder' => 'Nach Namen suchen',
        ],
        'search_event' => [
            'label' => 'Suche',
            'placeholder' => 'Nach Namen, Veranstaltungstitel oder Werten suchen',
        ],
        'user' => [
            'placeholder' => 'Benutzer auswählen',
        ],
        'event_type' => [
            'placeholder' => 'Veranstaltungstyp auswählen',
        ],
        'date_start' => [
            'placeholder' => 'Startdatum',
        ],
        'date_end' => [
            'placeholder' => 'Enddatum',
        ]
    ],
    'buttons' => [
        'create' => 'Erstellen',
        'edit' => 'Bearbeiten',
        'delete' => 'Löschen',
        'save' => 'Speichern',
        'cancel' => 'Abbrechen',
        'yes' => 'Ja',
        'no' => 'Nein',
        'back' => 'Zurück',
        'close' => 'Schließen',
    ],
    'selects' => [
        'select_an_option' => 'Eine Option auswählen',
    ],
    'validations' => [
        'required' => 'Dieses Feld ist erforderlich.',
        'min' => 'Dieses Feld muss mindestens :min Zeichen enthalten.',
        'max' => 'Dieses Feld darf maximal :max Zeichen enthalten.',
        'email' => 'Dieses Feld muss eine gültige E-Mail-Adresse sein.',
        'invalid_date' => 'Ungültiges Datumsformat.',
        'login_error' => 'E-Mail oder Passwort ist falsch.',
        'something_went_wrong' => 'Etwas ist schief gelaufen. Bitte versuchen Sie es später erneut.',
        'email_not_found' => 'E-Mail nicht gefunden.',
    ],
    'messages' => [
        'create_success' => 'Datensatz wurde erfolgreich erstellt.',
        'update_success' => 'Datensatz wurde erfolgreich aktualisiert.',
        'delete_success' => 'Datensatz wurde erfolgreich gelöscht.',
        'delete_confirm' => 'Sind Sie sicher, dass Sie diesen Datensatz löschen möchten?',
        'error' => 'Beim Verarbeiten der Anfrage ist ein Fehler aufgetreten.',
        'login_success' => 'Erfolgreich angemeldet.',
        'unauthorized_access' => 'Unbefugter Zugriff. Bitte melden Sie sich an.',
    ],
    'modals' => [
        'success' => [
            'title' => 'Erfolg',
            'message' => 'Der Datensatz wurde erfolgreich erstellt.',
        ],
        'delete' => [
            'title' => 'Datensatz löschen',
            'message' => 'Sind Sie sicher, dass Sie diesen Datensatz löschen möchten?',
        ],
        'error' => [
            'title' => 'Fehler',
            'message' => 'Beim Verarbeiten der Anfrage ist ein Fehler aufgetreten.',
        ],
        'buttons' => [
            'yes' => 'Ja',
            'no' => 'Nein',
            'ok' => 'OK',
        ],
    ],
    'celebrants' => [
        'birthday_today' => '🎉 Heute Geburtstag',
        'birthday_on' => '🎉 Geburtstag am',
    ],
    'modules' => [
        'login' => [
            'title' => 'Willkommen',
            'description' => 'Geben Sie Ihre Zugangsdaten ein, um auf das System zuzugreifen.',
            'fields' => [
                'email' => [
                    'label' => 'E-Mail',
                    'placeholder' => 'Geben Sie Ihre E-Mail ein',
                ],
                'password' => [
                    'label' => 'Passwort',
                    'placeholder' => 'Geben Sie Ihr Passwort ein',
                ],
                'button' => 'Anmelden',
                'forgot_password' => 'Passwort vergessen?',
            ],
        ],
        'resetPassoword' => [
            'title' => 'Passwort zurücksetzen',
            'description' => 'Geben Sie Ihre E-Mail-Adresse ein, um Ihr Passwort zurückzusetzen.',
            'reset_password_success' => 'Anweisungen zum Zurücksetzen des Passworts wurden an Ihre E-Mail gesendet. Bitte überprüfen Sie Ihr Postfach und folgen Sie den Schritten, um Ihr Passwort zurückzusetzen.',
            'fields' => [
                'email' => [
                    'label' => 'E-Mail',
                    'placeholder' => 'Geben Sie Ihre E-Mail ein',
                ],
                'button' => 'Passwort zurücksetzen',
                'back_to_login' => 'Zurück zur Anmeldung',
            ],
            'sendEmail' => [
                'title' => 'Passwort zurücksetzen',
                'description' => 'Wir haben eine Anfrage zum Zurücksetzen Ihres Passworts erhalten. Ein temporäres Passwort wurde erstellt. Bitte ändern Sie es nach dem Einloggen. Wenn Sie diese Anfrage nicht gestellt haben, ignorieren Sie diese Nachricht.',
            ],
        ],
        'companies' => [
            'title' => 'Unternehmen',
            'description' => 'Beschreibung der Unternehmen',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'country' => 'Land',
                        'active' => 'Aktiv',
                        'actions' => 'Aktionen',
                    ],
                ],
                'create' => [
                    'title' => 'Unternehmen erstellen',
                    'fields' => [
                        'company' => [
                            'label' => 'Unternehmensname',
                            'placeholder' => 'Geben Sie den Unternehmensnamen ein',
                        ],
                        'country_id' => [
                            'label' => 'Land',
                            'placeholder' => 'Land auswählen',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Unternehmen bearbeiten',
                ],
            ],
            'frontEndRoutes' => [
                'index' => 'companies',
                'create' => 'companies/create',
            ],
        ],
        'collaborators' => [
            'title' => 'Mitarbeitende',
            'description' => 'Beschreibung der Mitarbeitenden',
            'fields' => [
                'name' => 'Name',
                'email' => 'E-Mail',
                'company_id' => 'Unternehmen',
                'active' => 'Aktiv',
            ],
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'function' => 'Funktion',
                        'email' => 'E-Mail',
                        'profile' => 'Profil',
                        'company' => 'Unternehmen',
                        'active' => 'Aktiv',
                        'actions' => 'Aktionen',
                    ],
                ],
                'create' => [
                    'title' => 'Mitarbeitenden erstellen',
                    'fields' => [
                        'name' => [
                            'label' => 'Vollständiger Name',
                            'placeholder' => 'Geben Sie den vollständigen Namen ein',
                        ],
                        'email' => [
                            'label' => 'E-Mail',
                            'placeholder' => 'Geben Sie die E-Mail ein',
                        ],
                        'password' => [
                            'label' => 'Passwort',
                            'placeholder' => 'Geben Sie das Passwort ein',
                        ],
                        'gender' => [
                            'label' => 'Geschlecht',
                            'placeholder' => 'Geschlecht auswählen',
                        ],
                        'company_id' => [
                            'label' => 'Unternehmen',
                            'placeholder' => 'Unternehmen auswählen',
                        ],
                        'birthdate' => [
                            'label' => 'Geburtsdatum',
                            'placeholder' => 'Geburtsdatum eingeben',
                        ],
                        'function' => [
                            'label' => 'Funktion',
                            'placeholder' => 'Geben Sie die Funktion ein',
                        ],
                        'nationality' => [
                            'label' => 'Nationalität',
                            'placeholder' => 'Nationalität auswählen',
                        ],
                        'profile' => [
                            'label' => 'Profil',
                            'placeholder' => 'Profil auswählen',
                        ],
                        'head_of_teams_id' => [
                            'label' => 'Teamleiter/in',
                            'placeholder' => 'Teamleiter/in auswählen',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Mitarbeitenden bearbeiten',
                ],
            ],
            'information' => [
                'title' => 'Information',
                'description' => 'Beschreibung der Information',
            ],
            'settings' => [
                'title' => 'Einstellungen',
                'description' => 'Beschreibung der Einstellungen',
                'languages' => [
                    'title' => 'Sprachauswahl',
                ],
            ],
            'welcome_email' => [
                'title' => 'Willkommen im Team!',
                'email' => 'E-Mail',
                'password' => 'Passwort',
                'hi' => 'Hi',
                'button_go' => 'Zum Planungssystem',
                'description' => "Willkommen an Bord!
Ihr Konto wurde erfolgreich im Planungssystem angelegt.
Sie können sich jetzt anmelden und die Plattform erkunden.
Dies sind Ihre Zugangsdaten:",
            ],
        ],
        'calendar' => [
            'title' => 'Kalender',
            'description' => 'Beschreibung des Kalenders',
            'event_audit' => [
                'message' => '<em>:user</em> hat die Veranstaltung am :date :action',
                'action' => [
                    'created' => 'erstellt',
                    'updated' => 'aktualisiert',
                    'deleted' => 'gelöscht',
                ],
            ],
            'fields' => [
                'name' => 'Name',
                'description' => 'Beschreibung',
                'active' => 'Aktiv',
            ],
            'success' => [
                'event_created' => 'Veranstaltung wurde erfolgreich erstellt.',
                'event_updated' => 'Veranstaltung wurde erfolgreich aktualisiert.',
                'users_order_updated' => 'Nutzerreihenfolge wurde erfolgreich aktualisiert.',
                'event_deleted' => 'Veranstaltung wurde erfolgreich gelöscht.',
                'event_created_other' => '{name} hat eine Veranstaltung erstellt.',
                'event_updated_other' => '{name} hat eine Veranstaltung aktualisiert.',
                'event_deleted_other' => '{name} hat eine Veranstaltung gelöscht.',
            ],
            'errors' => [
                'company_not_found' => 'Unternehmen nicht gefunden.',
                'event_users_required' => 'Veranstaltungsnutzer sind erforderlich.',
                'event_required_fields' => 'Titel, Start- und Enddatum sind erforderlich.',
                'event_start_date_must_be_before_end_date' => 'Das Startdatum muss vor dem Enddatum liegen.',
                'event_not_found' => 'Veranstaltung nicht gefunden.',
                'event_creation_failed' => 'Veranstaltungserstellung fehlgeschlagen.',
                'event_update_failed' => 'Veranstaltungsaktualisierung fehlgeschlagen.',
                'event_dates_invalid' => 'Das Startdatum muss vor dem Enddatum liegen.',
                'users_order_required' => 'Nutzerreihenfolge ist erforderlich.',
                'users_order_invalid' => 'Nutzerreihenfolge ist ungültig.',
                'users_order_failed' => 'Nutzerreihenfolge konnte nicht aktualisiert werden.',
                'pusher_event_failed' => 'Pusher-Ereignis konnte nicht ausgelöst werden.',
                'event_delete_failed' => 'Veranstaltung konnte nicht gelöscht werden.',
            ],
        ],
        'clients' => [
            'title' => 'Kunden',
            'description' => 'Beschreibung der Kunden',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'company' => 'Unternehmen',
                        'email' => 'E-Mail',
                        'phone' => 'Telefon',
                        'address' => 'Adresse',
                        'actions' => 'Aktionen',
                    ],
                ],
                'create' => [
                    'title' => 'Kunden erstellen',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Kundennamen eingeben',
                        ],
                        'company_name' => [
                            'label' => 'Marke',
                            'placeholder' => 'Unternehmensname eingeben',
                        ],
                        'email' => [
                            'label' => 'E-Mail',
                            'placeholder' => 'E-Mail eingeben',
                        ],
                        'phone' => [
                            'label' => 'Telefon',
                            'placeholder' => 'Telefonnummer eingeben',
                        ],
                        'address' => [
                            'label' => 'Adresse',
                            'placeholder' => 'Adresse eingeben',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Kunden bearbeiten',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Kundennamen eingeben',
                        ],
                        'company_name' => [
                            'label' => 'Marke',
                            'placeholder' => 'Unternehmensname eingeben',
                        ],
                        'email' => [
                            'label' => 'E-Mail',
                            'placeholder' => 'E-Mail eingeben',
                        ],
                        'phone' => [
                            'label' => 'Telefon',
                            'placeholder' => 'Telefonnummer eingeben',
                        ],
                        'address' => [
                            'label' => 'Adresse',
                            'placeholder' => 'Adresse eingeben',
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
            'title' => 'Ressourcen',
            'description' => 'Beschreibung der Ressourcen',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'brand' => 'Marke',
                        'model' => 'Modell',
                        'license_plate_number' => 'Kennzeichen',
                        'actions' => 'Aktionen',
                    ],
                ],
                'create' => [
                    'title' => 'Ressource erstellen',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Ressourcennamen eingeben',
                        ],
                        'brand' => [
                            'label' => 'Marke',
                            'placeholder' => 'Marke eingeben',
                        ],
                        'model' => [
                            'label' => 'Modell',
                            'placeholder' => 'Modell eingeben',
                        ],
                        'license_plate_number' => [
                            'label' => 'Kennzeichen',
                            'placeholder' => 'Kennzeichen eingeben',
                        ],
                        'responsible' => [
                            'label' => 'Verantwortlicher',
                            'placeholder' => 'Verantwortlichen auswählen',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Ressource bearbeiten',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Ressourcennamen eingeben',
                        ],
                        'brand' => [
                            'label' => 'Marke',
                            'placeholder' => 'Marke eingeben',
                        ],
                        'model' => [
                            'label' => 'Modell',
                            'placeholder' => 'Modell eingeben',
                        ],
                        'license_plate_number' => [
                            'label' => 'Kennzeichen',
                            'placeholder' => 'Kennzeichen eingeben',
                        ],
                        'responsible' => [
                            'label' => 'Verantwortlicher',
                            'placeholder' => 'Verantwortlichen auswählen',
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
                    'new_event' => 'Neue Veranstaltung',
                    'title' => [
                        'label' => 'Titel',
                        'placeholder' => 'Veranstaltungstitel',
                    ],
                    'place' => [
                        'label' => 'Ort',
                        'placeholder' => 'Veranstaltungsort',
                    ],
                    'description' => [
                        'label' => 'Beschreibung',
                    ],
                    'start_date' => [
                        'label' => 'Startdatum',
                        'placeholder' => 'Datum auswählen',
                    ],
                    'end_date' => [
                        'label' => 'Enddatum',
                        'placeholder' => 'Datum auswählen',
                    ],
                    'all_day' => 'Ganzer Tag',
                    'invite_employee' => [
                        'placeholder' => 'Mitarbeitenden einladen',
                    ],
                    'invite_resident' => [
                        'placeholder' => 'Bewohner/in einladen',
                    ],
                    'invite_client' => [
                        'placeholder' => 'Kunden einladen',
                    ],
                    'select_client' => [
                        'placeholder' => 'Kunden auswählen',
                    ],
                    'add_resource' => [
                        'label' => 'Ressource hinzufügen',
                        'placeholder' => 'Ressource auswählen',
                    ],
                    'buttons' => [
                        'cancel' => 'Abbrechen',
                        'save' => 'Speichern',
                        'delete' => 'Löschen',
                    ],
                    'employee' => [
                        'edit' => 'Der Mitarbeitende einer geplanten Veranstaltung kann nicht geändert werden.',
                        'add' => 'Mitarbeitenden hinzufügen',
                        'placeholder' => 'Mitarbeitende/r',
                        'additional' => 'Zusätzliche Mitarbeitende',
                        'additional_placeholder' => 'Zusätzliche Mitarbeitende auswählen',
                        'add_more' => 'Weiteren Mitarbeitenden hinzufügen',
                    ],
                    'validation' => [
                        'title_and_date_required' => 'Titel und Datum sind erforderlich.',
                        'date_range' => 'Das Startdatum muss vor dem Enddatum liegen.',
                        'user_required' => 'Mindestens ein Nutzer muss für die Veranstaltung ausgewählt werden.',
                    ],
                    'delete_confirmation' => [
                        'title' => 'Veranstaltung löschen',
                        'message' => 'Sind Sie sicher, dass Sie diese Veranstaltung löschen möchten? Diese Aktion kann nicht rückgängig gemacht werden.',
                        'confirm' => 'Löschen',
                        'cancel' => 'Abbrechen',
                    ],
                    'recurring' => [
                        'delete' => [
                            'title' => 'Wiederkehrende Veranstaltung löschen',
                            'message' => 'Diese Veranstaltung ist Teil einer Serie. Was möchten Sie tun?',
                        ],
                        'update' => [
                            'title' => 'Wiederkehrende Veranstaltung aktualisieren',
                            'message' => 'Diese Veranstaltung ist Teil einer Serie. Wie möchten Sie sie aktualisieren?',
                        ],
                        'options' => [
                            'this_event' => [
                                'delete' => [
                                    'label' => 'Nur diese Veranstaltung löschen',
                                    'description' => 'Löscht nur diese spezifische Veranstaltung aus der Serie',
                                ],
                                'update' => [
                                    'label' => 'Nur diese Veranstaltung bearbeiten',
                                    'description' => 'Bearbeitet nur diese Veranstaltung (sie wird von der Serie getrennt)',
                                ],
                            ],
                            'future_events' => [
                                'delete' => [
                                    'label' => 'Diese und alle folgenden Veranstaltungen löschen',
                                    'description' => 'Löscht diese und alle nachfolgenden Veranstaltungen der Serie',
                                ],
                                'update' => [
                                    'label' => 'Diese und alle folgenden Veranstaltungen aktualisieren',
                                    'description' => 'Wendet Änderungen auf diese und alle folgenden Veranstaltungen der Serie an',
                                ],
                            ],
                            'all_events' => [
                                'delete' => [
                                    'label' => 'Ganze Veranstaltungsserie löschen',
                                    'description' => 'Löscht die komplette Veranstaltungsserie',
                                ],
                                'update' => [
                                    'label' => 'Ganze Veranstaltungsserie aktualisieren',
                                    'description' => 'Wendet Änderungen auf alle Veranstaltungen der Serie an',
                                ],
                            ],
                        ],
                        'buttons' => [
                            'confirm' => 'Bestätigen',
                            'cancel' => 'Abbrechen',
                        ],
                    ],
                ],
            ],
            'shared' => [
                'primaryCalendar' => [
                    'month' => 'Monat',
                    'week' => 'Woche',
                    'businessWeek' => 'Werkswoche',
                    'today' => 'Heute',
                    'users' => 'Nutzer',
                    'locale' => [
                        'weekdays' => [
                            'sun' => 'So',
                            'mon' => 'Mo',
                            'tue' => 'Di',
                            'wed' => 'Mi',
                            'thu' => 'Do',
                            'fri' => 'Fr',
                            'sat' => 'Sa',
                        ],
                        'months' => [
                            'jan' => 'Januar',
                            'feb' => 'Februar',
                            'mar' => 'März',
                            'apr' => 'April',
                            'may' => 'Mai',
                            'jun' => 'Juni',
                            'jul' => 'Juli',
                            'aug' => 'August',
                            'sep' => 'September',
                            'oct' => 'Oktober',
                            'nov' => 'November',
                            'dec' => 'Dezember',
                        ],
                    ],
                    'viewAll' => 'Alle Veranstaltungen anzeigen',
                    'close' => 'Schließen',
                    'manage' => 'Kalender verwalten',
                ],
                'userSidebar' => [
                    'userProfile' => 'Nutzerprofil',
                    'noUserSelected' => 'Kein Nutzer ausgewählt',
                    'viewProfile' => 'Profil anzeigen',
                ],
                'manageCalendarSidebar' => [
                    'title' => 'Kalender verwalten',
                    'description' => 'Ziehen Sie Nutzer per Drag-and-Drop, um sie neu anzuordnen. Verwenden Sie das Augensymbol, um Nutzer im Kalender anzuzeigen oder zu verbergen.',
                    'otherUsers' => 'Andere Nutzer',
                    'save' => 'Änderungen speichern',
                    'colorDisabledForTeamMember' => 'Farbänderung deaktiviert – Dieser Nutzer folgt der Farbe der Teamleitung (:leader)',
                ],
            ],
        ],
        'audits' => [
            'title' => 'Ereignis-Audits',
            'description' => 'Alle Änderungen an Ereignissen anzeigen und verfolgen',
            'pages' => [
                'index' => [
                    'title' => 'Ereignis-Audits',
                    'grid' => [
                        'event_type' => 'Typ',
                        'event_title' => 'Ereignis',
                        'values' => 'Werte',
                        'user' => 'Benutzer',
                        'date' => 'Datum',
                        'actions' => 'Aktionen'
                    ],
                    'event_types' => [
                        'created' => 'Erstellt',
                        'updated' => 'Aktualisiert',
                        'deleted' => 'Gelöscht'
                    ],
                    'buttons' => [
                        'view_details' => 'Details anzeigen',
                        'close' => 'Schließen',
                        'export_csv' => 'CSV exportieren',
                        'export_details_csv' => 'Details CSV exportieren'
                    ],
                    'messages' => [
                        'no_data_to_export' => 'Keine Daten zum Exportieren verfügbar',
                        'export_success' => 'Daten erfolgreich exportiert',
                        'export_error' => 'Ein Fehler ist während des Exports aufgetreten'
                    ],
                    'export' => [
                        'progress_title' => 'Daten werden exportiert',
                        'progress_text' => 'Seite wird geladen',
                        'starting' => 'Export wird gestartet...',
                        'loading_page' => 'Seite {page} wird geladen...',
                        'generating_csv' => 'CSV-Datei wird erstellt...',
                        'completed' => 'Export erfolgreich abgeschlossen!',
                        'error' => 'Ein Fehler ist während des Exports aufgetreten'
                    ],
                    'modal' => [
                        'title' => 'Audit-Details',
                        'event' => 'Ereignis',
                        'type' => 'Typ',
                        'user' => 'Benutzer',
                        'date' => 'Datum',
                        'old_values' => 'Alte Werte',
                        'new_values' => 'Neue Werte',
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
