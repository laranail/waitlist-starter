# Changelog

All notable changes to this project are documented here. The format follows
[Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and the project adheres to
[Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- The Laravel 13.11 skeleton, requiring laranail/waitlist-kit from GitHub: one campaign (`WAITLIST_KIT_CAMPAIGNS=single`),
  the kit's own sign-in (`WAITLIST_KIT_AUTH=bundled`), SQLite.
- `composer create-project` installs the kit, migrates, runs the doctor and seeds a draft campaign.
- `/` sends visitors to the oldest live campaign, or says how to publish one.
- Docs: installation, getting started, architecture, release, and recipes for Ploi and ejecting.
- CI: Pint, PHPStan and the suite; and a boot check that runs `create-project`, serves the site, signs up, ejects and
  serves the page again through the application's controllers.

### Removed

- The skeleton's test user from `DatabaseSeeder`: its password is published and the seeder runs in production.
- The skeleton's Vite and Node setup, the welcome page and its example tests: the kit's themes are prebuilt.
