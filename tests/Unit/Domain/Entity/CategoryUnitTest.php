<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Throwable;

class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $uuid = (string) Uuid::uuid4()->toString();

        $category = new Category(
            id: $uuid,
            name: "New CAT",
            description: "New DESC",
            isActive: true
        );
        var_dump($category->createdAt->format('Y-m-d H:i:s'));
        $this->assertNotEmpty($category->createdAt());
        $this->assertNotEmpty($category->id());
        $this->assertEquals("New CAT", $category->name);
        $this->assertEquals("New DESC", $category->description);
        $this->assertEquals(true, $category->isActive);
    }

    public function testActivated()
    {
        $category = new Category(
            name: "New CAT",
            isActive: false,
        );

        $this->assertFalse($category->isActive);

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: "New CAT",
        );

        $this->assertTrue($category->isActive);

        $category->disabled();

        $this->assertFalse($category->isActive);
    }

    public function testUpdate()
    {
        $uuid = (string) Uuid::uuid4()->toString();

        $category = new Category(
            id: $uuid,
            name: "New CAT",
            description: "New DESC",
            isActive: true,
            createdAt: '2023-12-01 00:00:00'
        );

        $category->update(
            name: "New CAT 2",
            description: "New DESC 2",
        );
        $this->assertEquals($uuid, $category->id());
        $this->assertEquals("New CAT 2", $category->name);
        $this->assertEquals("New DESC 2", $category->description);
    }

    public function testExceptionName()
    {
        try {

            new Category(
                name: 'Na',
                description: 'New Desc'
            );
            $this->assertTrue(false);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testExceptionDescription()
    {
        try {

            new Category(
                name: 'Name Category',
                description: random_bytes(99999)
            );
            $this->assertTrue(false);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}
