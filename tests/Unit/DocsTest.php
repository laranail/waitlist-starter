<?php

declare(strict_types=1);

/** Every docs page opens with its title and ends with exactly one index link, at the depth its folder needs. */
it('keeps every docs page on the docs template', function (): void {
    $root = dirname(__DIR__, 2);
    $pages = [...glob($root.'/docs/*.md') ?: [], ...glob($root.'/docs/recipes/*.md') ?: []];

    expect(count($pages))->toBeGreaterThanOrEqual(6);

    foreach ($pages as $page) {
        $text = (string) file_get_contents($page);
        $depth = str_contains($page, '/docs/recipes/') ? '../../' : '../';
        $footer = "[← Docs index]({$depth}README.md#documentation)";

        expect($text)->toStartWith('# ')
            ->and(substr_count($text, '[← Docs index]'))->toBe(1, basename($page))
            ->and(rtrim($text))->toEndWith($footer);
    }

    expect((string) file_get_contents($root.'/README.md'))->toContain('<a name="documentation"></a>Documentation');
});
