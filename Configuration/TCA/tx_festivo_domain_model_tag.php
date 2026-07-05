<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_tag',
        'label' => 'title',
        'typeicon_column' => 'title',
        'typeicon_classes' => [
            'music' => 'festivo_music',
            'food' => 'festivo_food',
            'art' => 'festivo_art',
            'default' => 'festivo_default',
        ],
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title',
    ],
    'interface' => [
        'showRecordFieldList' => 'title',
    ],
    'types' => [
        '1' => ['showitem' => 'title'],
    ],
    'columns' => [
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_tag.title',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'Music',
                        'value' => 'music',
                        'icon' => 'festivo_music',
                    ],
                    [
                        'label' => 'Food',
                        'value' => 'food',
                        'icon' => 'festivo_food',
                    ],
                    [
                        'label' => 'Art',
                        'value' => 'art',
                        'icon' => 'festivo_art',
                    ]
                ],
                'fieldWizard' => [
                    'selectIcons' => [
                        'disabled' => false,
                    ],
                ],
            ],
        ],
    ],
];
