const hamBtn = document.querySelector("#hamburger");
const hamContainer = document.querySelector("#ham-nav");

hamBtn.addEventListener("click", function () {
    hamContainer.classList.toggle("nav-active");
    hamBtn.classList.toggle("ham-active");
});

const userDropDown = document.querySelector("#user-dropdown");
const userArrow = document.querySelector("#user-arrow");
const userContainer = document.querySelector("#user-container");

userDropDown.addEventListener("click", function () {
    userContainer.classList.toggle("user-container-active");
    userArrow.classList.toggle("user-arrow-down");
});

// Tutup dropdown jika klik di luar elemen dropdown
document.addEventListener("click", function (event) {
    const isClickInside =
        userContainer.contains(event.target) ||
        userDropDown.contains(event.target);

    if (!isClickInside) {
        userContainer.classList.remove("user-container-active");
        userArrow.classList.remove("user-arrow-down");
    }
});

// Tutup nav jika klik di luar hamburger dan menu
document.addEventListener("click", function (event) {
    const isClickInside =
        hamContainer.contains(event.target) || hamBtn.contains(event.target);

    if (!isClickInside) {
        hamContainer.classList.remove("nav-active");
        hamBtn.classList.remove("ham-active");
    }
});
