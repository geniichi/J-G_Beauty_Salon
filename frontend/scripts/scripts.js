
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
function closeForm(){
    window.location = "http://localhost:3000/frontend/pages/addProduct.php";
}

function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = document.getElementById('img-showcase');
            const img_container = document.getElementById('img-showcase-container');
            imgPreview.src = e.target.result;
            img_container.style.display = "block";
        }
        reader.readAsDataURL(file);
    } else {
        const img_container = document.getElementById('img-showcase-container');
        img_container.style.display = "none";
    }
}
