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

function ADDvar() {
  /*
  <li>
    <input type="number" placeholder="height" id="height" name="height" />
    <button class="button BtnS" onclick="DELETEvar()">
      ❌
    </button>
  </li>;
*/
  const li = document.createElement("li");
  const input = document.createElement("input");
  const button = document.createElement("button");
  const textnode = document.createTextNode("❌");

  input.setAttribute("type", "text");

  button.setAttribute("class", "button BtnS");
  button.setAttribute("onclick", "DELETEvar()");
  button.appendChild(textnode);

  li.appendChild(input);
  li.appendChild(button);

  document.getElementById("listing").appendChild(li);
}

function DELETEvar() {
  //document.getElementById("#test").parentElement.innerHTML = "test";
  //document.getElementById("#test").parentElement.createTextNode("test");
  document.getElementById("#test").parentElement.remove();
  //this.parentElement.remove();
}

function GRAPHvar() {}
