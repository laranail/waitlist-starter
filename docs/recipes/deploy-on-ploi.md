# Deploy on Ploi

Run a site built from the starter on a Ploi server.

## The site

Push the site to its own repository first, with its `composer.lock` committed (the starter ignores the lock; a site
keeps one). In Ploi, create a site with project type **Laravel**, web directory `/public`, PHP 8.5, and install the
repository.

## Environment

In the site's **Environment** tab, start from `.env.example` and set at least:

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://waitlist.example.com
APP_KEY=        # php artisan key:generate --show, once; never rotate it (stored integration secrets use it)
DB_CONNECTION=sqlite
DB_DATABASE=/home/ploi/waitlist.example.com/database/database.sqlite
MAIL_MAILER=smtp
WAITLIST_KIT_MAIL_FROM_ADDRESS=hello@example.com
```

Create the database file once from the server's terminal: `touch database/database.sqlite`.

## Deploy script

```bash
cd {SITE_DIRECTORY}
git pull origin {BRANCH}
{SITE_COMPOSER} install --no-interaction --prefer-dist --optimize-autoloader --no-dev

{RELOAD_PHP_FPM}

{SITE_PHP} artisan laranail::waitlist-kit.install --migrate --no-interaction
{SITE_PHP} artisan db:seed --force --no-interaction
{SITE_PHP} artisan optimize
{SITE_PHP} artisan queue:restart

echo "Deployed"
```

`install` republishes the theme assets, migrates and ends with the doctor, which fails the deploy on a bad
configuration. The seeder is idempotent: it adds the first campaign only when there is none.

## Queue worker

The thank-you mail and integration mirroring are queued. In the site's **Queue** tab, add a worker on the
`database` connection, queue `default`.

## First administrator

From the server's terminal, once:

```bash
php artisan laranail::waitlist-kit.admin you@example.com
```

---

[← Docs index](../../README.md#documentation)
