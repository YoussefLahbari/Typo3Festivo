<?php

defined('TYPO3') or die;

(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Festivo',
        'Showcase',
        'Showcase',
        'festivo_showcase',
        'Festivo',
        'Events Showcase',
        'FILE:EXT:festivo/Configuration/FlexForms/flexform_showcase.xml'
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Festivo',
        'AjaxSearch',
        'Ajax Search',
        'festivo_ajaxsearch',
        'Festivo'
    );

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['festivo_showcase'] = 'pi_flexform';
    $flexFormSettings = ['showcase'];

    foreach ($flexFormSettings as $item) {

        $GLOBALS['TCA']['tt_content']['types']['festivo_' . $item]['showitem'] = '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                pi_flexform,
        ';
    }
})();
