import React, { Component } from "react";

class ChatBubble extends Component {
	render () {
		const { variant, message, showAvatar } = this.props;
	  return (
			<div className={`msg msg-${variant}`}>
				{showAvatar && (
          <img
					className="avatar"
					src="http://res.cloudinary.com/nzesalem/image/upload/c_scale,h_150,w_150/v1523829636/bot-icon.png"
					alt=""/>
        )}
				<div className="text">
					{typeof message === "string" ? message.split('\\n').map((item, key) => {
				  	return <span key={key}>{item}<br/></span>
					}) : message}
				</div>
			</div>
	  );
	}
};

export default ChatBubble;