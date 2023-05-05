const User = require('./user');
const Message = require('./message');

describe('Message', () => {
  let sender;

  beforeAll(() => {
    sender = new User('HarryPotter');
  });

  describe('constructor', () => {
    it('should create a new Message object with the given content and sender', () => {
      const message = new Message('Hello', sender);
      expect(message.content).toBe('Hello');
      expect(message.sender).toBe(sender);
    });

    it('should escape special characters in the content before assigning it to the Message object', () => {
      const message = new Message('<script>alert("XSS attack!")</script>', sender);
      expect(message.getContent()).toBe('&lt;script&gt;alert(&quot;XSS attack!&quot;)&lt;/script&gt;');
    });

    it('should throw an error if the content is empty', () => {
      expect(() => new Message('', sender)).toThrow('Content cannot be empty');
    });

    it('should throw an error if the sender is not an instance of User', () => {
      expect(() => new Message('Hello', 'HarryPotter')).toThrow('Sender must be an instance of User');
    });
  });

  describe('getContent', () => {
    it('should return the content of the Message object', () => {
      const message = new Message('Hello', sender);
      expect(message.getContent()).toBe('Hello');
    });
  });

  describe('setContent', () => {
    it('should set the content of the Message object', () => {
      const message = new Message('Hello', sender);
      message.setContent('Hi');
      expect(message.content).toBe('Hi');
    });

    it('should throw an error if the content is empty', () => {
      const message = new Message('Hello', sender);
      expect(() => message.setContent('')).toThrow('Content cannot be empty');
    });
  });

  describe('getSender', () => {
    it('should return the sender of the Message object', () => {
      const message = new Message('Hello', sender);
      expect(message.getSender()).toBe(sender);
    });
  });

  describe('setSender', () => {
    it('should set the sender of the Message object', () => {
      const message = new Message('Hello', sender);
      const newSender = new User('HermioneGranger');
      message.setSender(newSender);
      expect(message.sender).toBe(newSender);
    });

    it('should throw an error if the sender is not an instance of User', () => {
      const message = new Message('Hello', sender);
      expect(() => message.setSender('HermioneGranger')).toThrow('Sender must be an instance of User');
    });
  });

  describe('getTime', () => {
    it('should return the current time in the expected format', () => {
      const message = new Message('Hello', sender);
      
      // Expected date format YYYY/MM/DD HH:MM:SS
      const expectedFormat = /^\d{4}\/\d{2}\/\d{2} \d{2}:\d{2}:\d{2}$/;
      expect(message.getTime()).toMatch(expectedFormat);
    });
  });
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Message;
}
