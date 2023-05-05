<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 mt-5">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">Login</h3>
				</div>
				<div class="card-body">
					<form id="loginForm">
						<div class="form-group mb-3">
							<label for="username">Username:</label>
							<input type="text" class="form-control" id="username" name="username" required>
						</div>
						<button type="submit" class="btn btn-primary ">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="templates/js/user.js"></script>
<script>
  
	const form = document.getElementById('loginForm');
	form.addEventListener('submit', function(e) {
    // Prevent the form from submitting normally to avoid redirect
		e.preventDefault();
		const username = document.getElementById('username').value;

    // Create a new User object with the username
    const user = new User(username);

    // Save the username to sessionStorage
		sessionStorage.setItem('username', username);
		window.location.href = '?page=home';
	});
  
</script>
