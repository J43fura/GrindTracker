window.addEventListener("load", function () {
  let darkMode = localStorage.getItem("darkMode");
  var darkModeadd = document.getElementById("darkmode");
  var enableDarkMode = () => {
    try {
      const darke = document.querySelectorAll(".TitleGT1-d");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-text-b");
      }
    } catch (e) {
      console.log(e);
    }
    try {
      const darke = document.querySelectorAll(".login");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-container");
      }
    } catch (e) {
      console.log(e);
    }
    try {
      const darke = document.querySelectorAll(".main-footer");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-footer");
      }
    } catch (e) {
      console.log(e);
    }
    try {
      const darke = document.querySelectorAll(".div-about");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-about");
      }
    } catch (e) {
      console.log(e);
    }
    try {
      const darke = document.querySelectorAll(".dark-t-w");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-text-w");
      }
    } catch (e) {
      console.log(e);
    }
    try {
      const darke = document.querySelectorAll(".dark-h");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-header");
      }
    } catch (e) {
      console.log(e);
    }

    const darke = document.querySelectorAll(".nav-elements");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.add("dark-text-w");
    }

    try {
      const darkt = document.querySelectorAll(".dark-t");
      for (let i = 0; i < darkt.length; i++) {
        darkt[i].classList.add("dark-text");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darkt = document.querySelectorAll(".section-header");
      for (let i = 0; i < darkt.length; i++) {
        darkt[i].classList.add("section-header1");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darke = document.querySelectorAll(".vars");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-container");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darke = document.querySelectorAll(".listing li");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-var");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darke = document.querySelectorAll("#tasks li");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-var");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darke = document.querySelectorAll(".calendar");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-container");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darke = document.querySelectorAll(".todo-div");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-container");
      }
    } catch (e) {
      console.log(e);
    }

    try {
      const darke = document.querySelectorAll("#todoinput");
      for (let i = 0; i < darke.length; i++) {
        darke[i].classList.add("dark-var");
      }
    } catch (e) {
      console.log(e);
    }

    localStorage.setItem("darkMode", "enabled");
  };
  var disableDarkMode = () => {
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
      const darkt = document.querySelectorAll(".section-header");
      for (let i = 0; i < darkt.length; i++) {
        darkt[i].classList.remove("section-header1");
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
      const darke = document.querySelectorAll("#tasks li");
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
    darkModeadd.checked = true;
    enableDarkMode();
  }

  darkModeadd.addEventListener("change", () => {
    let darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled") {
      enableDarkMode();
    } else {
      disableDarkMode();
    }
  });
});
