const User = require('./user');

class Message {
  constructor(content, sender) {
    if (!content) {
      throw new Error('Content cannot be empty');
    }

    if (!(sender instanceof User)) {
      throw new Error('Sender must be an instance of User');
    }

    this.content = this.escapeContent(content);
    this.sender = sender;
    this.posted_on = this.getTime();
  }

  getContent() {
    return this.content;
  }

  setContent(content) {
    if (!content) {
      throw new Error('Content cannot be empty');
    }
    
    this.content = this.escapeContent(content);
  }

  getSender() {
    return this.sender;
  }

  setSender(sender) {
    if (!(sender instanceof User)) {
      throw new Error('Sender must be an instance of User');
    }
    this.sender = sender;
  }

  getTime() {
    var today = new Date();
    var month = today.getMonth() + 1;
    var date = today.getDate();
    var year = today.getFullYear();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var seconds = today.getSeconds();

    if (month < 10) {
      month = '0' + month;
    }

    if (date < 10) {
      date = '0' + date;
    }

    if (hours < 10) {
      hours = '0' + hours;
    }

    if (minutes < 10) {
      minutes = '0' + minutes;
    }

    if (seconds < 10) {
      seconds = '0' + seconds;
    }

    var dateTime = year + '/' + month + '/' + date + ' ' + hours + ':' + minutes + ':' + seconds;

    return dateTime;
  }

  escapeContent(content) {
    const escapeMap = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#39;',
      '`': '&#x60;',
      '=': '&#x3D;'
    };

    const pattern = new RegExp(`[${Object.keys(escapeMap).join('')}]`, 'g');

    return content.replace(pattern, match => escapeMap[match]);
  }

}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Message;
}

