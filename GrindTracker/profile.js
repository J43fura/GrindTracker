document.getElementById("calendar").valueAsDate = new Date();
const NowDate = document.getElementById("calendar").valueAsDate;
function DisplaySettings() {
  if (document.querySelector(".Settings").style.display != "block") {
    //vars > settings
    document.querySelector(".vars").style.display = "none";
    document.querySelector(".Settings").style.display = "block";
  } else if (document.querySelector(".Settings").style.display == "block") {
    //settings > vars
    document.querySelector(".vars").style.display = "block";
    document.querySelector(".Settings").style.display = "none";
    //
    window.location.reload(true);
  }
}

function Verify() {
  if (document.querySelector(".Settings").style.display == "block") {
    //settings
    try {
      const elemvar = document.querySelectorAll(".Settings input[type=text]");
      for (let i = 0; i < elemvar.length; i++) {
        //rename lel 9dim + verification esm mafamech menou (placeholder>)
        elemph = elemvar[i].placeholder;
        elemvl = elemvar[i].value;
        if (elemvl != "") {
          if (elemph != "") {
            //RENAME
            if (elemvl.length > 30) {
              alert(
                elemvl +
                  " is greater than >30 characters. Choose a smaller name."
              );
              return;
            }
            if (
              confirm(
                "Are you sure you want to rename " +
                  elemph +
                  " to " +
                  elemvl +
                  " ?"
              )
            ) {
              $.ajax({
                url: "varssettings.php",
                type: "POST",
                data: { elemvl: elemvl, elemph: elemph },
                success: function (data) {
                  console.log("ytest wallajh");
                  if (data == 0) {
                    alert("Something wrong went. Please try again.");
                  }
                },
              });
            }
          } else {
            //ADD
            if (isNaN(elemvl)) {
              if (elemvl.length > 30) {
                alert(
                  elemvl +
                    " is greater than >30 characters. Choose a smaller name."
                );
                return;
              }
              if (confirm("Are you sure you want to add " + elemvl + " ?")) {
                $.ajax({
                  url: "varssettings.php",
                  type: "POST",
                  data: { elemvl: elemvl },
                  success: function (data) {
                    if (data == 0) {
                      alert("Something wrong went. Please try again.");
                    } else if (data == 2) {
                      alert(elemvl + " Already exists.");
                    } else if (data == 3) {
                      alert("Sql ERROR");
                    }
                  },
                });
              }
            } else {
              alert("You cant add a number. " + elemvl);
            }
          }
        } else if (elemvl == "") {
          if (elemph != "") {
            if (elemvar[i].parentElement.id == "ToDelete") {
              if (confirm("Are you sure you want to delete " + elemph + " ?")) {
                //DELETE

                $.ajax({
                  url: "varssettings.php",
                  type: "POST",
                  data: { elemph: elemph },
                  success: function (data) {
                    if (data == 0) {
                      alert("Something wrong went. Please try again.");
                    }
                  },
                });
                document.getElementById(elemph).parentElement.remove();
              }
            }
          }
        }
        window.location.reload(true);
        //varssettings
      }
    } catch (e) {
      console.log(e);
    }
  } else {
    //vars
    try {
      const elemvar = document.querySelectorAll(".vars input[type=number]");
      const timecalendar = document.getElementById("calendar").value;
      for (let i = 0; i < elemvar.length; i++) {
        elemph = elemvar[i].placeholder;
        elemvl = elemvar[i].value;
        //PHP SQL
        if (elemvl != "") {
          if (
            confirm(
              "Are you sure you want to save: " +
                elemvl +
                " > " +
                timecalendar +
                " >> " +
                elemph +
                " ?"
            )
          ) {
            $.ajax({
              url: "vars.php",
              type: "POST",
              data: {
                elemvl: elemvl,
                elemph: elemph,
                timecalendar: timecalendar,
              },
              success: function (data) {
                if (data == 0) {
                  alert("Something wrong went. Please try again.");
                }
              },
            });
          }
        }
      }
    } catch (e) {
      console.log(e);
    }
  }
}

function ADDvar() {
  let darkMode = localStorage.getItem("darkMode");
  const li = document.createElement("li");
  if (darkMode === "enabled") {
    li.classList.add("dark-var");
  }
  const input = document.createElement("input");
  const button = document.createElement("button");
  const textnode = document.createTextNode("❌");
  input.setAttribute("required", "");
  input.setAttribute("type", "text");

  button.setAttribute("class", "button BtnS");
  button.setAttribute("onclick", "DELETEvar(this)");
  button.appendChild(textnode);

  li.appendChild(input);
  li.appendChild(button);

  document.getElementById("listing").appendChild(li);
}

function DELETEvar(t) {
  t.parentElement.style.display = "none";
  t.parentElement.setAttribute("id", "ToDelete");
}

function GRAPHvar(t) {
  try {
    elemph = t.parentElement.children[0].placeholder;
    $.ajax({
      url: "graph.php",
      type: "POST",
      data: { elemph: elemph },
      success: function (graph) {
        var win = window.open();
        win.document.write(graph);
      },
    });
  } catch (e) {
    console.log(e);
  }
}

var filtertodo = document.querySelector(".filter-todo");
filtertodo.addEventListener("change", () => {
  loadTasks();
});

function loadTasks() {
  var filtertodovalue = filtertodo.value;
  $.ajax({
    url: "show-todo.php",
    type: "POST",
    data: { filtertodovalue: filtertodovalue },
    success: function (data) {
      $("#tasks").html(data);
      let darkMode = localStorage.getItem("darkMode");
      if (darkMode == "enabled") {
        try {
          const darke = document.querySelectorAll("#tasks li");
          for (let i = 0; i < darke.length; i++) {
            darke[i].classList.add("dark-var");
          }
        } catch (e) {
          console.log(e);
        }
        try {
          const darkt = document.querySelectorAll("#tasks .dark-t");
          for (let i = 0; i < darkt.length; i++) {
            darkt[i].classList.add("dark-text");
          }
        } catch (e) {
          console.log(e);
        }
      }
    },
  });
}

var input = document.querySelectorAll(".vars .listing input"); // get the input element
for (let i = 0; i < input.length; i++) {
  input[i].addEventListener("input", resizeInput); // bind the "resizeInput" callback on "input" event
  resizeInput.call(input[i]); // immediately call the function
}
function resizeInput() {
  this.style.width = this.title.length + 2 + "ch";
}
