const openBrandModal = document.getElementById("btnbr-opmodel");
const closeBrandModal = document.getElementById("btnbr-clmodel");
const cancelBrandModal = document.getElementById("btnbr-cslmodel");
const brandModal = document.getElementById("brandModal");

openBrandModal.addEventListener("click", function(){
    brandModal.classList.add("active");
});

closeBrandModal.addEventListener("click", function(){
    brandModal.classList.remove("active");
});

cancelBrandModal.addEventListener("click", function(){
    brandModal.classList.remove("active");
});

brandModal.addEventListener("click", function(e){
    if(e.target === brandModal){
        brandModal.classList.remove("active");
    }
});