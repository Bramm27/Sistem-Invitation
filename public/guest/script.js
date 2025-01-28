document.addEventListener('DOMContentLoaded', () => {
    const allStar = document.querySelectorAll('.rating .star');
    const ratingInput = document.querySelector('input[name="rating"]');
    const form = document.querySelector('form');

    allStar.forEach((item, idx) => {
        item.addEventListener('click', function () {
            let click = 0;
            ratingInput.value = idx + 1; // Set nilai rating sesuai dengan klik bintang

            allStar.forEach(i => {
                i.classList.replace('bxs-star', 'bx-star');
                i.classList.remove('active');
            });

            for (let i = 0; i < allStar.length; i++) {
                if (i <= idx) {
                    allStar[i].classList.replace('bx-star', 'bxs-star');
                    allStar[i].classList.add('active');
                } else {
                    allStar[i].style.setProperty('--i', click);
                    click++;
                }
            }
        });
    });

    form.addEventListener('submit', (e) => {
        // Validasi agar rating tidak kosong
        if (!ratingInput.value) {
            e.preventDefault();
            alert('Pilih rating sebelum mengirimkan review!');
        }
    });
});

// Fungsi reset form (jika tombol Cancel ditekan)
function resetForm() {
    document.querySelector('form').reset();
    document.querySelectorAll('.rating .star').forEach(star => {
        star.classList.replace('bxs-star', 'bx-star');
        star.classList.remove('active');
    });
}
