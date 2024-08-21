<?php
include('database.php');

// Fetch data from the database
$sql = "SELECT * FROM activity";
$result = $mysqli->query($sql);

// Get current time and calculate one day after
$current_time = time();
$one_day_after = strtotime('+1 day', $current_time);

// Loop through each fetched row
while ($row = $result->fetch_assoc()) {
    // Extract data from the row
    $location = $row['location'];
    $timings = strtotime($row['timings']); // Convert timings to a UNIX timestamp
    $description = $row['description'];
    $photoData = $row['photo'];
    $number = $row['number'];
    
    // Check if timings have passed for more than one day
    if ($current_time > $timings + 24 * 3600) {
        // Delete the card from the database
        $delete_sql = "DELETE FROM activity WHERE id = " . $row['id'];
        $mysqli->query($delete_sql);
    } else {
        // Display the card
        ?>
        <div class="col-lg-4 col-md-6">
            <div class="card m-2" style="width: 22rem; height: 600px;">
                <div class="card-header d-flex justify-content-end gap-2"></div>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($photoData); ?>" class="card-img-top" alt="Image is not uploaded.">
                <div class="card-body">
                    <p class="card-text"><b>Description : </b><?php echo $description; ?></p>
                    <p class="card-title"><b>Location : </b><?php echo $location; ?></p>
                    <p class="card-text"><b>Timings : </b><?php echo date("Y-m-d H:i:s", $timings); ?></p>
                    <p class="card-title">For any details contact : <?php echo $number; ?></p>
                </div>
            </div>
        </div>
        <?php
    }
}

// Close the database connection
$mysqli->close();
?>
