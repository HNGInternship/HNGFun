    window.addEventListener("load", function() {
    loadQuestions = function(){

        return new Promise((resolve, reject) => {
            fetch('https://opentdb.com/api.php?amount=20&difficulty=easy&type=boolean')
            .then(resp => resp.json())
            .then(questions => {
                resolve(questions);
            });
        });
    
    }
    const chatBot = {
            $el: $('.chat-area'),
        init: function(){
            this.$el.addClass('chat-area--js');
            //add functions js can do
            this.$el.find('.chat-list__item--bot').text("I am Waju, a bot built by Olanrewaju, i can tell the time, to play a game type #game");
            this.cacheDome();
            this.bindEvents();
        },
        cacheDome: function(){
            this.$chatList = this.$el.find('.chat-list')
            this.$form = this.$el.find('form');
            this.$userInput = this.$form.find('#questionField');
            this.$wrapper = this.$el.find('.chat-list-wrapper');
            this.$toggle = this.$el.find('span.toggle'); 
        },
        sendApiRequest: function(location){
            let self = this;
        
                let posting = $.ajax({
                    type: "GET",
                    url: `http://api.timezonedb.com/v2/list-time-zone?key=YJ6D5BKBWI4V&format=json&&zone=*${location}*&fields=zoneName,timestamp`
                 });
                posting.done(function(data){
                    if('FAILED' == data.status){
                        self.appendMessage('Oops! that didn\'t work, dont forget to ask for a city(not country) ', 'bot');
                        //scroll the chat interface up/ down
                        self.$wrapper.animate(
                            {scrollTop: '+=2500',},
                            {duration: 700,
                            easing: 'swing',
                            duration: 600
                            });

                    } else{
                        var dt = new Date(data.timestamp);
                        var hr = dt.getHours();
                        var m = "0" + dt.getMinutes();
                        let time=  hr+ ':' + m.substr(-2);
                        self.appendMessage(`The time in ${location} is ${time} `, 'bot');
                        
                        // scroll the chat interface up/ down
                        self.$wrapper.animate(
                            {scrollTop: '+=2500',},
                            {duration: 700,
                            easing: 'swing',
                            duration: 600
                            });
                    }
                        
                });  

                 //clear the input
            self.$userInput.val('');
        },
        sendLocation: function(location){
            let self = this;
          
                let posting = $.ajax({
                    url: "/profiles/Waju.php",
                    type: "post",
                    method:"POST",
                    data: {location: location, ajax: 'AJAX'},
                    dataType: "json"
                });
                posting.done(function(data){
                    if (false == data.message){
                        // send API request here;
                       self.sendApiRequest(location);
                       return;
                    } else {
                        let response = `the time in ${location} is ${data.message}`;
                        self.appendMessage(response, 'bot');
                    }
                });  

                 //clear the input
            self.$userInput.val('');
        },
       
        /**
         * Handle input from the user
         */
        handleInput: function(e){
            e.preventDefault();
            let message = this.$userInput.val();
            if(message === '') {
                this.appendMessage("Please input a message", 'bot');
                return;
            } 
             //append the message
             this.appendMessage(message,'user');

            if(message.toLowerCase().includes('what is the time in')){
                let location = message.replace('what is the time in', "").replace('?', "").trim();
               //make API request or firstcall php script
               this.sendLocation(location);
                return;
            }
           
            //if input is a command run it regardless of state;
            if( message.charAt(0) == '#' ){
                // run command
                this.runCommand(message);
                this.$userInput.val('');
                return;
            }
            //check if we are in a function state
            if(this.$el.data('state') == ''){
                //its stateless - just chat
                //check if its a command has a leading #, if so do the command else send it to server                    //send question to server Assynchronously
                this.sendRequest(message);

            } else {
                //its in a function state (just game for now)
                this.evaluateResponse(message);
            }

            //clear the input
            this.$userInput.val('');


            },
            //send a request to the serve and append it to the bot
            sendRequest: function(message) {
                let self = this;

                let posting = $.ajax({
                    url: "/profiles/Waju.php",
                    type: "POST",
                    method: "POST",
                    data: {question: message, ajax: 'AJAX'},
                    dataType: "json"
                });
                posting.done(function(data){
                    if(!data.message){
                        self.appendMessage('Oops! i am unable to help you due to technical challenges, lets talk later!', 'bot');
                        return;
                    }
                    self.appendMessage(data.message, 'bot');
                });  
            },
        /**
         * Append the message to the chat-list, takes in message and sender-type
         */
        appendMessage: function(message, senderType){
            //PS; 'this' is chatBot Object
            // console.log( `Appending message: ${message} from Sender: ${senderType}`);
            //for bots, add a 400s delay, for user dont;
            let delay = senderType == 'bot' ? 1000 : 800,
                self = this;
            setTimeout(function(){
                self.$chatList.append(`
                <li class="chat-list__item chat-list__item--${senderType}">${message}</li>
            `);
            }, delay);
                   

            //scroll the chat interface up/ down
            this.$wrapper.animate(
                            {scrollTop: '+=4500',},
                            {duration: 700,
                            easing: 'swing',
                            duration: 600
                            });
        },
        toggleView: function(e){
            // if height is ,170.. increase it and point down 
            console.log(this.$el.height());
            if( this.$el.height() <= 250 ){
                    // <!-- &#x23EC; -->
                    this.$toggle.html(`<span class="toggle" data-state="down">&#x23EC;</span>`);
                    this.$el.animate({ height: 350 }, { duration: 300 })
            } else {
                // reduce it and point down 
                // <!-- &#x23EC; -->
                this.$toggle.html(`<span class="toggle" data-state="down">&#x23EB;</span>`);
                this.$el.animate({ height: 250 }, { duration: 300 })
            }
        },
         //gets the machine to switch to a command mode
         runCommand: function(command){
            switch(command){
                case "#game":
                    this.$el.trigger('startGame');
                break;
                case "#end":
                    this.$el.trigger('endGame');
                default:
                    this.$el.data('state', '');
            }
        },
        bindEvents: function(){
            //handle user inputs
            this.$form.on('submit',this.handleInput.bind(this));

            //toggle on click 
            this.$toggle.on('click', this.toggleView.bind(this));

            //start actions based on triggered events

            //start game
            this.$el.on('startGame', this.startGame.bind(this));

            //end game
            this.$el.on('endGame', this.gameOver.bind(this));
        },
        // =====GAME FUNCTIONS ======= 
        //vars
        _score: 0,
        _trials : 0,
        _screens: {
            start: `Hi there, lets play a trivia game I will ask you a question, respond with T (True) or F (False), type #end to stop the game`,
            wrong: `Sorry that answer was wrong`,
            correct: `Cool, you were right`,
            gameOver: `Thanks for playing you scored ${self._score} points type #game to play again`
        },
        startGame: function(){
            let self = this,
                fetch_data = loadQuestions();
                fetch_data.then(function(data){
                   self._questions =data.results; 
                   return data;                  // self._questions = data.result;
                }).then(function(data){
                     // reset question index in case restarting game
                    self.$el.data('state', 'game');
                    self.current_index = 0;
                    //set $el data-state to game, used in handle input to know if game is on going.
                    //send start screen message,
                    self.appendMessage(self._screens.start, 'bot');
                    
                    //send first question after some seconds
                    
                        self.appendMessage(self._questions[self.current_index].question, 'bot');        
                    
                    self.$wrapper.animate(
                        {scrollTop: '+=2000',},
                        {duration: 700,
                        easing: 'swing',
                        duration: 600
                        }
                    );
                })
           
        },
        nextQuestion: function(){
            //increase index
            this.current_index++;
            if(this.current_index !=this._questions.length){
                //show question after some seconds
                    let self = this;
                    setTimeout(function(){
                        self.appendMessage(self._questions[self.current_index].question, 'bot');        
                    }, 1200);
            } else {
                //we have exhasted question, game over
                this.gameOver();
                //unset the state 
                this.$el.data('state','');
            }
            this.$wrapper.animate(
                {scrollTop: '+=1000',},
                {duration: 700,
                easing: 'swing',
                duration: 600
                }
            );
        },
        gameOver: function(){
            this.appendMessage(`Thanks for playing you scored ${this._score} points type #game to play again or type a message to chat`, 'bot');
        },
        evaluateResponse:function(response){
            let _response = response.charAt(0).toUpperCase(),
                answer = this._questions[this.current_index].correct_answer.charAt(0).toUpperCase(),
  
                //check if right or wrong
                result = (_response === answer ) ? 'Correct' : 'Wrong';          
                //update score
                    this.updateScore(result);
                //show result
                let screen = result === 'Correct' ? this._screens.correct : this._screens.wrong;
                this.appendMessage(screen, 'bot');    
                //next question
                this.nextQuestion();       
        },
        //update the score adding 100 for correct answers of leaving it thesame
        updateScore(verdict){
           this._score = ( verdict === 'Correct' ) ? this._score +100 : this._score;
        },
        dislayQuestion: function(){},
        current_index: 0,
       
    }
   
  chatBot.init();
});