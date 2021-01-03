module.exports = {
  // important: "html",
  purge: false,
  theme: {
    container: {
      center: true,
    },
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('colors.gray.900'),
            maxWidth: 'none'
          }
        }
      })
    },
    editorColorPalette: {
      primary: "blue",
      secondary: "#ccc",
    },
    // small  = .prose-sm
    // medium = .prose-lg
    // large  = .prose-2xl
    // huge   = .prose h1
    editorFontSizes: {
      small: "0.875rem",
      medium: "1.125rem",
      large: "1.5rem",
      huge: "2.25rem",
    }
  },
  variants: {},
  plugins: [
    require("@tailwindcss/typography"),
    require("@mattrad/tailwindcss-wordpress"),
    ({ addComponents, theme }) => {
      addComponents({
        ".content > :not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.aligncenter):not(.wp-block-separator):not(.woocommerce)": {
          "@apply mx-auto": {},
          "@screen sm": {
            maxWidth: theme("screens.sm"),
          },
        },
        ".content > .alignwide": {
          "@screen md": {
            maxWidth: theme("screens.md"),
            marginRight: "auto",
            marginLeft: "auto",
          },
          "@screen lg": {
            maxWidth: theme("screens.lg"),
          },
        },
        ".content > .wp-block-button": {
          "@apply mx-auto": {},
          "@screen sm": {
            maxWidth: theme("screens.sm"),
          },
        },
      });
    },
  ],
};
