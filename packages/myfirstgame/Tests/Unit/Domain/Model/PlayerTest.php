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
class PlayerTest extends UnitTestCase
{
    /**
     * @var \Hellsfoul\Myfirstgame\Domain\Model\Player|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Hellsfoul\Myfirstgame\Domain\Model\Player::class,
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
    public function getNicknameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNickname()
        );
    }

    /**
     * @test
     */
    public function setNicknameForStringSetsNickname(): void
    {
        $this->subject->setNickname('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('nickname'));
    }
}
