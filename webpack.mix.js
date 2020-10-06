const mix = require("laravel-mix");
const purgecss = require("@fullhuman/postcss-purgecss");
require("mix-tailwindcss");

mix
  .postCss("src/css/main.css", "dist/css/", [
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
  .postCss("src/css/login.css", "dist/css/", [
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
  .tailwind()
  .js("src/js/main.js", "dist/js/")
  .babel("src/js/legacy.js", "dist/js/legacy.js");
