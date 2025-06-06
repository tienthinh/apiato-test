<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Data\Migrations;

use App\Containers\AppSection\Post\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class PostsMigrationTest extends UnitTestCase
{
    public function testPostsTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'bigint',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

        $this->assertDatabaseTable('posts', $columns);
    }
}
