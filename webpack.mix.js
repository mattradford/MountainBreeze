const mix = require("laravel-mix");
const purgecss = require("@fullhuman/postcss-purgecss");
require("mix-tailwindcss");

mix
  .js("src/js/main.js", "dist/js/")
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
  .tailwind()
  .babel("src/js/legacy.js", "dist/js/legacy.js");
