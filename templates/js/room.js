class Room {
  constructor(name) {
    this.name = name;
    this.slug = Room.generateSlug(name);
  }

  getName() {
    return this.name;
  }

  setName(name) {
    if (typeof name !== 'string') {
      throw new Error('Room name must be a string');
    }
    if (!name.trim()) {
      throw new Error('Room name must be a non-empty string');
    }
    this.name = name.trim();
    this.slug = Room.generateSlug(this.name);
  }

  getSlug() {
    return this.slug;
  }

  static generateSlug(name) {
    let slug = name.toLowerCase().replace(/\s+/g, '_').normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    if (!/^[a-z_]*$/.test(slug)) {
      throw new Error('Slug can only contain letters and underscores');
    }
    return slug;
  }
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Room;
}
