<?php


namespace App\Tests\Category;


use App\Entity\Category;
use App\Repository\CategoryRepository;
use Monolog\Test\TestCase;
use App\Services\CategoryService;

class GetAllCategoriesTest extends TestCase
{
    private $categoryService;
    public function setUp()
    {
        $this->categoryService = new CategoryService();
    }

    public function test_get_all_categories() {

        $cat1 = new Category('category1', 'category 1 content');
        $cat2 = new Category('category2', 'category 2 content');

        $repository = $this->prophesize(CategoryRepository::class);

        $repository->getAll()->shouldBeCalled()->willReturn([$cat1, $cat2]);

        $categoryList =  $this->categoryService->getAllCategories($repository->reveal());
        $this->assertEquals(
            [
                new Category('category1', 'category 1 content'),
                new Category('category2', 'category 2 content')
            ],
            $categoryList
        );
    }
}
