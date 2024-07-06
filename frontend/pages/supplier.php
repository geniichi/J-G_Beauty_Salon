<?php include("../../backend/connect.php"); ?>
<style>
    <?php include("../CSS/supplier.css")?>
</style>

<?php
    echo (isset($_GET["supplier_active"])) ? '<div id="supplier_form_active">' : '<div id="supplier_form_hidden">';
?>
    <form action="../../backend/supplier.php" method="post" id="supplier_section">
        <div>
            <h1>Suppliers</h1>
            <div>
                <?php
                    $sql = "SELECT * FROM supplier";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = "'" . $row["name"] . "'";
                        $contact = "'" . $row["contact"] . "'";
                        $ID = $row["supplier_ID"];

                        echo '
                            <div>
                                <input type="radio" id="supplier' .  $row["supplier_ID"] . '" name="supplier" value="' . $row["name"] . '" onclick="updateSupplier(' . $name . ',' . $contact . ', ' . $ID . ')">
                                <label for="supplier' .  $row["supplier_ID"] . '">' . $row["name"] . '</label>
                            </div>
                        ';
                    }
                    mysqli_close($conn);
                ?>
            </div>
        </div>
        <div>
            <div>
                <p>Add Supplier</p>
                <div>
                    <input type="text" name="addSupplier_name" id="supplierAdd" placeholder="Enter Supplier Name">
                </div>
                <input type="text" id="add_contact" name="contact" placeholder="0917-123-4567" pattern="\d{4}-\d{3}-\d{4}">
                <button type="submit" name="add_path" value="add_path">Add</button>
            </div>
            <div>
                <p>Update Supplier</p>
                <div>
                    <input type="text" name="updateSupplier_name" id="supplierUpdate" placeholder="Enter Supplier Name">
                </div>
                <input type="text" id="update_contact" name="contact" placeholder="0917-123-4567" pattern="\d{4}-\d{3}-\d{4}">
                <input type="hidden" name="update_ID" id="updateSupplier_ID">
                <button type="submit" name="update_path" value="update_path">Update</button>

            </div>
            <div>
                <p>Delete Supplier</p>
                <input type="text" name="deleteSupplier_name" id="supplierDelete" placeholder="Enter Supplier Name">
                <input type="hidden" name="delete_ID" id="deleteSupplier_ID">
                <button type="submit" name="delete_path" value="delete_path">Delete</button>
            </div>
        </div>
        <div id="supplier_close_form" onclick="closeForm()">
            <span class="material-symbols-outlined">
                close
            </span>
        </div>
    </form>

</div>
