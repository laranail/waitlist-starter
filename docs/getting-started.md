# Getting started

From a new site to its first sign-up.

## An administrator

```bash
php artisan laranail::waitlist-kit.admin you@example.com
```

The password is asked for twice and hidden. Or set `WAITLIST_KIT_SEED_ADMIN_EMAIL` before `db:seed`.

## Set the campaign live

Serve the site (`php artisan serve`) and sign in at `/admin/waitlist`. The seeded campaign is a draft at
`/waitlist/waitlist`: open it, edit its blocks, and set its status to live.

While nothing is live, `/` shows how to get there. Once a campaign is live, `/` redirects to it.

## The first sign-up

Sign up on the campaign page. The address appears under the campaign's subscribers in the backend, and a thank-you
mail goes out through the queue. The starter's `.env` uses the `database` queue, so run a worker:

```bash
php artisan queue:work
```

Locally, `MAIL_MAILER=log` writes the mail to `storage/logs/laravel.log`.

## Next

- Change the page's look: the kit's themes, in the backend under Appearance.
- Take the public pages over: [Eject the public pages](recipes/eject-the-public-pages.md).
- Put it online: [Deploy on Ploi](recipes/deploy-on-ploi.md).

---

[← Docs index](../README.md#documentation)
