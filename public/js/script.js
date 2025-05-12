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
