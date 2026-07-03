// cars.js

let activeType = '';
let activeFuel = '';
let maxPriceMil = 3000;

function setType(event, t) {
    activeType = t;
    document.querySelectorAll('.quick-filters .pill').forEach(p => {
        p.classList.remove('active');
    });
    event.target.classList.add('active');
    filterCars();
}

function setFuel(f) {
    activeFuel = activeFuel === f ? '' : f;
    filterCars();
}

function updatePrice(val) {
    maxPriceMil = parseInt(val);
    const label = val >= 3000
        ? "≤ 3 tỷ"
        : `≤ ${(val/100).toFixed(1).replace(".0","")} tỷ`;
    document.getElementById("priceLabel").textContent = label;
    filterCars();
}

function filterCars() {
    const query = document.getElementById("searchInput").value.toLowerCase();
    const checkedBrands =
        [...document.querySelectorAll('input[name="brand"]:checked')]
        .map(i=>i.value);

    const checkedFuels =
        [...document.querySelectorAll('input[name="fuel"]:checked')]
        .map(i=>i.value);

    const checkedStatus =
        [...document.querySelectorAll('input[name="condition"]:checked')]
        .map(i=>i.value);

    let count = 0;
    document.querySelectorAll(".car-card").forEach(card=>{

        const brand = card.dataset.brand;
        const type = card.dataset.type;
        const fuel = card.dataset.fuel;
        const price = parseFloat(card.dataset.price);
        const year = parseInt(card.dataset.year);
        const status = card.querySelector(".badge-new")
            ? "available"
            : "sold";
        const name = card.querySelector(".car-name").textContent.toLowerCase();
        let show = true;
        if(query &&
            !name.includes(query) &&
            !brand.toLowerCase().includes(query))
            show = false;
        if(activeType && type !== activeType)
            show = false;
        if(activeFuel && fuel !== activeFuel)
            show = false;
        if(checkedBrands.length &&
            !checkedBrands.includes(brand))
            show = false;
        if(checkedFuels.length &&
            !checkedFuels.includes(fuel))
            show = false;
        if(checkedStatus.length &&
            !checkedStatus.includes(status))
            show = false;
        if(price > maxPriceMil)
            show = false;
        card.style.display = show ? "" : "none";
        if(show) count++;
    });

    document.getElementById("resultCount").textContent = count;
}

function sortCars(val){
    const grid=document.getElementById("carGrid");
    const cards=[...grid.querySelectorAll(".car-card")];
    cards.sort((a,b)=>{
        if(val==="price_asc")
            return parseFloat(a.dataset.price)-parseFloat(b.dataset.price);

        if(val==="price_desc")
            return parseFloat(b.dataset.price)-parseFloat(a.dataset.price);

        if(val==="year_desc")
            return parseInt(b.dataset.year)-parseInt(a.dataset.year);

        return 0;

    });
    cards.forEach(card=>grid.appendChild(card));
}
function clearFilter(name){
    document.querySelectorAll(`input[name="${name}"]`)
    .forEach(i=>i.checked=false);
    filterCars();
}
function closeCompare(){
    document.getElementById("compareBar")
    .classList.remove("visible");
}

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