<?php

namespace Tests\Unit\Helpers;

use App\Helpers\CountriesHelper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\FeatureTestCase;

class CountryHelperTest extends FeatureTestCase
{
    public static function countryDefaultCountryFromLocaleProvider(): array
    {
        return [
            ['en', 'US'],
            ['En', 'US'],
            ['EN', 'US'],
            ['cs', 'CZ'],
            ['he', 'IL'],
            ['zh', 'CN'],
            ['de', 'DE'],
            ['es', 'ES'],
            ['fr', 'FR'],
            ['hr', 'HR'],
            ['it', 'IT'],
            ['nl', 'NL'],
            ['pt', 'PT'],
            ['ru', 'RU'],
            ['tr', 'TR'],
            ['ja', null],
        ];
    }

    public static function countryCountryFromLocaleProvider(): array
    {
        return [
            ['en', 'US'],
            ['En', 'US'],
            ['EN', 'US'],
            ['en-US', 'US'],
            ['cs', 'CZ'],
            ['he', 'IL'],
            ['zh', 'CN'],
            ['de', 'DE'],
            ['es', 'ES'],
            ['fr', 'FR'],
            ['hr', 'HR'],
            ['id', 'ID'],
            ['it', 'IT'],
            ['nl', 'NL'],
            ['pt', 'PT'],
            ['ru', 'RU'],
            ['tr', 'TR'],
            ['ja', 'JP'],
            ['pt-BR', 'BR'],
            ['fr-BE', 'BE'],
        ];
    }

    public static function timezoneFromLocaleProvider(): array
    {
        return [
            ['en', 'America/Chicago'],
            ['cs', 'Europe/Prague'],
            ['he', 'Asia/Jerusalem'],
            ['zh', 'Asia/Shanghai'],
            ['de', 'Europe/Berlin'],
            ['es', 'Europe/Madrid'],
            ['fr', 'Europe/Paris'],
            ['hr', 'Europe/Zagreb'],
            ['id', 'Asia/Jakarta'],
            ['it', 'Europe/Rome'],
            ['nl', 'Europe/Amsterdam'],
            ['pt', 'Europe/Lisbon'],
            ['ru', 'Europe/Moscow'],
            ['tr', 'Europe/Istanbul'],
            ['ja', 'Asia/Tokyo'],
        ];
    }

    #[Test]
    #[DataProvider('countryDefaultCountryFromLocaleProvider')]
    public function country_getDefaultCountryFromLocale($locale, $expect)
    {
        $reflection = new \ReflectionClass(CountriesHelper::class);
        $method = $reflection->getMethod('getDefaultCountryFromLocale');
        $method->setAccessible(true);

        $country = $method->invokeArgs(null, [$locale]);

        $this->assertEquals(
            $expect,
            $country
        );
    }

    #[Test]
    #[DataProvider('countryCountryFromLocaleProvider')]
    public function country_getCountryFromLocale($locale, $expect)
    {
        $country = CountriesHelper::getCountryFromLocale($locale);

        $this->assertNotNull($country);
        $this->assertEquals(
            $expect,
            $country->getIsoAlpha2()
        );
    }

    #[Test]
    #[DataProvider('timezoneFromLocaleProvider')]
    public function it_get_default_timezone($locale, $expect)
    {
        $country = CountriesHelper::getCountryFromLocale($locale);
        $timezone = CountriesHelper::getDefaultTimezone($country);

        $this->assertNotNull($timezone);
        $this->assertEquals(
            $expect,
            $timezone
        );
    }
}
