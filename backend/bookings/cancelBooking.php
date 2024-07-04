<?php
    include ('../connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $appointment_ID = $_POST['appointment_ID'];

        $stmt = $conn->prepare("DELETE FROM appointment WHERE appointment_ID = ?");
        $stmt->bind_param("i", $appointment_ID);

        if ($stmt->execute()) {
            echo "Appointment canceled successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    mysqli_close($conn);
?>