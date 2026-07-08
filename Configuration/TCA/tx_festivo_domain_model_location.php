<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_location',
        'label' => 'title',
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
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_location.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required',
            ],
       ],
    ],
];
