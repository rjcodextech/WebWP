module.exports = {
    extends: 'stylelint-config-standard-scss',
    plugins: ['stylelint-scss'],
    rules: {
        'color-no-invalid-hex': true,
        'declaration-block-no-duplicate-properties': true,
        'block-no-empty': true,
        'no-duplicate-selectors': true,
        // 'scss/dollar-variable-pattern': '^foo',
        'scss/selector-no-redundant-nesting-selector': true,
        "scss/dollar-variable-pattern": null
        // Add other rules as needed for best practices
    },
};
