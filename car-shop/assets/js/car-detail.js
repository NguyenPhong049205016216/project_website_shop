// user
document.addEventListener("DOMContentLoaded",()=>{
    document.querySelectorAll(".wishlist-btn").forEach(btn=>{
        btn.addEventListener("click",(e)=>{
            e.stopPropagation();
            btn.textContent =
                btn.textContent==="♡"
                ? "♥"
                : "♡";
            btn.style.color =
                btn.textContent==="♥"
                ? "#C0392B"
                : "";
        });

    });

});