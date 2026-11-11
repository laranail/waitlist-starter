<?php

declare(strict_types=1);

use Simtabi\Laranail\WaitlistKit\Database\Seeders\WaitlistKitSeeder;
use Simtabi\Laranail\WaitlistKit\Enums\CampaignStatus;
use Simtabi\Laranail\WaitlistKit\Models\Campaign;

it('seeds one draft campaign and explains how to publish it', function (): void {
    $this->seed();

    expect(Campaign::query()->count())->toBe(1)
        ->and(Campaign::query()->sole()->status)->toBe(CampaignStatus::Draft);

    $this->get('/')
        ->assertOk()
        ->assertSee('No campaign is live yet')
        ->assertSee(route('laranail-waitlist-kit.admin.dashboard'), escape: false);
    $this->get('/waitlist/'.WaitlistKitSeeder::SLUG)->assertNotFound();
});

it('sends visitors to the live campaign, which takes sign-ups', function (): void {
    $this->seed();
    $campaign = Campaign::query()->sole();
    $campaign->update(['status' => CampaignStatus::Live]);

    $this->get('/')->assertRedirect(route('laranail-waitlist-kit.campaign.show', $campaign));
    $this->get('/waitlist/'.$campaign->slug)
        ->assertOk()
        ->assertSee('data-scope="signup-form"', escape: false);

    $this->post('/waitlist/'.$campaign->slug, ['email' => 'dana@example.com', 'consent' => '1'])->assertRedirect();
    expect($campaign->subscribers()->where('email', 'dana@example.com')->exists())->toBeTrue();
});

it('runs one campaign, signed in with the kit\'s own administrators', function (): void {
    expect(config('laranail.waitlist-kit.campaigns.mode'))->toBe('single')
        ->and(config('laranail.waitlist-kit.auth.mode'))->toBe('bundled');

    $this->get(route('laranail-waitlist-kit.admin.dashboard'))
        ->assertRedirect(route('laranail-waitlist-kit.admin.login'));
});

it('installs the kit and passes its doctor', function (): void {
    $this->artisan('laranail::waitlist-kit.install')->assertSuccessful();

    expect(public_path('vendor/waitlist-kit'))->toBeDirectory();
});
