const fileInput = document.querySelector('input[name="main_image"]');
    const previewImg = document.querySelector('.preview-img');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            previewImg.src = URL.createObjectURL(file);
        }
    });