/*window.addEventListener("load", function () {
  document.getElementById("loader").classList.toggle("loaderstop");
});

try {
  const checkbox = document.getElementById("darkmode");
} catch (e) {
  console.log(e);
}
checkbox.addEventListener("change", () => {
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
});*/
/* DARK MDOE PHP HTML CHiRA
<?php
if (isset($_GET["dark"])){

  
  echo "<script>   try {
    const darke = document.querySelectorAll('.TitleGT1-d');
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle('dark-text-b');
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll('.login');
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle('dark-container');
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll('.main-footer');
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle('dark-footer');
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll('.div-about');
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle('dark-about');
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll('.dark-t-w');
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle('dark-text-w');
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll('.dark-h');
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle('dark-header');
    }
  } catch (e) {
    console.log(e);
  }

  const darke = document.querySelectorAll('.nav-elements');
  for (let i = 0; i < darke.length; i++) {
    darke[i].classList.toggle('dark-text-w');
  }

  try {
    const darkt = document.querySelectorAll('.dark-t');
    for (let i = 0; i < darkt.length; i++) {
      darkt[i].classList.toggle('dark-text');
    }
  } catch (e) {
    console.log(e);
  } </script>";
}
  

checkbox.addEventListener("change", () => {
  $.ajax({
    type: "POST",
    data: { dark: "dark" },
    success: function (data) {},
  });
});
*/
function togglePopup() {
  document.getElementById("popup-1").classList.toggle("active");
  document.body.style.overflow(hidden); //height100%?
}
/*
btnRegister.addEventListener("click", () => {
  var request = new XMLHttpRequest();
  request.open('POST', 'register.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.send(data);
});

btnLogin.addEventListener("click", () => {});



  document.querySelector(".nav a").classList.toggle("dark-text-w");
  // .nav a > .dark-t-w
  */
