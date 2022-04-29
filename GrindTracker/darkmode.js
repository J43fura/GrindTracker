let darkMode = localStorage.getItem("darkMode");
const darkModeToggle = document.getElementById("darkmode");

const enableDarkMode = () => {
  try {
    const darke = document.querySelectorAll(".TitleGT1-d");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-text-b");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".login");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-container");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".main-footer");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-footer");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".div-about");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-about");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".dark-t-w");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-text-w");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".dark-h");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-header");
    }
  } catch (e) {
    console.log(e);
  }

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

  try {
    const darke = document.querySelectorAll(".vars");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-container");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".listing li");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-var");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".calendar");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-container");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".todo-div");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-container");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll("#todoinput");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-var");
    }
  } catch (e) {
    console.log(e);
  }

  localStorage.setItem("darkMode", "enabled");
};
const disableDarkMode = () => {
  try {
    const darke = document.querySelectorAll(".TitleGT1-d");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-text-b");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".login");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-container");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".main-footer");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-footer");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".div-about");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-about");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".dark-t-w");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-text-w");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".dark-h");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-header");
    }
  } catch (e) {
    console.log(e);
  }

  const darke = document.querySelectorAll(".nav-elements");
  for (let i = 0; i < darke.length; i++) {
    darke[i].classList.remove("dark-text-w");
  }

  try {
    const darkt = document.querySelectorAll(".dark-t");
    for (let i = 0; i < darkt.length; i++) {
      darkt[i].classList.remove("dark-text");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".vars");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-container");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".listing li");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-var");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".calendar");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-container");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll(".todo-div");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-container");
    }
  } catch (e) {
    console.log(e);
  }

  try {
    const darke = document.querySelectorAll("#todoinput");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.remove("dark-var");
    }
  } catch (e) {
    console.log(e);
  }

  localStorage.setItem("darkMode", null);
};

if (darkMode === "enabled") {
  console.log(darkMode);
  darkModeToggle.checked = true;
  enableDarkMode();
}

darkModeToggle.addEventListener("change", () => {
  let darkMode = localStorage.getItem("darkMode");
  console.log(darkMode);
  if (darkMode !== "enabled") {
    enableDarkMode();
  } else {
    disableDarkMode();
  }
});
