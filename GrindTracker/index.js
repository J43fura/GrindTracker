function togglePopupSignUp() {
  var popup = document.getElementById("popup-1");
  popup.classList.toggle("active");
  document.body.style.overflow = popup.classList.contains("active")
    ? "hidden"
    : "";
}

function togglePopupVerif() {
  var popup = document.getElementById("popup-Ver");
  popup.classList.toggle("active");
  document.body.style.overflow = popup.classList.contains("active")
    ? "hidden"
    : "";
}