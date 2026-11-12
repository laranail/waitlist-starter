# Architecture

The starter is a Laravel application that holds almost nothing itself: the waitlist is laranail/waitlist-kit.

## What the app holds

| File | Holds |
| --- | --- |
| `app/Http/Controllers/HomeController.php` | `/`: the oldest live campaign's page, or a page saying how to publish one |
| `resources/views/home.blade.php` | That page |
| `config/laranail/waitlist-kit.php` | The kit's settings, the application's to change |
| `.env` | Secrets and per-environment values |

Everything else (campaign pages, sign-ups, mail, the backend, exports) comes from the kit.

## Tracking or ejecting

A site starts by **tracking** the kit: `composer update` brings new pages, fixes and themes.

**Ejecting** (`php artisan laranail::waitlist-kit.eject`) copies the public views, controllers and routes into the
application. Those become the site's own code and stop changing with the kit. The backend, models, actions and
mail stay in the package and keep updating.

## Why one repository for both

The plan named two ways to start (a skeleton that tracks the kit, and a starter kit that owns its code). They differ
only in whether `eject` has run, so one repository serves both and the choice can be made later.

## Why no test user

The skeleton's `DatabaseSeeder` creates `test@example.com` with a published password. This seeder runs in
production (`create-project` and deploys), so the starter seeds no user; `HomeTest` fails if one appears.

---

[← Docs index](../README.md#documentation)
