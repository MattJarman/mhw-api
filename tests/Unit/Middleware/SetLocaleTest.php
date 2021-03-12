<?php

declare(strict_types=1);

namespace Tests\Unit\Middleware;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

use function app;

class SetLocaleTest extends TestCase
{
    /**
     * @param string $locale Locale of app
     *
     * @dataProvider localeDataProvider
     */
    public function testLocaleIsSetIfSupplied(string $locale): void
    {
        $request = (new Request())->merge(['language' => $locale]);
        $middleware = new SetLocale();

        $middleware->handle($request, function ($req) use ($locale): void {
            $this->assertEquals($locale, app()->getLocale());
        });
    }

    public function testFailsValidationIfNotInDatabase(): void
    {
        $request = (new Request())->merge(['language' => 'invalid-locale']);
        $middleware = new SetLocale();

        $this->expectException(ValidationException::class);
        $middleware->handle($request, static function ($req): void {
        });
    }

    /**
     * @return string[][]
     */
    public function localeDataProvider(): array
    {
        return [
            'It sets the locale to fr' => ['locale' => 'fr'],
            'It sets the locale to ja' => ['locale' => 'ja'],
        ];
    }
}
