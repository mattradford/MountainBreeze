module.exports = {
  theme: {
    container: {
      center: true,
    },
    future: {
      // https://tailwindcss.com/docs/upcoming-changes
      removeDeprecatedGapUtilities: true,
    },
    extend: {},
  },
  variants: {},
  plugins: [require("@tailwindcss/typography")],
};
