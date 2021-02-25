<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use JetBrains\PhpStorm\ArrayShape;
use Tests\TestCase;

class SetLocaleTest extends TestCase
{
    /**
     * @param string $locale
     *
     * @dataProvider localeDataProvider
     */
    public function testLocaleIsSetIfSupplied(string $locale,): void
    {
        $request = (new Request())->merge(['language' => $locale]);
        $middleware = new SetLocale();

        $middleware->handle($request, function ($req) use ($locale) {
            $this->assertEquals($locale, app()->getLocale());
        });
    }

    public function testFailsValidationIfNotInDatabase(): void
    {
        $request = (new Request())->merge(['language' => 'invalid-locale']);
        $middleware = new SetLocale();

        $this->expectException(ValidationException::class);
        $middleware->handle($request, static function ($req) {});
    }

    #[ArrayShape(['It sets the locale to fr' => 'string[]', 'It sets the locale to ja' => 'string[]'])]
    public function localeDataProvider(): array
    {
        return [
            'It sets the locale to fr' => [
                'locale' => 'fr'
            ],
            'It sets the locale to ja' => [
                'locale' => 'ja'
            ]
        ];
    }
}
