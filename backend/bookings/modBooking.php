<?php
    include ('../connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $appointment_ID = $_POST['appointment_ID'];
        $new_date = $_POST['new_date'];

        $stmt = $conn->prepare("UPDATE appointment SET date = ? WHERE appointment_ID = ?");
        $stmt->bind_param("si", $new_date, $appointment_ID);

        if ($stmt->execute()) {
            echo "Appointment modified successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    mysqli_close($conn);
?>
