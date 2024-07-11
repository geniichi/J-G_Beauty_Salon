<?php
include("../components/header.php");
include("../../backend/connect.php");
?>

<main>
    <?php include("../components/side_navbar.php"); ?>
    <div>
        <h2>Appointments</h2>
        <a href="addBooking.php">Add Appointment</a>
        <br><br>
        <table id="appointmentsTable">
            <tr>
                <th>Appointment ID</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT a.appointment_ID, a.date, c.first_name, c.last_name
                    FROM appointments AS a
                    JOIN customer AS c ON a.customer_ID = c.customer_ID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['appointment_ID'] . "</td>";
                    echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo '<td>
                            <form method="POST" action="../../backend/deleteBooking.php" onsubmit="return confirmDelete();">
                                <input type="hidden" name="appointment_ID" value="' . $row['appointment_ID'] . '">
                                <button type="submit">Delete</button>
                            </form>
                        </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No appointments found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</main>

<?php include("../components/footer.php"); ?>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this appointment?");
}
</script>
