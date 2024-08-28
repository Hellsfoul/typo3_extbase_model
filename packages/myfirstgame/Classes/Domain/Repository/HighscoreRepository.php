<?php

declare(strict_types=1);

namespace Hellsfoul\Myfirstgame\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * This file is part of the "My First Game" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 hellsfoul
 */

/**
 * The repository for Highscores
 */
class HighscoreRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    // sorts the data from database, before sending it to list
    protected $defaultOrderings = [
        'points' => QueryInterface::ORDER_DESCENDING
    ];


    // methods like add are already part of parent class "Repository"
}
