# Mountain Goat

A nimble WordPress starter theme that ain't half baaaaaaad.

**Demo available at https://mountaingoat.netlify.app/**

![Mountain Goat image](screenshot.png?raw=true "Mountain Goat")

# Features

- [Tailwindcss 2](https://tailwindcss.com)
- [Alpine JS](https://github.com/alpinejs/alpine)
- [Laravel Mix 6 beta](https://laravel-mix.com)
- jQuery removed by default

## WordPress customisations

### Front end

- Base template wrapper, adapted from the one used by [Sage](https://roots.io/docs/sage/8.x/wrapper/).
- A cleaner `<head>`

### Back end / Dashboard

- Set allowed block editor blocks
- Resuable blocks menu available
- Remove useless dashboard widgets
- Remove *Theme editor* menu option for security
- Bit of menu reordering
- Login screen customisations
    - Uses site logo as login logo, if set
- Yoast SEO support
    - Sets some options
    - Remove MySpace social network option
- Advanced Custom Fields support
    - Hide ACF menu except from specified users
    - Define ACF licence key in `wp-config.php`
    - PHP Field Group importer (props [@AliceKLWilliams](https://github.com/AliceKLWilliams))

# Why?

I want to build themes quickly and in ways that other developers can easily pick up, if need be. For that reason,
CSS frameworks such as Tailwind mean that there's effectively a stable Design API to work with. Also, Alpine.js
is just nice to work with, and complements Tailwind as a declarative syntax.

I also wanted to have a theme with everything built out for the WordPress block editor, as it means that end users
have a solid foundation on which to create their pages. This is a work-in-progress.

## Thanks

Thanks goes to the many creators and contributors behind Laravel, Tailwind CSS, Alpine JS, the many WordPress themes
I've lifted code from - and all of their components for providing such an outstanding experience for web developers.

Some of the concepts and code are taken from the [10 Degrees base theme](https://github.com/10degrees/10degrees-base).
Props to [@10dkarl](https://github.com/10dkarl), [@baber10degrees](https://github.com/baber10degrees),
[@BenRutlandWeb](BenRutlandWeb), [@ralph10d](https://github.com/ralph10D), [@jonnyvaughan](https://github.com/jonnyvaughan)
and [@AliceKLWilliams](https://github.com/AliceKLWilliams).

And not least [Luke Downing](https://github.com/lukeraymonddowning) from whom I initially forked [Mountain Breeze](https://github.com/lukeraymonddowning/MountainBreeze).

# Getting started

Requirements:
- Git
- Composer
- NPM

1) `git clone git@github.com:mattradford/MountainGoat.git {yourthemename}` into `wp-content/themes`.
2) `composer install`
3) `npm install`

And then:

4) Find and replace `@textdomain` strings with the text domain for your theme.
5) Replace `screenshot.png` with your theme's screenshot.

# Building assets

Mountain Goat builds your CSS and JS files using Laravel Mix. This allows you to use the latest
JavaScript features and advanced CSS.

To build your assets for development, run `$ npm run dev` from the theme directory in the terminal.

To watch your files in `src` and build for development when they're saved, run `$ npm run watch`.

When you're ready for production, run `$ npm run prod`. This will minify and prepare your files ready
for production.

## Using Mix

Laravel Mix is a Webpack wrapper that take the complexity out of Webpack. The Mix configuration
should do for most projects, but if you want to customise it further, check out the documentation at
https://laravel-mix.com

# CSS

CSS is compiled to `dist/css/main.css`. On `$ npm run prod` this will be minified and purged of unused CSS.

## Using Tailwind
Tailwind CSS included in Mountain Goat. If you would like to customise Tailwind, you can edit the included `tailwind.config.js` file.
Available options can be found at https://tailwindcss.com/docs/configuration.

The `.container` is set to be automatically centred.

## Tailwind plugins
There are two Tailwind plugins included:

- [Tailwind Typography](https://www.npmjs.com/package/@tailwindcss/typography)
- [TailwindCSS WordPress](https://www.npmjs.com/package/@mattrad/tailwindcss-wordpress)

### Tailwind Typography
A plugin that provides a set of `prose` classes to add typographic defaults. These have been added to
WordPress files such as `partials/content.php`.

It works pretty well with block editor content, but some things need work.

### TailwindCSS WordPress
My plugin that generates WordPress utility classes - for block editor, accessibility, alignment and image captions.

You can configure block editor colour palette and font sizes like this:

```js
editorColorPalette: {
    primary: "blue",
    secondary: "#ccc",
},
editorFontSizes: {
    small: "0.875rem",
    medium: "1.125rem",
},
```

I suggest you use the same `prose-` classe sizes as Tailwind Typography, for consistency, namely:

| Class | Body font size  |
|---|---|
| prose-sm  | 0.875rem (14px)  |
| prose  |  1rem (16px) |
| prose-lg  | 1.125rem (18px)  |
| prose-xl  | 1.25rem (20px)  |
| prose-2xl  | 1.5rem (24px)  |

## Additional CSS
PostCSS is used to compile CSS files.
- Imports are allowed
- Nesting of CSS is enabled

Add CSS files in `src/components`, and `@import` in `src/main.css`.

# JS

JS is compiled to `dist/js/main.css`. On `$ npm run prod` this will be minified.
Legacy JS (if you enable jQuery) is compiled to `dist/js/legacy.js`. On `$ npm run prod` this will be run through Babel and minified.

## Using Alpine
Alpine.js is included in Mountain Goat, and you can start using it right away. Check out 'partials/header.php'
to see it in use, to show and hide the menu.

## Additional JavaScript

## No jQuery?
No and yes. jQuery is a large library that you may not need. Libraries like Alpine JS offer a much
nicer syntax at a much lower cost, so I have removed jQuery by default in the theme. Some WordPress plugins rely
on jQuery. Some of the better ones will check if it's enqueued and if not, enqueue their own jQuery.

If you need it, you can get enable jQuery by returning `true` on the `enablejQuery()` function
in `functions.php`, e.g.:

```php
function enablejQuery()
{
    return true;
}
```

This will also enqueue an additional file, `legacy.js`. Write all your jQuery in `src/js/legacy.js` and it will
be compiled by Laravel Mix, separately to your modern JavaScript in `src/js/main.js`. This is because while I've found
it possible to include jQuery within a Webpack file, it's a real pain to do so. This separation of modern and legacy JS
means it's a lot easier to understand.

# To do

- Fix floated images
- Add version hashing to JS and CSS compilation
- Language `.pot` compilation
- 404 page text option
- Editor colour palette

# Won't fix

- Comments
  - Meh

# Anything else?

If `Wesley_Crusher` is found, the theme will `die`.
