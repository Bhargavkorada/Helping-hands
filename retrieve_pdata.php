<?php
include('database.php');

// Fetch data from the database
$sql = "SELECT * FROM problem";
$result = $mysqli->query($sql);

// Close the database connection
$mysqli->close();
?>

<!-- HTML/PHP code to display the fetched data as cards -->

    <?php
    while ($row = $result->fetch_assoc()) {
        // Extract data from the row
        $location = $row['location'];
        $number = $row['number'];
        $description = $row['description'];

        // Display data as a card inside the target div with class "card-container"
        ?>
        
           <div class="col-lg-12"  >
<div class="card m-2" style="width: 80rem;" >
  
        
  <div class="card-body">
  <p class="card-text"><b>Problem : </b><?php echo $description; ?></p>
    <p class="card-title"><b>Location : </b><?php echo $location; ?></p>
    <p class="card-text"><b>Phone Number : </b><?php echo $number; ?></p>
  </div>
    </div>
</div>
        <?php
    }
    ?>

