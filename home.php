
<?php
// Check if registration success message exists in URL parameters
if (isset($_GET['registration']) && $_GET['registration'] === 'success') {
    // Display success message
    echo '<div id="successMessage" class="alert alert-success" role="alert">
              You are successfully registered!
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
<?php
// Check if error message exists in URL parameters
if (isset($_GET['error']) && $_GET['error'] === 'duplicate_email') {
    // Display error message
    echo '<div id="emailreg" class="alert alert-danger" role="alert">
              Email already registered!
          </div>';
          echo '<script>
          setTimeout(function() {
              var successMessage = document.getElementById("emailreg");
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <title>Home</title>
 
  <style>
     img {
    transition: transform 0.3s ease-in-out;
  }
  
  /* Define hover effect */
  img:hover {
    transform: scale(1.1);
  }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 10px;
        box-sizing: border-box;
    }
    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1em;
    }
    main {
        padding: 20px;
    }
    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1em;
        position: relative;
        width: 100%;
    }
    
      .modal-content {
        background-color: cornsilk;
      }
      .navbar-nav .nav-item a {
        text-decoration: none; /* Remove default underline */
      }
  
      .navbar-nav .nav-item a:hover {
        text-decoration: underline; /* Add underline on hover */
      }
      .navbar-nav .nav-item.active a {
        font-weight: bold; /* Add bold font to the active link */
      }
  
</style>
</head>
<body>
    <header>
        <h1>Helping hands Network</h1>
        <p>Welcome volunteers!</p>
    </header>




<!-- Button trigger modal -->

<!-- Sign In/Register Modal -->
<div class="modal fade" id="signInRegisterLogoutModal" tabindex="-1" role="dialog" aria-labelledby="signInRegisterLogoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signInRegisterLogoutModalLabel">Sign In / Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Bootstrap Nav tabs -->
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="signIn-tab" data-toggle="tab" href="#signIn" role="tab" aria-controls="signIn" aria-selected="true">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
          </li>
        </ul>

        <!-- Bootstrap Tab panes -->
        <div class="tab-content">
          <div class="tab-pane fade show active" id="signIn" role="tabpanel" aria-labelledby="signIn-tab">
            <form method="post" id="loginForm">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your Email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
              </div>
              <button type="submit" class="btn btn-primary" id="signin">Sign In</button>
            </form>
          </div>
          <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <form method="post" action="register.php">
              <div class="form-group">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter your First Name">
              </div>
              <div class="form-group">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter your LastName">
              </div>
              <div class="form-group">
                <label for="newPassword">Password</label>
                <input type="password" class="form-control" name="newPassword" placeholder="Enter your password">
              </div>
              <div class="form-group">
                <label for="cPassword"> Re-Enter Password</label>
                <input type="password" class="form-control" name="cPassword" placeholder="Re-Enter your password">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email">
              </div>
              <div class="form-group">
                <label for="type" class="form-label">Contact Number</label>
							<input type="number" class="form-control" id="type" name="number" placeholder="7842167728">
						
              </div>
              <div id="error-message" class="text-danger"></div> 
              <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="container-fluid"> <a class="navbar-brand  fw-bold text-primary" href="#"><img src="https://png.pngtree.com/png-vector/20220322/ourmid/pngtree-colorful-helping-hand-community-concept-design-vector-symbol-blue-caucasian-vector-png-image_21785836.png" width="90px" height="60px" alt="Eco warriors"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Home</a> 
                </li>
                <li class="nav-item"> <a class="nav-link " aria-current="page" href="index.php">Activities</a> 
                </li>
                <li class="nav-item"> <a class="nav-link " aria-current="page" href="problem.php">Problems</a> 
                </li>
                <li class="nav-item"> <a class="nav-link " aria-current="page" href="donation.html">Donations</a> 
                </li>
            </ul>
            <button type="button" class="btn btn-primary" id="signInRegisterButton" data-toggle="modal" data-target="#signInRegisterLogoutModal">Sign In / Register</button>
           </div>
    </div>
</nav>
<section>
    <h2>VOLUNTEERISM</h2>
    <p>&emsp;&emsp;<span style="font-size:20px;">volunteerism</span> and voluntary activities is understood to be “a wide range of activities undertaken of free will, for the general public good, for which monetary reward is not the principal motivating factor”.It is the principle of donating time and energy towards a greater cause. Volunteers help change the lives of those in their community as a social responsibility rather than receiving a financial reward.</p>
    <p>These are the activities to be performed as a volunteer.</p>
    <div style="float:left; width=20%; padding: 10px;">
      <img src="volunteer1.jpg"></div>
      <div style="float:left; width=20%; padding: 10px;"> 
      <img src="volunteer2.jpg"></div>
      <div style="float:left; width=20%; padding: 10px;">
      <img src="volunteer3.jpg"></div>
      <div style="float:left; width=20%; padding: 10px;">
      <img src="volunteer4.jpg"></div>
      <div style="float:left; width=20%; padding: 10px;">
      <img src="volunteer5.jpg"></div>
 </section>
    <br></br><b<br></br></br><br></br><br></br><br></br><br></br><br></br><br></br><br><br></br><br></br>

<section>
    <h2>About </h2>
    <p>&emsp;&emsp;The main moto of this website is to fullfill the gap between the people who are willing to help to the society  individually or volunteralry who wish to contribute to their communities through volunteering and organizations in need of such assistance.
      This website aims to address those challenges by creating a user-friendly and comprehensive platform that connects volunteers with meaninigful opportunuties and empowers organizations to effectively manage their volunteer programs.
    </p>
</section>

<section>
    <h2>Contact Us</h2>
    <p>please contact use for any information</p>
    <P>call : +917842193379</P>
    <P>whatsapp : +918019579153</P>
    <p>Email: volunteersproject97@gmail.com</p>
    
</section>
<footer>
    <p>&copy; 2024 helping hands network. All rights reserved.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    // Function to update the button text based on login status
    function updateButton() {
        var isLoggedIn = sessionStorage.getItem('isLoggedIn');
        if (isLoggedIn === 'true') {
            $('#signInRegisterButton').text('Logout');
        } else {
            $('#signInRegisterButton').text('Sign In / Register');
        }
    }

    // Update the button text when the page loads
    updateButton();

    // Event listener for login form submission
    $('#loginForm').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Perform AJAX login request
        $.ajax({
            url: 'login.php', // Replace with the actual path to your login script
            type: 'POST',
            data: $(this).serialize(), // Serialize form data
            dataType: 'text', // Expect text response
            success: function (response) {
                // If login is successful, update the login status and button text
                if (response.trim() !== "Invalid password" && response.trim() !== "Email not found") {
                    sessionStorage.setItem('isLoggedIn', 'true');
                    updateButton();
                    // Hide the modal if it's still visible
                    $('#signInRegisterLogoutModal').modal('hide');
                } else {
                  $('#signInRegisterLogoutModal').modal('hide');
                  const errorMessageDiv = document.createElement('div');
                  errorMessageDiv.className = 'alert alert-danger';
                  errorMessageDiv.textContent = 'Your credentials are wrong.';
                  document.body.insertBefore(errorMessageDiv, document.body.firstChild);
                  setTimeout(function() {
            errorMessageDiv.remove();
        }, 5000);
                }
            },
            error: function () {
              $('#signInRegisterLogoutModal').modal('hide');
                  const errorMessageDiv = document.createElement('div'); 
                  errorMessageDiv.className = 'alert alert-danger';
                  errorMessageDiv.textContent = 'Your credentials are wrong.';
                  document.body.insertBefore(errorMessageDiv, document.body.firstChild);
                  setTimeout(function() {
            errorMessageDiv.remove();
        }, 5000);
            }
        });
    });

    // Event listener for the Sign In / Register button click
    $('#signInRegisterButton').on('click', function () {
        var isLoggedIn = sessionStorage.getItem('isLoggedIn');
        if (isLoggedIn === 'true') {
            // If logged in, perform logout
            // Perform AJAX logout request
            $.ajax({
                url: 'Logout.php', // Replace with the actual path to your logout script
                type: 'GET',
                success: function () {
                    // After successful logout, update the login status and button text
                    sessionStorage.setItem('isLoggedIn', 'false');
                    updateButton();
                    // Hide the modal if it's still visible
                    $('#signInRegisterLogoutModal').modal('show');
                },
                error: function () {
                    console.error('Error logging out');
                }
            });
        } else {
            // If not logged in, show the Sign In / Register modal
            $('#signInRegisterLogoutModal').modal('show');
        }
    });
});


</script>



</body>
</html>
