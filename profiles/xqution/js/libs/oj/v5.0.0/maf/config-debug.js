/**
 * config for debug libraries
 */

requirejs.config({
  // Path mappings for the logical module names
  paths: {
    'knockout': 'libs/knockout/knockout-3.4.2.debug',
    'jquery': 'libs/jquery/jquery-3.3.1',
    'jqueryui-amd': 'libs/jquery/jqueryui-amd-1.12.1',
    'ojs': 'libs/oj/v5.0.0/debug',
    'ojL10n': 'libs/oj/v5.0.0/ojL10n',
    'ojtranslations': 'libs/oj/v5.0.0/resources',
    'signals': 'libs/js-signals/signals',
    'text': 'libs/require/text',
    'promise': 'libs/es6-promise/es6-promise',
    'hammerjs': 'libs/hammer/hammer-2.0.8',
    'ojdnd': 'libs/dnd-polyfill/dnd-polyfill-1.0.0'
  },
  // Shim configurations for modules that do not expose AMD
  shim: {
    'jquery': {
      exports: ['jQuery', '$']
    }
  }
});
