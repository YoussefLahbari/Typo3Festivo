<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event',
        'label' => 'title',
        'iconfile' => 'EXT:festivo/Resources/Public/Icons/showcase.svg',
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
        'showRecordFieldList' => 'hidden, title',
    ],
    'types' => [
        '1' => ['showitem' => 'hidden, archived, title, subtitle, event_date, event_location, event_price, tag, media'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],

        'archived' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.archived',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],

        'title' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'subtitle' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.subtitle',
            'config' => [
                'type' => 'text',
            ],
        ],
        'event_date' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.event_date',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'dbType' => 'datetime',
            ],
        ],
        'event_location' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.event_location',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'event_price' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.event_price',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'tag' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:festivo/Resources/Private/Language/locallang_db.xlf:tx_festivo_domain_model_event.tag',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_festivo_domain_model_tag',
                'MM' => 'tx_festivo_domain_model_event_tag_mm',
                'MM_hasUidField' => true,
                'foreign_table_where' => 'ORDER BY tx_festivo_domain_model_tag.sorting ASC',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 1,
            ],
        ],
        'media' => [
            'exclude' => 1,
            'label' => 'Media',
            'config' => [
                'type' => 'file',
                'allowed' => 'jpg,jpeg,png,svg,webp',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'media',
                    'tablenames' => 'tx_festivo_domain_model_event',
                ],
                'minItems' => 1,
                'maxItems' => 1,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references.addFileReference'
                ],
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '--palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\FileType::IMAGE->value => [
                            'showitem' => '--palette--;;filePalette'
                        ],
                    ],
                ],
            ]
        ],
        'tt_content' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ]
];
