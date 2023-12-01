<?php

namespace Tests\Unit\Domain\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\Category\CreateCategoryUseCase;
use Mockery;
use PHPUnit\Framework\TestCase;
use stdClass;

class CreateCategoryUseCaseUnitTest extends TestCase
{
    private $mockEntity;
    private $mockRepo;
    public function testCreateNewCategory()
    {
        $categoryId = '1';
        $categoryName = 'name Category';


        // $this->mockEntity = Mockery::mock(Category::class, [
        //     $categoryId,
        //     $categoryName
        // ]);

        $this->mockRepo = Mockery::mock(CategoryRepositoryInterface::class);
        $this->mockRepo->shouldReceive('insert'); //->andReturn($this->mockEntity);

        $useCase = new CreateCategoryUseCase($this->mockRepo);
        $useCase->execute();

        $this->assertTrue(true);

        Mockery::close();
    }
}
