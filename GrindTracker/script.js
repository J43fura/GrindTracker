function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if (new Date().getTime() - start > milliseconds) {
      break;
    }
  }
}
window.addEventListener("load", function () {
  try {
    sleep(250);
    const loaders = document.querySelectorAll("#loader");
    for (let i = 0; i < loaders.length; i++) {
      loaders[i].classList.toggle("loaderstop");
    }
  } catch (e) {
    console.log(e);
  }
});

function togglePopup() {
  document.getElementById("popup-1").classList.toggle("active");
  document.body.style.overflow(hidden); //height100%? 3al mtnjmch scroll down k tbda popup ma7loula
}

function togglePopupVer() {
  document.getElementById("popup-Ver").classList.toggle("active");
  document.body.style.overflow(hidden); //height100%? 3al mtnjmch scroll down k tbda popup ma7loula
}
