

<style>
    <?php include("../CSS/delete_warningOrder.css")?>
</style>


<div id="deleteOrder_warning">
    <form action="../../backend/change_order.php" method="POST">
        <h2>Are you sure you mark this order as done?</h2>
        <div>
            <p onclick="hideWarningDeleteOrder()">No</p>
            <button name="Delete" value="Delete">Yes</button>
        </div>
        <input type="hidden" name="cart_ID" id="cart_ID" value="">
    </form>
</div>
