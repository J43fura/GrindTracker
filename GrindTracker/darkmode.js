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

/**********************************::::matensech el darkmode lel todo */

document.getElementById("calendar").valueAsDate = new Date();
const NowDate = document.getElementById("calendar").valueAsDate;

// ("yyyy-MM-dd")> console.log(newLocal.toISOString().slice(0, 10));

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
                  if (data == 0) {
                    alert("Something wrong went. Please try again.");
                  }
                },
              });
            }
          } else {
            //ADD
            if (isNaN(elemvl)) {
              if (confirm("Are you sure you want to add " + elemvl + " ?")) {
                $.ajax({
                  url: "varssettings.php",
                  type: "POST",
                  data: { elemvl: elemvl },
                  success: function (data) {
                    if (data == 0) {
                      alert("Something wrong went. Please try again.");
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

        //ALTER TABLE pr$id ADD $axe int(7) : colon jdida lel jdod (else>value)
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
  //PHP SQL
  /*
    $.ajax({
      url: "graph.php",
      type: "POST",
      data: { elemph: elemph },
      success: function (line_graph) {
        $("divGraph").html(line_graph);
        $("#graph").chart = new Chart(
          $("#graph"),
          $("#graph").data("settings")
        );
      },
    });
  } catch (e) {
    console.log(e);
  }*/
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
