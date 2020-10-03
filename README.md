# mountaingoat
A nimble WordPress starter theme that ain't half baaaaaaad.

# Features
- [Tailwind CSS](https://tailwindcss.com)
- [Alpine JS](https://github.com/alpinejs/alpine)
- [Laravel Mix](https://laravel-mix.com)
- jQuery removed by default

Mount Goat picture by Nina Rath: https://www.pexels.com/photo/brown-goat-beside-green-plants-3382623/

# Why?

I want to build themes quickly and in ways that other developers can easily pick up, if need be. For that reason,
CSS frameworks such as Tailwind mean that there's effectively a stable Design API to work with. Also, Alpine.js
is just nice to work with, and complements Tailwind as a declarative syntax.

I also wanted to have a theme with everything built out for the WordPress block editor. This is a work-in-progress,
but it means that end users have a solid foundation on which to create their pages.

## Thanks

Thanks goes to the many creators and contributors behind Laravel, Tailwind CSS, Alpine JS, the many WordPress themes
I've lifted code from - and all oftheir components for providing such an outstanding experience for web developers.
And not least [Luke Downing](https://github.com/lukeraymonddowning) from whom I forked [Mountain Breeze](https://github.com/lukeraymonddowning/MountainBreeze).

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
for go live.

## Using Mix
Laravel Mix is a Webpack wrapper that take the complexity out of Webpack. The Mix configuration
should do for most projects, but if you want to customise it further, check out the documentation at
https://laravel-mix.com

# CSS

## Using Tailwind
Tailwind CSS included in Mountain Goat. If you would like to customise Tailwind, you can edit the included tailwind.config.js file.
Available options can be found at https://tailwindcss.com/docs/configuration.

The `.container` is set to be automatically centred.

## Tailwind plugins
There are two Tailwind plugins included:

- [Tailwind Typography](https://www.npmjs.com/package/@tailwindcss/typography)
- [TailwindCSS WordPress](https://www.npmjs.com/package/@mattrad/tailwindcss-wordpress)

### Tailwind Typography
A plugin that provides a set of `prose` classes to add typographic defaults. These have been added tp
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
    medium: "1rem",
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
|---|---|

## Additional CSS
PostCSS is used to compile CSS files.
- Imports are allowed
- Nesting of CSS is enabled

# JS

## Using Alpine
Alpine.js is included in Mountain Goat, and you can start using it right away. Check out 'partials/header.php'
to see it in use, to show and hide the menu.

## Additional JavaScript

## No jQuery?
Yes and no. jQuery is a large library that you may not need. Libraries like Alpine JS offer a much
nicer syntax at a much lower cost, so I have removed jQuery by default in the theme.

If you really can't do without it, you can get it back by returning `true` on the `enablejQuery()` function
in the `functions.php` file, e.g.:

```
function enablejQuery()
{
    return true;
}
```

This will also enqueue an additional file, `legacy.js`. Write all your jQuery in `src/legacy.js` and it will
be compiled by Laravel Mix, separately to your modern JavaScript in `main.js`. This is because while I've found
it possible to include jQuery within a Webpack file, it's a real pain. This separation of modern and legacy JS
means it's a lot easier to understand.

# Anything else?

If `Wesley_Crusher` is found, the theme will `die`.
