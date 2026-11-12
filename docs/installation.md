# Installation

What the starter needs, how to create a site from it, and the defaults it sets.

## Requirements

- PHP 8.5 with `pdo_sqlite` (or the driver for the database you choose), `mbstring`, `intl` and `bcmath`.
- Composer 2.
- No Node: the kit ships its theme assets prebuilt.

## Create a site

The starter and the kit are not on Packagist yet, so Composer reads them from GitHub:

```bash
composer create-project laranail/waitlist-starter my-site --stability=dev \
  --repository='{"type":"vcs","url":"https://github.com/laranail/waitlist-starter"}'
```

`laravel new my-site --using=laranail/waitlist-starter` needs the starter on Packagist and does not work yet.

After the files are in place, Composer runs these, in order:

| Step | Does |
| --- | --- |
| `key:generate` | Writes `APP_KEY` to `.env` |
| `database/database.sqlite` | Creates the SQLite file |
| `laranail::waitlist-kit.install --migrate` | Publishes the theme assets, runs every migration, then the kit's doctor |
| `db:seed --force` | The kit's seeder: a draft campaign, draft legal pages, and an administrator when `WAITLIST_KIT_SEED_ADMIN_EMAIL` is set |

## Defaults

| Key | Starter | Kit | Why |
| --- | --- | --- | --- |
| `WAITLIST_KIT_CAMPAIGNS` | `single` | `multi` | A site is usually one waitlist |
| `WAITLIST_KIT_AUTH` | `bundled` | `host` | The app has no users of its own to sign in with |
| `DB_CONNECTION` | `sqlite` | (the app's) | Nothing to set up |

`config/laranail/waitlist-kit.php` is committed in the starter: it is the application's file to change.

---

[← Docs index](../README.md#documentation)
