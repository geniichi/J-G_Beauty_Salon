
function showLogOut(){
    const dropdown = document.getElementById('header-account-dropdown');
    dropdown.classList.toggle('active');
}

function noDefualt(event){
    event.preventDefault();
}

function redirectToPage(product_ID) {
    window.location.href = "../pages/singleProduct.php?product_ID=" + product_ID;
}

function updateSupplier(name, contact, ID) {
    const update_input = document.getElementById("supplierUpdate");
    const delete_input = document.getElementById("supplierDelete");
    const update_contact_input = document.getElementById("update_contact");
    const update_ID = document.getElementById("updateSupplier_ID");
    const delete_ID = document.getElementById("deleteSupplier_ID");
    update_input.value = name;
    delete_input.value = name;
    update_contact_input.value = contact;
    update_ID.value = ID;
    delete_ID.value = ID;
}
function updateclass(name, ID) {
    const update_input = document.getElementById("classUpdate");
    const delete_input = document.getElementById("ProductClassDelete");
    const update_ID = document.getElementById("updateProductClass_ID");
    const delete_ID = document.getElementById("deleteProductClass_ID");
    update_input.value = name;
    delete_input.value = name;
    update_ID.value = ID;
    delete_ID.value = ID;
}

function open_supplierForm(){
    window.location = "http://localhost:3000/frontend/pages/addProduct.php?supplier_active=1";
}
function open_productClass_form(){
    window.location = "http://localhost:3000/frontend/pages/addProduct.php?productClass_active=1";
}
function closeForm1(){
    window.location = "http://localhost:3000/frontend/pages/addProduct.php";
}

function open_supplierForm2(ID){
    window.location = "http://localhost:3000/frontend/pages/singleProduct.php?product_ID=" + ID + "&supplier_active=1";
}
function open_productClass_form2(ID){
    window.location = "http://localhost:3000/frontend/pages/singleProduct.php?product_ID=" + ID + "&productClass_active=1";
}
function closeForm2(ID){
    window.location = "http://localhost:3000/frontend/pages/singleProduct.php?product_ID=" + ID;
}

function previewImage(event) {
    const file = event.target.files[0];
    const img_container = document.getElementById('img-showcase-container');
    const img_upload = document.getElementById('img-uploader');
    const img_upload_text = document.getElementById('img-uploader-text');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = document.getElementById('img-showcase');
            imgPreview.src = e.target.result;
            img_container.style.display = "flex";
            img_upload.style.marginTop = "0rem";
            img_upload_text.style.display = "none";
        }
        reader.readAsDataURL(file);
    } else {
        img_container.style.display = "none";
        img_upload.style.marginTop = "6rem";
        img_upload_text.style.display = "inline";
    }
}

function changeImage(event) {
    const file = event.target.files[0];
    if(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = document.getElementById('img-showcase');
            imgPreview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

function removeImage(){
    const img_container = document.getElementById('img-showcase-container');
    const img_upload = document.getElementById('img-uploader');
    const img_upload_text = document.getElementById('img-uploader-text');
    const imgPreview = document.getElementById('img-showcase');
    const fileInput = document.getElementById('file-input');

    fileInput.value = '';

    img_container.style.display = "none";
    img_upload.style.marginTop = "2rem";
    img_upload_text.style.display = "inline";

    imgPreview.src = '';
}

function increase_quantity(){
    const $quantity_input = document.getElementById('quantity_amount');
    $quantity_input.value++;
}

function decrease_quantity(){
    const $quantity_input = document.getElementById('quantity_amount');
    if($quantity_input.value > 1){
        $quantity_input.value--;
    }
}

function toggleOrderDropdown(id) {
    const orderDropdown = document.getElementById('order_row' + id);

    if (orderDropdown.classList.contains('show')) {
        orderDropdown.style.height = orderDropdown.scrollHeight + 'px';
        requestAnimationFrame(() => {
            orderDropdown.style.height = '0';
            orderDropdown.style.opacity = '0';
        });
        orderDropdown.addEventListener('transitionend', function handleTransitionEnd() {
            orderDropdown.classList.remove('show');
            orderDropdown.style.display = 'none';
            orderDropdown.removeEventListener('transitionend', handleTransitionEnd);
        });
    } else {
        orderDropdown.style.display = 'flex';
        requestAnimationFrame(() => {
            orderDropdown.classList.add('show');
            orderDropdown.style.height = orderDropdown.scrollHeight + 'px';
            orderDropdown.style.opacity = '1';
        });
        orderDropdown.addEventListener('transitionend', function handleTransitionEnd() {
            orderDropdown.style.height = 'auto';
            orderDropdown.removeEventListener('transitionend', handleTransitionEnd);
        });
    }
}

function toggleProductCheckbox(event, id, price) {
    const checkbox = document.getElementById('product' + id);
    const total_price_input = document.getElementById('total_price');

    if (!event.target.matches('input[type="checkbox"]')) {
        checkbox.checked = !checkbox.checked;
    }

    if (checkbox.checked) {
        total_price_input.value = parseFloat(total_price_input.value) + parseFloat(price);
    } else {
        total_price_input.value = parseFloat(total_price_input.value) - parseFloat(price);
    }
}

function clearSelections() {
    document.getElementById('total_price').value = '0';

    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });
}
