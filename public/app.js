const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const sign_in_form = document.querySelector(".sign-in-form");
const sign_up_form = document.querySelector(".sign-up-form");

sign_up_btn.addEventListener("click", () => {
  sign_in_form.style.opacity = 0;
  sign_up_form.style.opacity = 1;
  sign_in_form.style.zIndex = 1;
  sign_up_form.style.zIndex = 2;
});

sign_in_btn.addEventListener("click", () => {
  sign_in_form.style.opacity = 1;
  sign_up_form.style.opacity = 0;
  sign_in_form.style.zIndex = 2;
  sign_up_form.style.zIndex = 1;
});
