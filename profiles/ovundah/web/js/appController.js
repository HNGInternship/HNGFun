/**
 * @license
 * Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 * The Universal Permissive License (UPL), Version 1.0
 */
/*
 * Your application specific code will go here
 */
define(['ojs/ojcore', 'knockout', 'ojs/ojmodule-element-utils', 'ojs/ojmodule-element', 'ojs/ojrouter', 'ojs/ojknockout', 'ojs/ojarraytabledatasource'],
  function(oj, ko, moduleUtils) {
     function ControllerViewModel() {
       var self = this;
         
         self.name = ko.observable('Ovundah King');
        self.desc = ko.observable('Tech Enthusiast');
        self.tools = ko.observable('Figma, HTML, CSS, JS, MEAN');
        self.picture = 'http://res.cloudinary.com/ovu/image/upload/c_scale,o_100,r_100,w_200/a_349/v1523814132/Ovundah.png';

      // Media queries for repsonsive layouts
      var smQuery = oj.ResponsiveUtils.getFrameworkQuery(oj.ResponsiveUtils.FRAMEWORK_QUERY_KEY.SM_ONLY);
      self.smScreen = oj.ResponsiveKnockoutUtils.createMediaQueryObservable(smQuery);

       // Router setup
       self.router = oj.Router.rootInstance;
       self.router.configure({
         'dashboard': {label: 'Dashboard', isDefault: true},
         'incidents': {label: 'Incidents'},
         'customers': {label: 'Customers'},
         'about': {label: 'About'}
       });
      oj.Router.defaults['urlAdapter'] = new oj.Router.urlParamAdapter();

      self.moduleConfig = ko.observable({'view':[], 'viewModel':null});
      ko.computed(function() {
        var name = self.router.moduleConfig.name();
        var viewPath = 'views/' + name + '.html';
        var modelPath = 'viewModels/' + name;
        var masterPromise = Promise.all([
          moduleUtils.createView({'viewPath':viewPath}),
          moduleUtils.createViewModel({'viewModelPath':modelPath})
        ]);
        masterPromise.then(
          function(values){ 
            self.moduleConfig({'view':values[0],'viewModel':values[1]}); 
          },
          function(reason){}
        );
      });

      // Navigation setup
      var navData = [
      {name: "Ovundah's Profile", id: 'dashboard',
       iconClass: 'oj-navigationlist-item-icon demo-icon-font-24 demo-fire-icon-24'}
      ];
      self.navDataSource = new oj.ArrayTableDataSource(navData, {idAttribute: 'id'});

      // Header
      // Application Name used in Branding Area
      self.appName = ko.observable("App Name");
      // User Info used in Global Navigation area
      self.userLogin = ko.observable("john.hancock@oracle.com");

      // Footer
      function footerLink(name, id, linkTarget) {
        this.name = name;
        this.linkId = id;
        this.linkTarget = linkTarget;
      }
      
     }

     return new ControllerViewModel();
  }
);
