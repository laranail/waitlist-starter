# Release

How the starter is versioned, and how a site built from it stays current.

## Versions

Semantic versioning, from the first tag. Until then `main` is the only version and `create-project` takes it
with `--stability=dev`. A tag is final: it is never moved or reused.

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
