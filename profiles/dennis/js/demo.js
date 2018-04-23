
require(['ojs/ojcore', 'knockout', 'jquery', 'ojs/ojknockout', 'jet-composites/demo-card/loader'],
function(oj, ko, $) {
  function model() {      
    var self = this;
    self.employees = [
      {
        name: 'Dennis Otugo',
        avatar: 'https://res.cloudinary.com/dekstar-incorporated/image/upload/v1523701221/avatar.png',
        title: 'System Admin',
        work: 08114948073,
        email: 'wesleyotugo@fedoraproject.org'
      }
    ];
  }

  $(function() {
      ko.applyBindings(new model(), document.getElementById('composite-container'));
  });

});
