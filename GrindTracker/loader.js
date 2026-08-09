window.addEventListener("load", function () {
  try {
    setTimeout(function () {
      const loaders = document.querySelectorAll("#loader");
      for (let i = 0; i < loaders.length; i++) {
        loaders[i].classList.toggle("loaderstop");
      }
    }, 250);
  } catch (e) {
    console.log(e);
  }
});