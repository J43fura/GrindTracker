document.getElementById("calendar").valueAsDate = new Date();
const NowDate = document.getElementById("calendar").valueAsDate;

// ("yyyy-MM-dd")> console.log(newLocal.toISOString().slice(0, 10));

function DisplaySettings() {
  if (document.querySelector(".Settings").style.display != "block") {
    //vars
    document.querySelector(".vars").style.display = "none";
    document.querySelector(".Settings").style.display = "block";
    //input: number > string
  } else if (document.querySelector(".Settings").style.display == "block") {
    //settings
    document.querySelector(".vars").style.display = "block";
    document.querySelector(".Settings").style.display = "none";
    //input: string > number //+sql?
  }
}
function Verify() {
  if (document.querySelector(".Settings").style.display != "block") {
    console.log("V vars");
    //vars
  } else if (document.querySelector(".Settings").style.display == "block") {
    console.log("V settings");
    //settings
  }
}

function ADDvar() {
  const li = document.createElement("li");
  const input = document.createElement("input");
  const button = document.createElement("button");
  const textnode = document.createTextNode("❌");

  input.setAttribute("type", "text");

  button.setAttribute("class", "button BtnS");
  button.setAttribute("onclick", "DELETEvar(this)");
  button.appendChild(textnode);

  li.appendChild(input);
  li.appendChild(button);

  document.getElementById("listing").appendChild(li);
}

function DELETEvar(t) {
  t.parentElement.remove();
}

function GRAPHvar() {}
