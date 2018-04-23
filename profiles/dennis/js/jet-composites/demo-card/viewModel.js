define(['knockout', 'ojs/ojknockout', 'ojs/ojavatar'],
  function (ko) {
    function model (context) {
      var self = this;
      self.initials = null;
      self.workFormatted = null;
      var element = context.element;

      /**
       * Formats a 10 digit number as a phone number.
       * @param  {number} number The number to format
       * @return {string}        The formatted phone number
       */
      var formatPhoneNumber = function(number) {
        return Number(number).toString().replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
      }
      
      if (context.properties.name) {
        var initials = context.properties.name.match(/\b\w/g);
        self.initials = (initials.shift() + initials.pop()).toUpperCase();
      }
      if (context.properties.workNumber)
        self.workFormatted = formatPhoneNumber(context.properties.workNumber);
      
      /**
       * Flips a card
       * @param  {MouseEvent} event The click event
       */
      self.flipCard = function(event) {
        if (event.type === 'click' || (event.type === 'keypress' && event.keyCode === 13)) {
          // It's better to look for View elements using a selector 
          // instead of by DOM node order which isn't gauranteed.
          $(element).children('.demo-card-flip-container').toggleClass('demo-card-flipped');
        }
      };
    }

    return model;
  }
)
