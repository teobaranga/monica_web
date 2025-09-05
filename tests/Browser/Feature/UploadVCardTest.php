<?php

namespace Tests\Browser\Feature;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\ImportVCardUpload;
use Tests\DuskTestCase;

class UploadVCardTest extends DuskTestCase
{
    /**
     * Make sure that the Add contact view has the link to the upload screen,
     * and that the screen contains the blank view.
     */
    public function test_upload_vcard_is_accessible_from_add_contact_view()
    {
        $this->browse(function ($browser) {
            $browser->login()
                ->visit('/people/add')
                ->assertSee('import your contacts');

            $browser->clickLink('import your contacts')
                ->assertSee('You haven’t imported any contacts yet');
        });
    }

    /**
     * Make sure that the Import button leads to the Import screen, and that
     * the cancel button leads to the Blank import screen.
     */
    public function test_import_button_leads_to_import_screen()
    {
        $this->browse(function (Browser $browser) {
            $browser->login()
                ->visit('/settings/import')
                ->clickLink('Import vCard')
                ->assertPathIs('/settings/import/upload')
                ->clickLink('Cancel')
                ->assertPathIs('/settings/import');
        });
    }

    /**
     * Upload a single contact from a valid vcard file.
     */
    public function test_user_can_import_contacts_from_a_vcf_card()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->login();

            $browser
                ->visit('/settings/import')
                ->clickLink('Import vCard');

            $browser
                ->attach('vcard', base_path('tests/stubs/single_vcard_stub.vcard'));

            $browser
                ->on(new ImportVCardUpload)
                ->scrollTo('upload')
                ->press('Upload');

            $browser
                ->assertPathIs('/settings/import')
                ->assertSee('1 imported');
        });
    }

    /**
     * Upload a contact from a broken vCard and see that it triggers an error.
     */
    public function test_user_see_error_when_importing_broken_vcard()
    {
        $this->browse(function (Browser $browser) {
            $browser->login();

            $browser->visit('/settings/import')
                ->clickLink('Import vCard');

            $browser
                ->attach('vcard', base_path('tests/stubs/broken_vcard_stub.vcard'));

            $browser
                ->on(new ImportVCardUpload)
                ->scrollTo('upload')
                ->press('Upload');

            $browser
                ->waitForText('The vcard must be a file of type: vcf, vcard.', 3)
                ->assertSee('The vcard must be a file of type: vcf, vcard.');
        });
    }
}
