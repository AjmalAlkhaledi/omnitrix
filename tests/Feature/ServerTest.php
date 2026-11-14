<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

use function dirname;
use function fclose;
use function file_get_contents;
use function json_decode;
use function proc_close;
use function proc_open;
use function proc_terminate;
use function stream_context_create;
use function usleep;

use const PHP_BINARY;

/**
 * Starts the real server (`php omnitrix serve`) on a test port and sends HTTP requests to it.
 */
final class ServerTest extends TestCase
{
    private const int PORT = 18091;

    /** @var resource|null */
    private static $server = null;

    public static function setUpBeforeClass(): void
    {
        $root = dirname(__DIR__, 2);
        self::$server = proc_open(
            [PHP_BINARY, $root . '/omnitrix', 'serve', '--port=' . self::PORT, '--workers=1'],
            [0 => ['pipe', 'r'], 1 => ['file', '/dev/null', 'w'], 2 => ['file', '/dev/null', 'w']],
            $pipes,
            $root,
        ) ?: null;
        fclose($pipes[0]);
        for ($i = 0; $i < 100 && self::get('/health/live') === null; $i++) {
            usleep(100_000);
        }
    }

    public static function tearDownAfterClass(): void
    {
        if (self::$server !== null) {
            proc_terminate(self::$server); // SIGTERM: graceful shutdown
            proc_close(self::$server);
        }
    }

    public function testHomeAndHealthEndpoints(): void
    {
        self::assertSame(['name' => 'Omnitrix', 'status' => 'ok'], json_decode((string) self::get('/'), true));
        self::assertSame('ok', json_decode((string) self::get('/health/live'), true)['status'] ?? null);
    }

    private static function get(string $path): ?string
    {
        $body = @file_get_contents('http://127.0.0.1:' . self::PORT . $path, false, stream_context_create(['http' => ['timeout' => 2, 'ignore_errors' => true]]));

        return $body === false ? null : $body;
    }
}
