<?php
session_start();
include("../components/header.php");
include("../../backend/connect.php");
?>

<style>
    <?php include("../CSS/booking.css")?>
</style>

<main>
    <?php include("../components/side_navbar.php"); ?>
    <div>
        <h2>Add Appointment</h2>
        <form action="addBooking.php" method="POST">
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="input" required>
            </div>
            <div>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="input" required>
            </div>
            <div>
                <label for="contact_No">Contact Number:</label>
                <input type="text" id="contact_No" name="contact_No" class="input" required>
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="datetime-local" id="date" name="date" class="input" required>
            </div>
            <input type="submit" value="Add Appointment" name="submit" class="button">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $contact_No = $_POST['contact_No'];
            $date = $_POST['date'];

            $sql = "SELECT customer_ID FROM customer WHERE first_name='$first_name' AND last_name='$last_name'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $customer_ID = $row['customer_ID'];
                $update_sql = "UPDATE customer SET contact_No='$contact_No' WHERE customer_ID='$customer_ID'";
                $conn->query($update_sql);
            } else {
                $insert_sql = "INSERT INTO customer (first_name, last_name, contact_No) VALUES ('$first_name', '$last_name', '$contact_No')";
                if ($conn->query($insert_sql) === TRUE) {
                    $customer_ID = $conn->insert_id;
                } else {
                    echo "Error: " . $insert_sql . "<br>" . $conn->error;
                }
            }

            $appointment_sql = "INSERT INTO appointments (customer_ID, date) VALUES ('$customer_ID', '$date')";
            if ($conn->query($appointment_sql) === TRUE) {
                echo "New appointment added successfully";
            } else {
                echo "Error: " . $appointment_sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</main>

<?php include("../components/footer.php"); ?>
