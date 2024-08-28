<?php

declare(strict_types=1);

namespace Hellsfoul\Myfirstgame\Domain\Model;


/**
 * This file is part of the "My First Game" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 hellsfoul
 */

/**
 * Player
 */
class Player extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * nickname
     *
     * @var string
     */
    protected $nickname = '';

    /**
     * Returns the nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Sets the nickname
     *
     * @param string $nickname
     * @return void
     */
    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;
    }
}
