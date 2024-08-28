<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_myfirstgame_domain_model_highscore', 'EXT:myfirstgame/Resources/Private/Language/locallang_csh_tx_myfirstgame_domain_model_highscore.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_myfirstgame_domain_model_highscore');
})();
