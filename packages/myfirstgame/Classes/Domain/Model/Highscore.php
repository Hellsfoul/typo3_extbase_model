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
 * Highscore
 */
class Highscore extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * points
     *
     * @var string
     */
    protected $points = '';

    /**
     * player
     *
     * @var \Hellsfoul\Myfirstgame\Domain\Model\Player
     */
    protected $player = null;

    /**
     * Returns the player
     *
     * @return \Hellsfoul\Myfirstgame\Domain\Model\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Sets the player
     *
     * @param \Hellsfoul\Myfirstgame\Domain\Model\Player $player
     * @return void
     */
    public function setPlayer(\Hellsfoul\Myfirstgame\Domain\Model\Player $player)
    {
        $this->player = $player;
    }

    /**
     * Returns the points
     *
     * @return string
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Sets the points
     *
     * @param string $points
     * @return void
     */
    public function setPoints(string $points)
    {
        $this->points = $points;
    }
}
