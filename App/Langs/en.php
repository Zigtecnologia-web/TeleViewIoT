<?php

return [
    'menu' => [
        'home' => 'Home',
        'companies' => 'Companies',
        'collaborators' => 'Collaborators',
        'calendar' => 'Calendar',
        'resources' => 'Resources',
        'clients' => 'Clients',
        'audits' => 'Audits'
    ],
    'navbar' => [
        'profile' => 'Profile',
        'logout' => 'Logout',
    ],

    'filters' => [
        'title' => 'Filters',
        'clear' => 'Clear Filters',
        'search' => [
            'label' => 'Search',
            'placeholder' => 'Search by name',
        ],
        'search_event' => [
            'label' => 'Search',
            'placeholder' => 'Search by name, event title, or values',
        ],
        'user' => [
            'placeholder' => 'Select User',
        ],
        'event_type' => [
            'placeholder' => 'Select Event Type',
        ],
        'date_start' => [
            'placeholder' => 'Start Date',
        ],
        'date_end' => [
            'placeholder' => 'End Date',
        ]
    ],

    'buttons' => [
        'create' => 'Create',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'cancel' => 'Cancel',
        'yes' => 'Yes',
        'no' => 'No',
        'back' => 'Back',
        'close' => 'Close',
    ],

    'selects' => [
        'select_an_option' => 'Select an option',
    ],

    'validations' => [
        'required' => 'This field is required.',
        'min' => 'This field must be at least :min characters.',
        'max' => 'This field cannot be greater than :max characters.',
        'email' => 'This field must be a valid email address.',
        'invalid_date' => 'Invalid date format.',
        'login_error' => 'Incorrect Email or password.',
        'something_went_wrong' => 'Something went wrong. Please try again later.',
        'email_not_found' => 'Email not found.',
    ],

    'messages' => [
        'create_success' => 'The record was created successfully.',
        'update_success' => 'The record was updated successfully.',
        'delete_success' => 'The record was deleted successfully.',
        'delete_confirm' => 'Are you sure you want to delete this record?',
        'error' => 'An error occurred while processing the request.',
        'error_loading_data' => 'Error loading data',
        'loading' => 'Loading',
        'no_records_found' => 'No records found',
        'login_success' => 'You have successfully logged in.',
        'unauthorized_access' => 'Unauthorized access. Please log in.',
    ],

    'modals' => [
        'success' => [
            'title' => 'Success',
            'message' => 'The record was created successfully.',
        ],
        'delete' => [
            'title' => 'Delete Record',
            'message' => 'Are you sure you want to delete this record?',
        ],
        'error' => [
            'title' => 'Error',
            'message' => 'An error occurred while processing the request.',
        ],
        'buttons' => [
            'yes' => 'Yes',
            'no' => 'No',
            'ok' => 'Ok',
        ],
    ],

    'celebrants' => [
        'birthday_today' => '🎉 Birthday Today',
        'birthday_on' => '🎉 Birthday on',
    ],

    'modules' => [
        'login' => [
            'title' => 'Welcome',
            'description' => 'Enter your credentials to access the system.',
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'placeholder' => 'Enter your email',
                ],
                'password' => [
                    'label' => 'Password',
                    'placeholder' => 'Enter your password',
                ],
                'button' => 'Login',
                'forgot_password' => 'Forgot your password?',
            ],
        ],
        'resetPassoword' => [
            'title' => 'Reset Password',
            'description' => 'Enter your email to reset your password.',
            'reset_password_success' => 'A password reset instructions has been sent to your email address. Please check your email and follow the instructions to reset your password.',
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'placeholder' => 'Enter your email',
                ],
                'button' => 'Reset Password',
                'back_to_login' => 'Back to login',
            ],
            'sendEmail' => [
                'title' => 'Reset Password',
                'description' => 'We have received a password reset request for your account. A new temporary password has been generated for you. Please change your password as soon as you log in. If you did not request this reset, please disregard this message.',
            ],
        ],
        'companies' => [
            'title' => 'Companies',
            'description' => 'Companies description',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'country' => 'Country',
                        'active' => 'Active',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Create Company',
                    'fields' => [
                        'company' => [
                            'label' => 'Company Name',
                            'placeholder' => 'Enter company name',
                        ],
                        'country_id' => [
                            'label' => 'Country',
                            'placeholder' => 'Select Country',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Edit Company',
                ],
            ],
            'frontEndRoutes' => [
                'index' => 'companies',
                'create' => 'companies/create',
            ],
        ],

        'collaborators' => [
            'title' => 'Collaborators',
            'description' => 'Collaborators description',
            'fields' => [
                'name' => 'Name',
                'email' => 'Email',
                'company_id' => 'Company',
                'active' => 'Active',
            ],
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'function' => 'Function',
                        'email' => 'Email',
                        'profile' => 'Profile',
                        'company' => 'Company',
                        'active' => 'Active',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Create Collaborator',
                    'fields' => [
                        'name' => [
                            'label' => 'Full Name',
                            'placeholder' => 'Enter full name',
                        ],
                        'email' => [
                            'label' => 'Email',
                            'placeholder' => 'Enter email',
                        ],
                        'password' => [
                            'label' => 'Password',
                            'placeholder' => 'Enter password',
                        ],
                        'gender' => [
                            'label' => 'Gender',
                            'placeholder' => 'Select gender',
                        ],
                        'company_id' => [
                            'label' => 'Company',
                            'placeholder' => 'Select company',
                        ],
                        'birthdate' => [
                            'label' => 'Birthdate',
                            'placeholder' => 'Enter birthdate',
                        ],
                        'function' => [
                            'label' => 'Function',
                            'placeholder' => 'Enter function',
                        ],
                        'nationality' => [
                            'label' => 'Nationality',
                            'placeholder' => 'Select nationality',
                        ],
                        'profile' => [
                            'label' => 'Profile',
                            'placeholder' => 'Select profile',
                        ],
                        'head_of_teams_id' => [
                            'label' => 'Head of Teams',
                            'placeholder' => 'Select head of teams',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Edit Collaborator',
                ],
            ],
            'information' => [
                'title' => 'Information',
                'description' => 'Information description',
            ],
            'settings' => [
                'title' => 'Settings',
                'description' => 'Settings description',
                'languages' => [
                    'title' => 'Language selection',
                ],
            ],
            'information' => [
                'title' => 'Information',
                'description' => 'Information description',
            ],
            'settings' => [
                'title' => 'Settings',
                'description' => 'Settings description',
                'languages' => [
                    'title' => 'Language selection',
                ],
            ],
            'welcome_email' => [
                'title' => 'Welcome to the team!',
                'email' => 'E-mail',
                'password' => 'Password',
                'hi' => 'Hi',
                'button_go' => 'Go to Planning System',
                'description' => 'Welcome aboard!
                    Your account has been successfully created in Planning System.
                    You can now log in and start exploring the platform.
                    This is your login information:',
            ],
        ],
        'calendar' => [
            'title' => 'Calendar',
            'description' => 'Calendar description',
            'event_audit' => [
                'message' => '<em>:user</em> :action the event on :date',
                'action' => [
                    'created' => 'created',
                    'updated' => 'updated',
                    'deleted' => 'deleted',
                ],
            ],
            'fields' => [
                'name' => 'Name',
                'description' => 'Description',
                'active' => 'Active',
            ],
            'success' => [
                'event_created' => 'Event created successfully.',
                'event_updated' => 'Event updated successfully.',
                'users_order_updated' => 'Users order updated successfully.',
                'event_deleted' => 'Event deleted successfully.',
                'event_created_other' => '{name} created an event.',
                'event_updated_other' => '{name} updated an event.',
                'event_deleted_other' => '{name} deleted an event.',
            ],
            'errors' => [
                'company_not_found' => 'Company not found.',
                'event_users_required' => 'Event users are required.',
                'event_required_fields' => 'Event title, start date, and end date are required.',
                'event_start_date_must_be_before_end_date' => 'Event start date must be before end date.',
                'event_not_found' => 'Event not found.',
                'event_users_required' => 'At least one user must be selected for the event.',
                'event_creation_failed' => 'Event creation failed.',
                'event_update_failed' => 'Event update failed.',
                'event_dates_invalid' => 'Event start date must be before end date.',
                'users_order_required' => 'Users order is required.',
                'users_order_invalid' => 'Users order is invalid.',
                'users_order_failed' => 'Failed to update users order.',
                'pusher_event_failed' => 'Failed to trigger Pusher event.',
                'event_delete_failed' => 'Failed to delete event.',
            ],
        ],
        'clients' => [
            'title' => 'Clients',
            'description' => 'Clients description',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'company' => 'Company',
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'address' => 'Address',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Create Clients',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Enter client name',
                        ],
                        'company_name' => [
                            'label' => 'Brand',
                            'placeholder' => 'Enter company name',
                        ],
                        'email' => [
                            'label' => 'Email',
                            'placeholder' => 'Enter email',
                        ],
                        'phone' => [
                            'label' => 'Phone',
                            'placeholder' => 'Enter phone number',
                        ],
                        'address' => [
                            'label' => 'Address',
                            'placeholder' => 'Enter address',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Edit Clients',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Enter client name',
                        ],
                        'company_name' => [
                            'label' => 'Brand',
                            'placeholder' => 'Enter company name',
                        ],
                        'email' => [
                            'label' => 'Email',
                            'placeholder' => 'Enter email',
                        ],
                        'phone' => [
                            'label' => 'Phone',
                            'placeholder' => 'Enter phone number',
                        ],
                        'address' => [
                            'label' => 'Address',
                            'placeholder' => 'Enter address',
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
            'title' => 'Resources',
            'description' => 'Resources description',
            'pages' => [
                'index' => [
                    'grid' => [
                        'name' => 'Name',
                        'brand' => 'Brand',
                        'model' => 'Model',
                        'license_plate_number' => 'License Plate Number',
                        'actions' => 'Actions',
                    ],
                ],
                'create' => [
                    'title' => 'Create Resource',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Enter resource name',
                        ],
                        'brand' => [
                            'label' => 'Brand',
                            'placeholder' => 'Enter brand',
                        ],
                        'model' => [
                            'label' => 'Model',
                            'placeholder' => 'Enter model',
                        ],
                        'license_plate_number' => [
                            'label' => 'License Plate Number',
                            'placeholder' => 'Enter license plate number',
                        ],
                        'responsible' => [
                            'label' => 'Responsible',
                            'placeholder' => 'Select responsible',
                        ],
                    ],
                ],
                'edit' => [
                    'title' => 'Edit Resource',
                    'fields' => [
                        'name' => [
                            'label' => 'Name',
                            'placeholder' => 'Enter resource name',
                        ],
                        'brand' => [
                            'label' => 'Brand',
                            'placeholder' => 'Enter brand',
                        ],
                        'model' => [
                            'label' => 'Model',
                            'placeholder' => 'Enter model',
                        ],
                        'license_plate_number' => [
                            'label' => 'License Plate Number',
                            'placeholder' => 'Enter license plate number',
                        ],
                        'responsible' => [
                            'label' => 'Responsible',
                            'placeholder' => 'Select responsible',
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
                    'new_event' => 'New Event',
                    'title' => [
                        'label' => 'Title',
                        'placeholder' => 'Event title',
                    ],
                    'place' => [
                        'label' => 'Place',
                        'placeholder' => 'Event location',
                    ],
                    'description' => [
                        'label' => 'Description',
                    ],
                    'start_date' => [
                        'label' => 'Start date',
                        'placeholder' => 'Pick a date',
                    ],
                    'end_date' => [
                        'label' => 'End date',
                        'placeholder' => 'Pick a date',
                    ],
                    'all_day' => 'All day',
                    'invite_employee' => [
                        'placeholder' => 'Invite an employee',
                    ],
                    'invite_resident' => [
                        'placeholder' => 'Invite a resident',
                    ],
                    'invite_client' => [
                        'placeholder' => 'Invite a client',
                    ],
                    'select_client' => [
                        'placeholder' => 'Select a client',
                    ],
                    'add_resource' => [
                        'label' => 'Add a resource',
                        'placeholder' => 'Select a resource',
                    ],
                    'buttons' => [
                        'cancel' => 'Cancel',
                        'save' => 'Save',
                        'delete' => 'Delete',
                    ],
                    'employee' => [
                        'edit' => 'The employee of a scheduled event cannot be changed.',
                        'add' => 'Add an Employee',
                        'placeholder' => 'Employee',
                        'additional' => 'Additional Employee',
                        'additional_placeholder' => 'Select additional employee',
                        'add_more' => 'Add another employee',
                    ],
                    'validation' => [
                        'title_and_date_required' => 'Title and date are required.',
                        'date_range' => 'The start date must be before the end date.',
                        'user_required' => 'At least one user must be selected for the event.',
                    ],
                    'delete_confirmation' => [
                        'title' => 'Delete Event',
                        'message' => 'Are you sure you want to delete this event? This action cannot be undone.',
                        'confirm' => 'Delete',
                        'cancel' => 'Cancel',
                    ],
                    'recurring' => [
                        'delete' => [
                            'title' => 'Delete recurring event',
                            'message' => 'This event is part of a series. What would you like to do?',
                        ],
                        'update' => [
                            'title' => 'Update recurring event',
                            'message' => 'This event is part of a series. How would you like to update it?',
                        ],
                        'options' => [
                            'this_event' => [
                                'delete' => [
                                    'label' => 'Delete only this event',
                                    'description' => 'Removes only this specific event from the series',
                                ],
                                'update' => [
                                    'label' => 'Update only this event',
                                    'description' => 'Modifies only this event (it will be separated from the series)',
                                ],
                            ],
                            'future_events' => [
                                'delete' => [
                                    'label' => 'Delete this and all future events',
                                    'description' => 'Removes this event and all subsequent events from the series',
                                ],
                                'update' => [
                                    'label' => 'Update this and all future events',
                                    'description' => 'Applies changes to this event and all subsequent ones',
                                ],
                            ],
                            'all_events' => [
                                'delete' => [
                                    'label' => 'Delete the entire event series',
                                    'description' => 'Completely removes the entire event series',
                                ],
                                'update' => [
                                    'label' => 'Update the entire event series',
                                    'description' => 'Applies changes to all events in the series',
                                ],
                            ],
                        ],
                        'buttons' => [
                            'confirm' => 'Confirm',
                            'cancel' => 'Cancel',
                        ],
                    ],
                ],
            ],
            'shared' => [
                'primaryCalendar' => [
                    'month' => 'Month',
                    'week' => 'Week',
                    'businessWeek' => 'Business Week',
                    'today' => 'Today',
                    'users' => 'Users',
                    'locale' => [
                        'weekdays' => [
                            'sun' => 'Sun',
                            'mon' => 'Mon',
                            'tue' => 'Tue',
                            'wed' => 'Wed',
                            'thu' => 'Thu',
                            'fri' => 'Fri',
                            'sat' => 'Sat',
                        ],
                        'months' => [
                            'jan' => 'January',
                            'feb' => 'February',
                            'mar' => 'March',
                            'apr' => 'April',
                            'may' => 'May',
                            'jun' => 'June',
                            'jul' => 'July',
                            'aug' => 'August',
                            'sep' => 'September',
                            'oct' => 'October',
                            'nov' => 'November',
                            'dec' => 'December',
                        ],
                    ],
                    'viewAll' => 'View All Events',
                    'close' => 'Close',
                    'manage' => 'Manage Calendar',
                ],
                'userSidebar' => [
                    'userProfile' => 'User Profile',
                    'noUserSelected' => 'No user selected',
                    'viewProfile' => 'View Profile',
                ],
                'manageCalendarSidebar' => [
                    'title' => 'Manage Calendar',
                    'description' => 'Drag and drop users to reorder them. Use the eye icon to show or hide users from the calendar.',
                    'otherUsers' => 'Other Users',
                    'save' => 'Save Changes',
                    'colorDisabledForTeamMember' => 'Color change disabled - This user follows the leader\'s color (:leader)',
                ],
            ],
        ],
        'audits' => [
            'title' => 'Event Audits',
            'description' => 'View and track all changes made to events',
            'pages' => [
                'index' => [
                    'title' => 'Event Audits',
                    'grid' => [
                        'event_type' => 'Type',
                        'event_title' => 'Event',
                        'values' => 'Values',
                        'user' => 'User',
                        'date' => 'Date',
                        'actions' => 'Actions'
                    ],
                    'event_types' => [
                        'created' => 'Created',
                        'updated' => 'Updated',
                        'deleted' => 'Deleted'
                    ],
                    'buttons' => [
                        'view_details' => 'View Details',
                        'close' => 'Close',
                        'export_csv' => 'Export CSV',
                        'export_details_csv' => 'Export Details CSV'
                    ],
                    'messages' => [
                        'no_data_to_export' => 'No data available to export',
                        'export_success' => 'Data exported successfully',
                        'export_error' => 'Error occurred during export'
                    ],
                    'export' => [
                        'progress_title' => 'Exporting Data',
                        'progress_text' => 'Loading page',
                        'starting' => 'Starting export...',
                        'loading_page' => 'Loading page {page}...',
                        'generating_csv' => 'Generating CSV file...',
                        'completed' => 'Export completed successfully!',
                        'error' => 'An error occurred during export'
                    ],
                    'modal' => [
                        'title' => 'Audit Details',
                        'event' => 'Event',
                        'type' => 'Type',
                        'user' => 'User',
                        'date' => 'Date',
                        'old_values' => 'Old Values',
                        'new_values' => 'New Values',
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
