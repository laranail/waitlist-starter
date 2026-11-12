<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Simtabi\Laranail\WaitlistKit\Enums\CampaignStatus;
use Simtabi\Laranail\WaitlistKit\Models\Campaign;

/**
 * The site's front door: the oldest live campaign's page, or, while nothing is live yet, a page that says how to
 * publish one.
 */
final class HomeController
{
    public function __invoke(): RedirectResponse|View
    {
        $campaign = Campaign::query()
            ->where('status', CampaignStatus::Live)
            ->oldest()
            ->first();

        if ($campaign instanceof Campaign) {
            return redirect()->route('laranail-waitlist-kit.campaign.show', $campaign);
        }

        return view('home');
    }
}
