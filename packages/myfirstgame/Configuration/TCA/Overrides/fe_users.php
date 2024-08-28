<?php
defined('TYPO3') || die();

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
    // no type field defined, so we define it here. This will only happen the first time the extension is installed!!
    $GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
    $tempColumnstx_myfirstgame_fe_users = [];
    $tempColumnstx_myfirstgame_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = [
        'exclude' => true,
        'label' => 'LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:tx_myfirstgame.tx_extbase_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', ''],
                ['Player', 'Tx_Myfirstgame_Player']
            ],
            'default' => 'Tx_Myfirstgame_Player',
            'size' => 1,
            'maxitems' => 1,
        ]
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_myfirstgame_fe_users);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    $GLOBALS['TCA']['fe_users']['ctrl']['type'],
    '',
    'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

$tmp_myfirstgame_columns = [

    'nickname' => [
        'exclude' => true,
        'label' => 'LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:tx_myfirstgame_domain_model_player.nickname',
        'description' => 'LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:tx_myfirstgame_domain_model_player.nickname.description',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'eval' => 'trim',
            'default' => ''
        ],
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tmp_myfirstgame_columns);

// inherit and extend the show items from the parent class
if (isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
    $GLOBALS['TCA']['fe_users']['types']['Tx_Myfirstgame_Player']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif (is_array($GLOBALS['TCA']['fe_users']['types'])) {
    // use first entry in types array
    $fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
    $GLOBALS['TCA']['fe_users']['types']['Tx_Myfirstgame_Player']['showitem'] = $fe_users_type_definition['showitem'];
} else {
    $GLOBALS['TCA']['fe_users']['types']['Tx_Myfirstgame_Player']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_Myfirstgame_Player']['showitem'] .= ',--div--;LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:tx_myfirstgame_domain_model_player,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Myfirstgame_Player']['showitem'] .= 'nickname';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = [
    'LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Myfirstgame_Player',
    'Tx_Myfirstgame_Player'
];
