# laranail/waitlist-starter

[![Tests](https://github.com/laranail/waitlist-starter/actions/workflows/tests.yml/badge.svg)](https://github.com/laranail/waitlist-starter/actions/workflows/tests.yml)
[![Boot](https://github.com/laranail/waitlist-starter/actions/workflows/boot.yml/badge.svg)](https://github.com/laranail/waitlist-starter/actions/workflows/boot.yml)
[![License MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> A Laravel app that runs [laranail/waitlist-kit](https://github.com/laranail/waitlist-kit): a waitlist, coming-soon or early-access site in one command, with its backend.

Laravel 13, PHP 8.5. Not on Packagist yet, so no registry badge: install it from GitHub as below.

## Install

```bash
composer create-project laranail/waitlist-starter my-site --stability=dev \
  --repository='{"type":"vcs","url":"https://github.com/laranail/waitlist-starter"}'
```

This creates the application, its SQLite database and tables, a draft campaign and the kit's settings.

## Quick start guide and usage

### Getting started

Create the first administrator, then serve the site:

```bash
cd my-site
php artisan laranail::waitlist-kit.admin you@example.com
php artisan serve
```

Sign in at `/waitlist-admin`, open the campaign and set it live. The home page then sends visitors to it.

### Usage

Keep the kit's pages and update them with `composer update`, or take the public side over:

```bash
php artisan laranail::waitlist-kit.eject
```

The views, controllers and routes are then the application's own; the backend keeps updating with the kit.

See [Getting started](docs/getting-started.md) for the full walkthrough, and the [Documentation](#documentation) index
for everything else.

## <a name="documentation"></a>Documentation

### Guides

- [Installation](docs/installation.md) — requirements, `create-project`, the defaults the starter sets
- [Getting started](docs/getting-started.md) — an administrator, a live campaign, the first sign-up
- [Architecture](docs/architecture.md) — what the app holds and what the kit holds, tracking versus ejecting
- [Release](docs/release.md) — versions, and keeping a site current with the kit

### Recipes

- [Deploy on Ploi](docs/recipes/deploy-on-ploi.md) — the site, its deploy script, the queue worker
- [Eject the public pages](docs/recipes/eject-the-public-pages.md) — own the views, controllers and routes

## Contributing and security

Report vulnerabilities to `security@simtabi.com`, never in a public issue; see [SECURITY.md](SECURITY.md).

## License

MIT. See [LICENSE](LICENSE).
