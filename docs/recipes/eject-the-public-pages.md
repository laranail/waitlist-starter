# Eject the public pages

Take the campaign pages over, so their views, controllers and routes are the site's own code.

```bash
php artisan laranail::waitlist-kit.eject
```

It writes the views to `resources/views/vendor/laranail/waitlist-kit`, the controllers to
`app/Http/Controllers/WaitlistKit` and the routes to `routes/waitlist-kit.php`, required from `routes/web.php`. The
published config's `WAITLIST_KIT_ROUTES` then defaults to `false`, so the kit stops registering its own copies.
Commit all of it.

Check it with `php artisan route:list --name=campaign.show`: the action is `App\Http\Controllers\WaitlistKit\...`.

See the kit's [commands reference](https://github.com/laranail/waitlist-kit/blob/main/docs/tools/commands.md) for
exactly what is copied.

---

[← Docs index](../../README.md#documentation)
