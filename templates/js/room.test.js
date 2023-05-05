const Room = require('./room');

describe('Room', () => {
  describe('constructor', () => {
    it('should create a new Room with a name and slug', () => {
      const room = new Room('Transfiguration classroom');
      expect(room.getName()).toBe('Transfiguration classroom');
      expect(room.getSlug()).toBe('transfiguration_classroom');
    });
  });

  describe('getName', () => {
    it('should return the name of the room', () => {
      const room = new Room('Transfiguration classroom');
      expect(room.getName()).toBe('Transfiguration classroom');
    });
  });

  describe('setName', () => {
    it('should set the name of the room and update the slug', () => {
      const room = new Room('Test Room');
      room.setName('New Room Name');
      expect(room.getName()).toBe('New Room Name');
      expect(room.getSlug()).toBe('new_room_name');
    });

    it('should throw an error if the name is not a string', () => {
      const room = new Room('Test Room');
      expect(() => room.setName(123)).toThrowError('Room name must be a string');
    });

    it('should throw an error if the name is an empty string', () => {
      const room = new Room('Test Room');
      expect(() => room.setName('    ')).toThrowError('Room name must be a non-empty string');
    });
  });

  describe('generateSlug', () => {
    it('should generate a valid slug from a name', () => {
      const slug = Room.generateSlug('Test Room');
      expect(slug).toBe('test_room');
    });

    it('should remove diacritics from the name', () => {
      const slug = Room.generateSlug('Café Room');
      expect(slug).toBe('cafe_room');
    });

    it('should replace spaces with underscores', () => {
      const slug = Room.generateSlug('Test Room');
      expect(slug).toBe('test_room');
    });

    it('should throw an error if the slug contains invalid characters', () => {
      expect(() => Room.generateSlug('Test Room 123')).toThrowError('Slug can only contain letters and underscores');
    });
  });
});
