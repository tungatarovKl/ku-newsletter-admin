<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $res = DB::select('select * from information_schema.columns LIMIT 1');
        self::assertCount(1, $res);
    }
}
