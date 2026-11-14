<?php

declare(strict_types=1);

namespace Tests\Unit;

use Omnitrix\Application;
use PHPUnit\Framework\TestCase;

use function array_map;
use function dirname;

final class ApplicationTest extends TestCase
{
    public function testBootstrapBuildsTheApplicationWithItsRoutes(): void
    {
        $app = require dirname(__DIR__, 2) . '/bootstrap.php';

        self::assertInstanceOf(Application::class, $app);
        $patterns = array_map(static fn($route): string => $route->pattern, $app->router()->routes());
        self::assertContains('/api/users/{id:\d+}', $patterns);
        self::assertContains('/health/live', $patterns);
    }
}
