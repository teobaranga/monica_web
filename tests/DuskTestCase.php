<?php

namespace Tests;

use App\Models\User\User;
use App\Services\User\AcceptPolicy;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\Browser;
use Laravel\Dusk\TestCase as BaseTestCase;
use PHPUnit\Framework\Attributes\BeforeClass;
use Tests\Traits\CreatesApplication;
use Tests\Traits\SignIn;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication, SignIn;

    /**
     * Prepare for Dusk test execution.
     */
    #[BeforeClass]
    public static function prepare(): void
    {
        if (!static::runningInSail()) {
            static::startChromeDriver(['--port=9515']);
        }
    }

    public function hasDivAlert(Browser $browser)
    {
        $res = $browser->elements('alert');

        return count($res) > 0;
    }

    public function hasNotification(Browser $browser)
    {
        $res = $browser->elements('.notifications');

        return count($res) > 0;
    }

    public function getDivAlert(Browser $browser)
    {
        $res = $browser->elements('alert');
        if (count($res) > 0) {
            return $res[0];
        }
    }

    public function getNotification($browser)
    {
        $res = $browser->elements('.notification');
        if (count($res) > 0) {
            return $res[0];
        }
    }

    protected function setUp(): void
    {
        parent::setUp();
        Browser::$storeScreenshotsAt = base_path('results/screenshots');
        Browser::$storeConsoleLogAt = base_path('results/console');
        Browser::$storeSourceAt = base_path('results/source');
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments(collect([
            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1920,1080',
            '--disable-search-engine-choice-screen',
            '--disable-smooth-scrolling',
        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
            return $items->merge([
                '--disable-gpu',
                '--headless=new',
                // TODO: Remove once fixed https://github.com/laravel/dusk/issues/1155
                '--no-sandbox',
            ]);
        })->all());
        $binary = env('CHROME_PATH');
        if ($binary != null) {
            $options->setBinary($binary);
        }

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? env('DUSK_DRIVER_URL') ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     *
     * @return bool
     */
    protected function hasHeadlessDisabled(): bool
    {
        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
            isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }

    /**
     * Return the default user to authenticate.
     */
    protected function user(): User
    {
        $user = factory(User::class)->create();
        $user->account->populateDefaultFields();
        $user->account->update(['has_access_to_paid_version_for_free' => true]);

        app(AcceptPolicy::class)->execute([
            'account_id' => $user->account->id,
            'user_id' => $user->id,
            'ip_address' => null,
        ]);

        return $user;
    }
}
