<?php


return [

    'search' => [

    ],
    'list' => [


////        'allowed_actions' => [
////            'csv-export' => true,
////        ],
//
        'actions' => [
            'set' => [
                'allowed_fields' => [
//                    'soggetti_residenti',
                ],
            ],
            //            'csv-export' => [
//                'default' => [
//                    'blacklist' => [
////                        'password'
//                    ],
//                    'whitelist' => [
//                        "codice",
//                        "nome_it",
//
//                ],
//                    'fieldsParams' => [
////                        "istituto|comunenome" => [
////                            'header' => 'Istituto - comune (nome)',
////                            'item' => 'istituto|T_COMUNE_ID',
////                        ],
//                    ],
//                    'separator' => ';',
//                    'endline' => "\n",
//                    'headers' => 'translate',
//                    'decimalFrom' => '.',
//                    'decimalTo' => false,
//                ],
//            ]
//
        ],

        'dependencies' => [
//            'search' => 'search',
        ],

        'pagination' => [
            //'per_page' => 20,
            'pagination_steps' => [10, 20, 50],
        ],

        'fields' => [
            'id' => [],

            'inizio' => [],
            'note' => [],

        ],
        'relations' => [

            'organizzazione' => [
                'fields' => [
                    'denominazione' => [],
                ]
            ],
            'affiliata' => [
                'fields' => [
                    'denominazione' => [],
                ]
            ],
            'sede' => [
                'fields' => [
                    'codice' => [],
                    'nome_it' => [],
                ]
            ],
            'tipologia' => [
                'fields' => [
                    'nome_it' => [],
                ]
            ],
        ],
        'params' => [

        ],
    ],


    'edit' => [
        'actions' => [
            'autocomplete' => [
                'fields' => [
                    'affiliata_id' => [
                        'model' => 'CupAnagAnagrafica',
                        'result_fields' => [
                            'id',
                            'denominazione',
                            'codice_fiscale',
                            'partita_iva',
                        ]
                    ],
                ],
            ],
        ],
        'fields' => [
            'id' => [],

            'organizzazione_id' => [
                'options' => 'relation:organizzazione'
            ],
            'affiliata_id' => [],
            'sede_id' => [

            ],
            'tipologia_id' => [
                'options' => 'relation:tipologia'
            ],
            'inizio' => [],
            'note' => [],
//ALTRE INFO UTILI A UNA CERTA APP (JSON)
            'app_info' => [],

        ],
        'relations' => [

        ],
        'params' => [

        ],
    ],
//    'insert' => [
//
//    ],

];
