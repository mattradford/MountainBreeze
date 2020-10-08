module.exports = {
  // important: "html",
  theme: {
    container: {
      center: true,
    },
    future: {
      // https://tailwindcss.com/docs/upcoming-changes
      removeDeprecatedGapUtilities: true,
      purgeLayersByDefault: true,
    },
    typography: {
      default: {
        css: {
          color: "#333",
          // a: {
          //   color: "#3182ce",
          //   "&:hover": {
          //     color: "#2c5282",
          //   },
          // },
        },
      },
    },
    editorColorPalette: {
      primary: "blue",
      secondary: "#ccc",
    },
    editorFontSizes: {
      small: "16px",
      medium: "22px",
    },
    extend: {},
  },
  variants: {},
  plugins: [
    ({ addComponents, theme }) => {
      addComponents({
        ".content > :not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright):not(.wp-block-separator):not(.woocommerce)": {
          "@apply mx-auto": {},
          "@screen sm": {
            maxWidth: theme("screens.sm"),
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
    require("@tailwindcss/typography"),
    require("@mattrad/tailwindcss-wordpress"),
  ],
};
