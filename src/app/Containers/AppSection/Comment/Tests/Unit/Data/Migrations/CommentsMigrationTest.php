<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Data\Migrations;

use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class CommentsMigrationTest extends UnitTestCase
{
    public function testCommentsTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'bigint',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];

        $this->assertDatabaseTable('comments', $columns);
    }
}
