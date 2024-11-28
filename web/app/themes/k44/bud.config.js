/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
  /**
   * Application assets & entrypoints
   */
  app
    .entry({
      app: ['@scripts/app', '@styles/app'],
      home: ['@scripts/pages/home', '@styles/pages/home'],
      services: ['@styles/pages/services'],
      schedule: ['@styles/pages/schedule'],
      contacts: ['@scripts/pages/contacts', '@styles/pages/contacts'],
      doctrine: ['@scripts/pages/doctrine', '@styles/pages/doctrine'],
      online: ['@styles/pages/online'],
      single: ['@scripts/pages/single', '@styles/pages/single'],
      search: ['@styles/pages/search'],
      songs: ['@styles/pages/songs'],
      'history-of-the-church': ['@scripts/pages/history-of-the-church', '@styles/pages/history-of-the-church'],
      'basics-of-belief': ['@styles/pages/basics-of-belief'],
      'archive-events': ['@scripts/pages/archive-events', '@styles/pages/archive-events'],
      'archive-ministers': ['@styles/pages/archive-ministers'],
      'template-standart-page': ['@scripts/pages/template-standart-page', '@styles/pages/template-standart-page'],
      '404': ['@styles/pages/404'],
    })
    .entry('editor', ['@scripts/editor', '@styles/editor'])
    .provide({
      jquery: '$',
    })
    .assets(['images']);

  /**
   * Set public path
   */
  app.setPublicPath('/app/themes/k44/public/');

  /**
   * Development server settings
   */
  app
    .setUrl('http://localhost:3000')
    .setProxyUrl('http://k44.loc')
    .watch(['resources/views', 'app']);

  /**
   * Generate WordPress `theme.json`
   */
  app.wpjson
    .setSettings({
      background: {
        backgroundImage: true,
      },
      color: {
        custom: false,
        customDuotone: false,
        customGradient: false,
        defaultDuotone: false,
        defaultGradients: false,
        defaultPalette: false,
        duotone: [],
      },
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
      },
      spacing: {
        padding: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
      },
      typography: {
        customFontSize: false,
      },
    })
    .setOption('templateParts', [
      {
        "name": "header",
        "title": "Header",
        "area": "header",
      },

      {
        "name": "footer",
        "title": "Footer",
        "area": "footer",
      },

      {
        "name": "example",
        "title": "Generic example",
      },
    ])
    .setOption('customTemplates', [
      {
        "name": "page-without-header",
        "title": "Page without header",
      },
    ])
};
