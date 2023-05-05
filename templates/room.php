<div class="container h-100">
  <div class="container-fluid ">
    <h1 id="room-name" class="text-center my-5"></h1>
    <h3 id="room-subtitle" class="p-0"></h3>
  </div>

  <div class="container-fluid">
    <div class="row">

      <div id ="newMessage" class="pt-5 col-md-3">
        <div class="card">
          <form class="p-3" id="addMessageForm">
            <div class="mb-3">
              <label for="message" class="form-label">Write a new message to post</label>
              <textarea type="text" class="form-control" id="message" aria-describedby="message" placeholder="You can write your message here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" >Post new message</button>
          </form>
        </div>
      </div>

      <div class="col-md-9 pt-5" id="message-board">

        <div class="card col-12 mb-2">
          <div class="card-body">
            <h5 class="card-title">(Malfoy and his goonies have left the room) Good ridance ! </h5>
            <h6 class="card-subtitle my-3 text-body-secondary">Ron W<span class="badge rounded-pill text-bg-secondary mx-3">02/05/2023 12:49:32</span></h6>
          </div>
        </div>

        <div class="card col-12 my-2">
          <div class="card-body">
            <h5 class="card-title">My father will hear about his Potter ! Crabbe. Goyle. Let's go !</h5>
            <h6 class="card-subtitle my-3 text-body-secondary">Malfoy<span class="badge rounded-pill text-bg-secondary mx-3">02/05/2023 12:41:57</span></h6>
          </div>
        </div>

        <div class="card col-12 my-2">
          <div class="card-body">
            <h5 class="card-title">Hey Harry! ... what's up with Malfoy ?</h5>
            <h6 class="card-subtitle my-3 text-body-secondary">Ron W<span class="badge rounded-pill text-bg-secondary mx-3">02/05/2023 12:40:22</span></h6>
          </div>
        </div>

        <div class="card col-12 my-2">
          <div class="card-body">
            <h5 class="card-title">Oh hi Harry :)</h5>
            <h6 class="card-subtitle my-3 text-body-secondary">Hermione<span class="badge rounded-pill text-bg-secondary mx-3">02/05/2023 12:32:10</span></h6>
          </div>
        </div>

        <div class="card col-12 my-2">
          <div class="card-body">
            <h5 class="card-title">My name is harry potter.</h5>
            <h6 class="card-subtitle my-3 text-body-secondary">Harry Potter<span class="badge rounded-pill text-bg-secondary mx-3">02/05/2023 12:30:47</span></h6>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

<script type="module" src="./templates/js/user.js"></script>
<script type="module" src="./templates/js/message.js"></script>

<script>
  // Add room name to titles
  const current_room_name = sessionStorage.getItem('current-room-name');
  const room_name_element = document.getElementById('room-name');
  const room_name_subtitle = document.getElementById('room-subtitle');

  if (current_room_name) {
    room_name_element.innerText += `${current_room_name}`;
    room_name_subtitle.innerText += `Post new message to the ${current_room_name} board :`;
  }

  // Get message input and add to page
  const outputDiv = document.getElementById("message-board");
  const username = sessionStorage.getItem('username');
  console.log(username)

  const newMessageForm = document.getElementById('addMessageForm');
  newMessageForm.addEventListener('submit', function(e) {
    // Prevent the form from submitting normally to avoid redirect
    e.preventDefault();

    const userInput = document.getElementById('message').value;

    // Create a new Message object 
    const user = new User(username);
    const message = new Message(userInput, user);

    console.log(message)
    // const newText = document.createTextNode(textInput.value);

    const newMessageCard = `
    <div class="card col-12 mb-2">
      <div class="card-body">
        <h5 class="card-title">${message.content}</h5>
        <h6 class="card-subtitle my-3 text-body-secondary">
          ${message.sender.username}
          <span class="badge rounded-pill text-bg-secondary mx-3">${message.posted_on}</span>
        </h6>
      </div>
    </div>
    `;
    outputDiv.innerHTML = newMessageCard + outputDiv.innerHTML;

    userInput.value = '';

  });

</script>

<style>
  #message-board{
    overflow:auto;
    max-height:75%;
  }
</style>