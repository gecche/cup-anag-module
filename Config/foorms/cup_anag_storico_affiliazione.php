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
            'fine' => [],
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
//    'insert' => [
//
//    ],

];
