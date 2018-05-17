requirejs.config({
  // Path mappings for the logical module names
  paths: {
    'knockout': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/knockout/knockout-3.4.2',
    'jquery': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/jquery/jquery-3.3.1.min',
    'jqueryui-amd': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/jquery/jqueryui-amd-1.12.1.min',
    'ojs': 'https://static.oracle.com/cdn/jet/v5.0.0/default/js/min',
    'ojL10n': 'https://static.oracle.com/cdn/jet/v5.0.0/default/js/ojL10n',
    'ojtranslations': 'https://static.oracle.com/cdn/jet/v5.0.0/default/js/resources',
    'text': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/text',
    'promise': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/es6-promise/es6-promise.min',
    'hammerjs': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/hammer/hammer-2.0.8.min',
    'signals': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/js-signals/signals.min',
    'ojdnd': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/dnd-polyfill/dnd-polyfill-1.0.0.min',
    'css': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require-css/css.min',
    'customElements': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/webcomponents/custom-elements.min',
    'proj4js': 'https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/proj4js/dist/proj4'
  },
        
  // Shim configuration
  shim: {
      'jquery': {
          exports: ['jQuery', '$']
      }
    }
});