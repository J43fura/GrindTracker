try {
  const checkbox = document.getElementById("checkbox");
} catch (e) {
  console.log(e);
}
checkbox.addEventListener("change", () => {
  try {
    document.querySelector(".TitleGT1-d").classList.toggle("dark-text-b");
  } catch (e) {
    console.log(e);
  }
  try {
    document.querySelector(".login").classList.toggle("dark-container");
  } catch (e) {
    console.log(e);
  }
  try {
    document.querySelector(".main-footer").classList.toggle("dark-footer");
  } catch (e) {
    console.log(e);
  }
  try {
    document.querySelector(".div-about").classList.toggle("dark-about");
  } catch (e) {
    console.log(e);
  }
  try {
    document.querySelector(".dark-t-w").classList.toggle("dark-text-w");
  } catch (e) {
    console.log(e);
  }
  try {
    document.querySelector(".dark-h").classList.toggle("dark-header");
  } catch (e) {
    console.log(e);
  }

  document.querySelector(".nav a").classList.toggle("dark-text-w");
  // .nav a > .dark-t-w

  const darke = document.querySelectorAll(".nav-elements");
  for (let i = 0; i < darke.length; i++) {
    darke[i].classList.toggle("dark-text-w");
  }

  try {
    const darkt = document.querySelectorAll(".dark-t");
    for (let i = 0; i < darkt.length; i++) {
      darkt[i].classList.toggle("dark-text");
    }
  } catch (e) {
    console.log(e);
  }
  document.querySelector(".nav a").classList.toggle("dark-text-w");
});

btnRegister.addEventListener("click", () => {});

btnLogin.addEventListener("click", () => {});
