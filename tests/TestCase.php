<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /** One application key per run, generated rather than written down. */
    private static ?string $key = null;

    protected function setUp(): void
    {
        parent::setUp();

        self::$key ??= 'base64:'.base64_encode(random_bytes(32));
        config()->set('app.key', self::$key);
    }
}
