<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. laranail/waitlist-kit registers its own seeder, which runs with this one: the
     * first campaign as a draft, draft legal pages, and an administrator when WAITLIST_KIT_SEED_ADMIN_EMAIL is set.
     *
     * The skeleton's test user is gone on purpose: it carried a published password, and this seeder runs in
     * production as part of create-project and deploys.
     */
    public function run(): void
    {
        //
    }
}
