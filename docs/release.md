# Release

How the starter is versioned, and how a site built from it stays current.

## Versions

Semantic versioning, from `v0.1.0`. `create-project` takes the newest tag; `--stability=dev` takes `main` instead.
A tag is final: it is never moved or reused. Cut a release by moving `[Unreleased]` under a version heading through a
pull request, then tag the merge commit.

## Keeping a site current

A site is a copy, not a dependency: changes to the starter after `create-project` do not reach it. What does reach it
is the kit, through Composer:

```bash
composer update laranail/waitlist-kit
php artisan laranail::waitlist-kit.install --migrate
```

`install` republishes the theme assets, runs new migrations and ends with the doctor.

---

[← Docs index](../README.md#documentation)
