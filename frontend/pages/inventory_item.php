<?php
include("../components/header.php");
include("../../backend/connect.php");

if (!isset($_GET['id'])) {
    echo "No product ID provided.";
    exit();
}

$product_ID = $_GET['id'];

$sql = "SELECT * FROM inventoryitem WHERE product_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Product not found.";
    exit();
}

$row = $result->fetch_assoc();
?>

<style>
    <?php include("../CSS/inventory.css")?>
</style>

<main>
    <?php
    include("../components/side_navbar.php");
    ?>
    <div class="inventory-item-details">
        <h2>Inventory Item Details</h2>
        <div class="inventory-item-row">
            <strong>ID:</strong> <span><?php echo $row["product_ID"]; ?></span>
        </div>
        <div class="inventory-item-row">
            <strong>Name:</strong> <span><?php echo $row["product_name"]; ?></span>
        </div>
        <div class="inventory-item-row">
            <strong>Supplier:</strong> <span><?php echo $row["supplier_ID"]; ?></span>
        </div>
        <div class="inventory-item-row">
            <strong>Class:</strong> <span><?php echo $row["productClass_ID"]; ?></span>
        </div>
        <div class="inventory-item-row">
            <strong>Quantity:</strong> <span><?php echo $row["quantity"]; ?></span>
        </div>
        <div class="inventory-item-row">
            <strong>Price:</strong> <span><?php echo $row["price"]; ?></span>
        </div>
        <div class="inventory-item-row">
            <strong>Description:</strong> <span><?php echo $row["description"]; ?></span>
        </div>
    </div>
</main>

<?php
include("../components/footer.php");
$stmt->close();
$conn->close();
?>
