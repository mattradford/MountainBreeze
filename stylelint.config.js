module.exports = {
  extends: ["stylelint-config-standard"],
  rules: {
    "at-rule-no-unknown": [
      true,
      {
        ignoreAtRules: [
          "tailwind",
          "apply",
          "variants",
          "responsive",
          "screen",
        ],
      },
    ],
    'at-rule-empty-line-before': [
        'always', {
          except: ['blockless-after-blockless', 'blockless-after-same-name-blockless', 'first-nested'],
          ignore: ['after-comment', 'inside-block'],
          ignoreAtRules: ['apply', 'screen', 'font-face', 'nest'],
        },
      ],
    "declaration-block-trailing-semicolon": null,
    "no-descending-specificity": null,
  },
};