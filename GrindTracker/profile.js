document.getElementById("calendar").valueAsDate = new Date();
const NowDate = document.getElementById("calendar").valueAsDate;

// ("yyyy-MM-dd")> console.log(newLocal.toISOString().slice(0, 10));

function DisplaySettings() {
  if (document.querySelector(".Settings").style.display != "block") {
    document.querySelector(".vars").style.display = "none";
    document.querySelector(".Settings").style.display = "block";
  } else if (document.querySelector(".Settings").style.display == "block") {
    document.querySelector(".vars").style.display = "block";
    document.querySelector(".Settings").style.display = "none";
  }
}
document.getElementById("Verify").addEventListener("click", () => {});
