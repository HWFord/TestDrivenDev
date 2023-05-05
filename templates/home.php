<script type="module" src="templates/js/message.js"></script>

<div class="container">
  <div class="row">
    <h1 id="welcome-message" class="text-center my-5">Welcome</h1>
  </div>

  <div class="row">
    <h2 class="text-left my-5">Hogwarts Rooms</h2>
    <div class="row row-cols-1 row-cols-md-3">
      <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Gryffindor common room</h5>
            <a href="?page=room&room=gryffindor_common_room" onClick="sessionStorage.setItem('current-room-name', 'Gryffindor common room')">
              <button class="btn btn-primary mt-2">Enter room</button>
            </a>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Huffelpuff common room</h5>
            <a href="?page=room&room=hufflepuff_common_room" onClick="sessionStorage.setItem('current-room-name', 'Huffelpuff common room')">
              <button class="btn btn-primary mt-2">Enter room</button>
            </a>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Ravenclaw common room</h5>
            <a href="?page=room&room=ravenclaw_common_room" onClick="sessionStorage.setItem('current-room-name', 'Ravenclaw common room')">
              <button class="btn btn-primary mt-2">Enter room</button>
            </a>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Slytherin common room</h5>
            <a href="?page=room&room=slytherin_common_room" onClick="sessionStorage.setItem('current-room-name', 'Slytherin common room')">
              <button class="btn btn-primary mt-2">Enter room</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <h2 class="text-left my-5">Other hogwarts Rooms</h2>
    <div class="row row-cols-1 row-cols-md-3 otherRooms">
      <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Add another room</h5>

            <form id="newRoom">
              <div class="form-group">
                <input type="text" class="form-control" id="roomName" placeholder="Room name">
              </div>
              <div class="invalid-feedback error-message">
                Please enter a valid room name.
              </div>
              <button  class="btn btn-primary mt-2">Submit</button>
            </form>

          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Room of requirement</h5>
            <a href="?page=room&room=room_of_requirement" onClick="sessionStorage.setItem('current-room-name', 'Room of requirement')">
              <button class="btn btn-primary mt-2">Enter room</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

<style>
  .error-message {
    display: none;
  }
</style>

<script src="templates/js/room.js"></script>

<script>

  // Get the form element and the input element
  const form = document.getElementById('newRoom');
  const input = document.getElementById('roomName');

  // Add an event listener to the form submit event
  form.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent the form from submitting

    // Get the input value and validate it
    const roomName = input.value.trim();
    if (!roomName) {
      input.classList.add('is-invalid');
      return;
    }

    // Create a new Room object
    const room = new Room(roomName);

    // Get the existing rooms array from session storage (or create a new one if it doesn't exist)
    const existingRooms = JSON.parse(sessionStorage.getItem('rooms') || '[]');

    // Add the new room to the existing rooms array
    existingRooms.push(room);

    // Save the updated rooms array back to session storage
    sessionStorage.setItem('rooms', JSON.stringify(existingRooms));

    // Clear the input and remove any validation classes
    input.value = '';
    input.classList.remove('is-invalid');

    window.location.reload();

  });

var cardContainer = document.querySelector(".otherRooms");

// Get the rooms array from sessionStorage
var rooms = JSON.parse(sessionStorage.getItem("rooms")) || [];

// Loop through the rooms array and create a card for each room
rooms.forEach((room) => {

  // Get card container and and create new card
  const cardContainer = document.querySelector(".otherRooms");
  const newCard = `
    <div class="col mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">${room.name}</h5>
          <a href="?page=room&room=${room.slug}" onClick="sessionStorage.setItem('current-room-name', '${room.name}')">
            <button class="btn btn-primary mt-2">Enter room</button>
          </a>
        </div>
      </div>
    </div>
  `;
  cardContainer.insertAdjacentHTML("beforeend", newCard);
});

// Add username to welcome message if the user has logged in
const username = sessionStorage.getItem('username');
const welcomeMessage = document.getElementById('welcome-message');
if (username) {
  welcomeMessage.innerText += ` ${username}!`;
}

</script>