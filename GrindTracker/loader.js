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
