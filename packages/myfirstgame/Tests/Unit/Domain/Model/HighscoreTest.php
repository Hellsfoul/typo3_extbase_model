<?php

declare(strict_types=1);

namespace Hellsfoul\Myfirstgame\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author hellsfoul 
 */
class HighscoreTest extends UnitTestCase
{
    /**
     * @var \Hellsfoul\Myfirstgame\Domain\Model\Highscore|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Hellsfoul\Myfirstgame\Domain\Model\Highscore::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getPointsReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPoints()
        );
    }

    /**
     * @test
     */
    public function setPointsForStringSetsPoints(): void
    {
        $this->subject->setPoints('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('points'));
    }

    /**
     * @test
     */
    public function getPlayerReturnsInitialValueForPlayer(): void
    {
        self::assertEquals(
            null,
            $this->subject->getPlayer()
        );
    }

    /**
     * @test
     */
    public function setPlayerForPlayerSetsPlayer(): void
    {
        $playerFixture = new \Hellsfoul\Myfirstgame\Domain\Model\Player();
        $this->subject->setPlayer($playerFixture);

        self::assertEquals($playerFixture, $this->subject->_get('player'));
    }
}
