<?php

declare(strict_types=1);

namespace Hellsfoul\Myfirstgame\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author hellsfoul 
 */
class HighscoreControllerTest extends UnitTestCase
{
    /**
     * @var \Hellsfoul\Myfirstgame\Controller\HighscoreController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Hellsfoul\Myfirstgame\Controller\HighscoreController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllHighscoresFromRepositoryAndAssignsThemToView(): void
    {
        $allHighscores = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $highscoreRepository = $this->getMockBuilder(\Hellsfoul\Myfirstgame\Domain\Repository\HighscoreRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $highscoreRepository->expects(self::once())->method('findAll')->will(self::returnValue($allHighscores));
        $this->subject->_set('highscoreRepository', $highscoreRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('highscores', $allHighscores);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenHighscoreToView(): void
    {
        $highscore = new \Hellsfoul\Myfirstgame\Domain\Model\Highscore();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('highscore', $highscore);

        $this->subject->showAction($highscore);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenHighscoreToHighscoreRepository(): void
    {
        $highscore = new \Hellsfoul\Myfirstgame\Domain\Model\Highscore();

        $highscoreRepository = $this->getMockBuilder(\Hellsfoul\Myfirstgame\Domain\Repository\HighscoreRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $highscoreRepository->expects(self::once())->method('add')->with($highscore);
        $this->subject->_set('highscoreRepository', $highscoreRepository);

        $this->subject->createAction($highscore);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenHighscoreToView(): void
    {
        $highscore = new \Hellsfoul\Myfirstgame\Domain\Model\Highscore();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('highscore', $highscore);

        $this->subject->editAction($highscore);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenHighscoreInHighscoreRepository(): void
    {
        $highscore = new \Hellsfoul\Myfirstgame\Domain\Model\Highscore();

        $highscoreRepository = $this->getMockBuilder(\Hellsfoul\Myfirstgame\Domain\Repository\HighscoreRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $highscoreRepository->expects(self::once())->method('update')->with($highscore);
        $this->subject->_set('highscoreRepository', $highscoreRepository);

        $this->subject->updateAction($highscore);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenHighscoreFromHighscoreRepository(): void
    {
        $highscore = new \Hellsfoul\Myfirstgame\Domain\Model\Highscore();

        $highscoreRepository = $this->getMockBuilder(\Hellsfoul\Myfirstgame\Domain\Repository\HighscoreRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $highscoreRepository->expects(self::once())->method('remove')->with($highscore);
        $this->subject->_set('highscoreRepository', $highscoreRepository);

        $this->subject->deleteAction($highscore);
    }
}
