const mainImage = document.getElementById("mainCarImage");
const thumbs = document.querySelectorAll(".thumb-img");
const prevBtn = document.getElementById("prevImg");
const nextBtn = document.getElementById("nextImg");
const imageCount = document.getElementById("imageCount");

let currentIndex = 0;

function showImage(index) {
    if (!mainImage || thumbs.length === 0) return;

    if (index < 0) {
        currentIndex = thumbs.length - 1;
    } else if (index >= thumbs.length) {
        currentIndex = 0;
    } else {
        currentIndex = index;
    }

    mainImage.src = thumbs[currentIndex].src;

    thumbs.forEach(img => img.classList.remove("active"));
    thumbs[currentIndex].classList.add("active");

    if (imageCount) {
        imageCount.innerText = (currentIndex + 1) + " / " + thumbs.length;
    }
}

if (thumbs.length > 0) {
    showImage(0);
}

thumbs.forEach((img, index) => {
    img.addEventListener("click", function () {
        showImage(index);
    });
});

if (prevBtn) {
    prevBtn.addEventListener("click", function () {
        showImage(currentIndex - 1);
    });
}

if (nextBtn) {
    nextBtn.addEventListener("click", function () {
        showImage(currentIndex + 1);
    });
}