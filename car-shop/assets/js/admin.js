// brands
const openBrandModal = document.getElementById("btnbr-opmodel");
const closeBrandModal = document.getElementById("btnbr-clmodel");
const cancelBrandModal = document.getElementById("btnbr-cslmodel");
const brandModal = document.getElementById("brandModal");

if (openBrandModal && brandModal) {
    openBrandModal.addEventListener("click", function(){
        brandModal.classList.add("active");
    });
}
if (closeBrandModal && brandModal) {
    closeBrandModal.addEventListener("click", function(){
        brandModal.classList.remove("active");
    });
}
if (cancelBrandModal && brandModal) {
    cancelBrandModal.addEventListener("click", function(){
        brandModal.classList.remove("active");
    });
}
if (brandModal) {
    brandModal.addEventListener("click", function(e){
        if(e.target === brandModal){
            brandModal.classList.remove("active");
        }
    });
}
// order
const orderModal = document.getElementById("orderModal");
const btnOrderOpen = document.getElementById("btn-order-open");
const btnOrderClose = document.getElementById("btn-order-close");
const btnOrderCancel = document.getElementById("btn-order-cancel");

if (btnOrderOpen && orderModal) {
    btnOrderOpen.addEventListener("click", function () {
        orderModal.classList.add("active");
    });
}
if (btnOrderClose && orderModal) {
    btnOrderClose.addEventListener("click", function () {
        orderModal.classList.remove("active");
    });
}
if (btnOrderCancel && orderModal) {
    btnOrderCancel.addEventListener("click", function () {
        orderModal.classList.remove("active");
    });
}
if (orderModal) {
    orderModal.addEventListener("click", function(e){
        if(e.target === orderModal){
            orderModal.classList.remove("active");
        }
    });
}