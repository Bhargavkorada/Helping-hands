<?php
// Start the session
session_start();

// Check if the user is logged in
if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    // The user is logged in, enable the button
    $button_disabled = '';
	$text = "<b style='color: green';>Welcome </b><strong style='color:green'>" . $_SESSION['firstname'].'</strong>! Now you can Add Activity.';
} else {
    // The user is not logged in, disable the button
    $button_disabled = 'disabled';
	$text = 'Please <span style="color:red">Login</span> to Add Activity';
}
?>
<?php
// Check if registration success message exists in URL parameters
if (isset($_GET['registration']) && $_GET['registration'] === 'success') {
    // Display success message
    echo '<div id="successMessage" class="alert alert-success" role="alert">
              Your activity is added!
          </div>'
         ;
    echo '<script>
          setTimeout(function() {
              var successMessage = document.getElementById("successMessage");
              if (successMessage) {
                  successMessage.remove();
              }
          }, 5000); // 5000 milliseconds = 5 seconds
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
	<!-- icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous" />
	<!-- bootstrap cdn -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--  our stylesheet -->
	<link rel="stylesheet" href="style.css">
	<title>Activities</title>
	
</head>

<body>
	<header style="text-align: center; padding: 1em;">
        <h2>Helping hands Network</h2>
        <p>Welcome volunteers!
			Let's Join Together🤝
		</p>
    </header>
	<table align="right"><tr><td align="right"><button type="button" id="myButton" class="btn btn-primary rounded-pill" align="right" data-bs-toggle="modal" data-bs-target="#staticBackdrop" <?php echo $button_disabled; ?>><i class="fas fa-plus"></i> Add Activity</button>
	</td></tr></table>
	<marquee direction="right" behavior="alternate"><?php echo $text; ?></marquee>
	

	<div class="container">
		<section>
			<div class="row card-container mt-5 mb-3 ">
				<?php
				 include 'retrieve_data.php'; 
				 ?>


		        </div>
		</section>
	</div>
    <footer>
		<p>&copy; 2024 helping hands network. All rights reserved.</p>
	</footer>

	<!--Navbar Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Add New Activity</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="store_data.php" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="imageurl" class="form-label">Image upload</label>
							<input type="file" name="photo" accept="image/*">
						</div>
						<div class="mb-3">
							<label for="title" class="form-label">Location</label>
							<input type="text" class="form-control" id="title" name="location" placeholder="eg:vizianagram,clock tower">
						</div>
						<div class="mb-3">
							<label for="type" class="form-label">Timings</label>
							<input type="datetime-local" class="form-control" id="type" name="timings" placeholder="add date and time">
						</div>
						<div class="mb-3">
							<label for="description" class="form-label">Description</label>
							<textarea rows="4" class="form-control" id="description" name="description" placeholder="Add detailed description of the activity..."></textarea>
						</div>
						<div class="mb-3">
						<label for="type" class="form-label">Contact Number</label>
							<input type="number" class="form-control" id="type" name="number" placeholder="7842167728">
						</div>
						
					
					
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add Activity</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	
	<footer>
		<p>&copy; 2024 helping hands network. All rights reserved.</p>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
</body>
</html>