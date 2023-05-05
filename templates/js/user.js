class User {
  constructor(username) {
    if (!username) {
      throw new Error('Username cannot be empty');
    }
    if (typeof username !== 'string') {
      throw new Error('Username must be a string');
    }
    this.username = username;  
  }

  getUsername() {
    return this.username;
  }

  setUsername(username) {
    if (!username) {
      throw new Error('Username cannot be empty');
    }
    if (typeof username !== 'string') {
      throw new Error('Username must be a string');
    }
    this.username = username;
  }
}


if (typeof module !== 'undefined' && module.exports) {
  module.exports = User;
}
