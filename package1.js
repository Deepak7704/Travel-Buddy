document.addEventListener('DOMContentLoaded', function () {
    const loadMoreBtn = document.querySelector('.load-more .btn');
    const hiddenBoxes = document.querySelectorAll('.box.hidden');

    let currentIndex = 0;
    const boxesPerLoad = 3;

    function showMoreBoxes() {
        for (let i = currentIndex; i < currentIndex + boxesPerLoad; i++) {
            if (hiddenBoxes[i]) {
                hiddenBoxes[i].classList.remove('hidden');
            }
        }
        currentIndex += boxesPerLoad;

        if (currentIndex >= hiddenBoxes.length) {
            loadMoreBtn.style.display = 'none';
        }
    }

    loadMoreBtn.addEventListener('click', showMoreBoxes);
});
