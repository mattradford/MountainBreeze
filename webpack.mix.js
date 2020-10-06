const mix = require("laravel-mix");
const purgecss = require("@fullhuman/postcss-purgecss");
require("mix-tailwindcss");

mix
  .setPublicPath("dist")
  .js("src/js/main.js", "js")
  // Unless you put the full destination filepath, .babel breaks compliation
  // ¯\_(ツ)_/¯
  .babel("src/js/legacy.js", "dist/js/legacy.js")
  .postCss("src/css/main.css", "css", [
    require("tailwindcss"),
    require("postcss-nested"),
    ...(process.env.NODE_ENV === "production"
      ? [
          purgecss({
            content: ["**/*.php", "**/*.html"],
            defaultExtractor: (content) =>
              content.match(/[\w-/:]+(?<!:)/g) || [],
          }),
        ]
      : []),
  ])
  .postCss("src/css/login.css", "css", [
    require("tailwindcss"),
    require("postcss-nested"),
    ...(process.env.NODE_ENV === "production"
      ? [
          purgecss({
            content: ["**/*.php", "**/*.html"],
            defaultExtractor: (content) =>
              content.match(/[\w-/:]+(?<!:)/g) || [],
          }),
        ]
      : []),
  ])
  .tailwind();
