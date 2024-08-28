<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Myfirstgame',
        'Highscore',
        [
            \Hellsfoul\Myfirstgame\Controller\HighscoreController::class => 'list, create, new, edit, update, delete, show'
        ],
        // non-cacheable actions
        [
            \Hellsfoul\Myfirstgame\Controller\HighscoreController::class => 'list, create, new, edit, update, delete, show'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    highscore {
                        iconIdentifier = myfirstgame-plugin-highscore
                        title = LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:tx_myfirstgame_highscore.name
                        description = LLL:EXT:myfirstgame/Resources/Private/Language/locallang_db.xlf:tx_myfirstgame_highscore.description
                        tt_content_defValues {
                            CType = list
                            list_type = myfirstgame_highscore
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
