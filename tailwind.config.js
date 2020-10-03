module.exports = {
  theme: {
    container: {
      center: true,
    },
    future: {
      // https://tailwindcss.com/docs/upcoming-changes
      removeDeprecatedGapUtilities: true,
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
    require("@tailwindcss/typography"),
    require("@mattrad/tailwindcss-wordpress"),
  ],
};
