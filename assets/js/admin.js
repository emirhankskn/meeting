document.addEventListener("DOMContentLoaded", function () {
    const navOptions = document.querySelectorAll(".nav-option");

    navOptions.forEach(option => {
        option.addEventListener("click", function () {
            const url = this.getAttribute("data-url");
            window.location.href = url;
        });
    });

    const currentPage = window.location.href;
    navOptions.forEach(option => {
        const url = option.getAttribute("data-url");
        if (currentPage.includes(url)) {
            option.classList.add("active");
        }
    });
});
