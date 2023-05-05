const User = require('./user');

describe('User', () => {
  describe('constructor', () => {
    it('should create a new User object with the given username', () => {
      const user = new User('HarryPotter');
      expect(user.username).toBe('HarryPotter');
    });

    it('should throw an error if the username is empty', () => {
      expect(() => new User('')).toThrow('Username cannot be empty');
    });

    it('should throw an error if the username is not a string', () => {
      expect(() => new User(123)).toThrow('Username must be a string');
    });
  });

  describe('getUsername', () => {
    it('should return the username of the User object', () => {
      const user = new User('HarryPotter');
      expect(user.getUsername()).toBe('HarryPotter');
    });
  });

  describe('setUsername', () => {
    it('should set the username of the User object', () => {
      const user = new User('HarryPotter');
      user.setUsername('HarryP');
      expect(user.username).toBe('HarryP');
    });

    it('should throw an error if the username is empty', () => {
      const user = new User('HarryPotter');
      expect(() => user.setUsername('')).toThrow('Username cannot be empty');
    });

    it('should throw an error if the username is not a string', () => {
      const user = new User('HarryPotter');
      expect(() => user.setUsername(123)).toThrow('Username must be a string');
    });
  });
});
