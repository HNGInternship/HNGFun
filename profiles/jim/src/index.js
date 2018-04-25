import React, { Component } from "react";
import ReactDOM from "react-dom";
import { Scrollbars } from 'react-custom-scrollbars';
import axios from 'axios';
import qs from 'qs';

import './index.css';

import ChatBubble from './components/ChatBubble/ChatBubble';
import Spinner from './components/Spinner/Spinner';

const reqEndpoint = '/profiles/jim.php';

class Jimie extends Component {
  scroll;

  constructor(props) {
    super(props);

    this.state = {
      chatMessage: '',
      botBusy: false,
    	messages: [
        {
          by: 'jimie',
          message: 'Hi there!',
        },
        {
          by: 'jimie',
          message: `My name is Jimie. How may I assist you today? \\n
                    Type --Help to see my list of special commands.`,
        }
      ],
    }
  }

  componentDidMount() {
    // We want to scroll to bottom to see the latest stuff
    this.scroll.scrollToBottom();
  }

  handleChatMessage(e) {
    this.setState({
      chatMessage: e.target.value,
    })
  }

  handleSendMessage(e) {
    e.preventDefault();
    const { chatMessage } = this.state;

    this.addMessageToConvo({
      message: chatMessage,
      by: 'guest',
    });
    
    this.setState({
      botBusy: true,
      chatMessage: '',
    }, () => {
      this.scroll.scrollToBottom();
    });

    axios.post(`${reqEndpoint}`, qs.stringify({
      message: chatMessage,
    })).then((response) => {
      const res = response.data;
      const message = res ? res.message : false;
      
      if (message) {
        this.addMessageToConvo({
          message,
          by: 'jimie',
        }, { setBusy: false });
      }
    })
    .catch((error) => {
      console.log(error);
      this.setState({
        botBusy: false,
      })
    });
  }

  addMessageToConvo(message, options={ setBusy: true }) {
    const { messages } = this.state;
    this.setState({
      messages: [ 
        ...messages, 
        message,
      ],
      botBusy: options.setBusy,
    }, () => {
      this.scroll.scrollToBottom();
    });
  }

  eachMessage(message, i) {
    const { messages } = this.state;
    const lastMsg = (i - 1) >= 0 && messages[i - 1] !== undefined 
            ? messages[i - 1]
            : false;
    const isUserSameAsLast = lastMsg && lastMsg.by === message.by;

    return (
      <ChatBubble
        key={i + 1}
        variant={message.by}
        showAvatar={message.by === 'jimie' && !isUserSameAsLast}
        message={message.message} />
    );
  }

	render () {
		const { messages, chatMessage, botBusy } = this.state;

	  return (
		<div className="chat-wrap">
			<div className="chat-header">
				<h3>Jimie</h3>
			</div>

			<Scrollbars
        ref={el => this.scroll = el}
        className="conversation"
        style={{ height: 'calc(100vh - 200px)' }}>
				<div className="chat-messages">
					{messages.map((msg, i) => this.eachMessage(msg, i))}
          {botBusy && (
            <ChatBubble
              variant="jimie"
              showAvatar="true"
              message={(<Spinner/>)}/>
          )}
				</div>
			</Scrollbars>
			<form method="POST" onSubmit={(e) => this.handleSendMessage(e)}>
        <div className="editor">
            <input
              type="text"
              value={chatMessage}
              onChange={(e) => this.handleChatMessage(e)}
              className="chat-input"
              placeholder="Ask me anything. Or teach me something ..." />
            <button className="btn btn-sm send-btn" type="submit">
              <i className="fa fa-send"></i>
            </button>
        </div>
      </form>
		</div>
	  );
	}
};

ReactDOM.render(
  <Jimie />,
  document.getElementById("Jimie")
);
