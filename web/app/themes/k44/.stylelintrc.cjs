module.exports = {
    extends: ['@roots/bud-sass/config/stylelint'],
    rules: {
        'import-notation': null,
        'no-empty-source': null,
        "selector-class-pattern": "^[a-z0-9]+(?:-[a-z0-9]+)*(?:__(?:[a-z0-9]+(?:-[a-z0-9]+)*))?(?:--(?:[a-z0-9]+(?:-[a-z0-9]+)*))?$"
    },
};