const mix = require('laravel-mix')
const purgecss = require('@fullhuman/postcss-purgecss')
const wpPot = require('wp-pot')
require('mix-tailwindcss')
require('laravel-mix-clean')

mix
  .clean()
  .setPublicPath('dist')
  .js('src/js/main.js', 'js')
  .postCss('src/css/main.css', 'css', [
    require('tailwindcss'),
    require('postcss-nested'),
    ...(process.env.NODE_ENV === 'production'
      ? [
          purgecss({
            content: ['**/*.php', '**/*.html'],
            defaultExtractor: (content) =>
              content.match(/[\w-/:]+(?<!:)/g) || []
          })
        ]
      : [])
  ])
  .postCss('src/css/login.css', 'css', [
    require('tailwindcss'),
    require('postcss-nested'),
    ...(process.env.NODE_ENV === 'production'
      ? [
          purgecss({
            content: ['**/*.php', '**/*.html'],
            defaultExtractor: (content) =>
              content.match(/[\w-/:]+(?<!:)/g) || []
          })
        ]
      : [])
  ])
  .tailwind()
  .version()
  // Unless you put the full destination filepath, .babel breaks compliation
  // ¯\_(ツ)_/¯
  .babel('src/js/legacy.js', 'dist/js/legacy.js')

wpPot({
  destFile: 'lang/@textdomain.pot',
  domain: '@textdomain',
  package: '@theme'
})
