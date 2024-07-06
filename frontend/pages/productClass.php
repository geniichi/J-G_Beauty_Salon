<?php include("../../backend/connect.php"); ?>
<style>
    <?php include("../CSS/productClass.css")?>
</style>

<?php
    echo (isset($_GET["productClass_active"])) ? '<div id="productClass_form_active">' : '<div id="productClass_form_hidden">';
?>
    <form action="../../backend/ProductClass.php" method="post" id="ProductClass_section">
        <div>
            <h1>Product Class</h1>
            <div>
                <?php
                    $sql = "SELECT * FROM productClass";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = "'" . $row["name"] . "'";
                        $ID = $row["class_ID"];

                        echo '
                            <div>
                                <input type="radio" id="class' .  $row["class_ID"] . '" name="classProduct" value="' . $row["name"] . '" onclick="updateclass(' . $name . ' , ' . $ID . ')">
                                <label for="class' .  $row["class_ID"] . '">' . $row["name"] . '</label>
                            </div>
                        ';
                    }
                    mysqli_close($conn);
                ?>
            </div>
        </div>
        <div>
            <div>
                <p>Add Class</p>
                <input type="text" name="addClass_name" id="ProductClassAdd" placeholder="Enter Product Class">
                <button type="submit" name="add_path" value="add_path">Add</button>
            </div>
            <div>
                <p>Update Supplier</p>
                <input type="text" name="updateProductClass" id="classUpdate" placeholder="Enter Product Class">
                <input type="hidden" name="update_ID" id="updateProductClass_ID">
                <button type="submit" name="update_path" value="update_path">Update</button>

            </div>
            <div>
                <p>Delete Supplier</p>
                <input type="text" name="deleteProductClass" id="ProductClassDelete" placeholder="Enter Product Class">
                <input type="hidden" name="delete_ID" id="deleteProductClass_ID">
                <button type="submit" name="delete_path" value="delete_path">Delete</button>
            </div>
        </div>
        <div id="productClass_close_form" onclick="closeForm()">
            <span class="material-symbols-outlined">
                close
            </span>
        </div>
    </form>

</div>
