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
    console.log("V settings");
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
              console.log("RENAME");
              console.log(elemvl);
              console.log(elemph);

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
            if (confirm("Are you sure you want to add " + elemvl + " ?")) {
              console.log("ADD");
              console.log(elemvl);

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
          }
        } else if (elemvl == "") {
          if (elemph != "") {
            if (elemvar[i].parentElement.id == "ToDelete") {
              if (confirm("Are you sure you want to delete " + elemph + " ?")) {
                //DELETE
                console.log("DELETE");
                console.log(elemph);

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
    console.log("Vars");
    try {
      const elemvar = document.querySelectorAll(".vars input[type=number]");
      const timecalendar = document.getElementById("calendar").value;
      console.log(timecalendar);
      for (let i = 0; i < elemvar.length; i++) {
        elemph = elemvar[i].placeholder;
        elemvl = elemvar[i].value;
        //PHP SQL
        console.log(elemph);
        console.log(elemvl);

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
  const li = document.createElement("li");
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
  //t.parentElement.remove();
  t.parentElement.style.display = "none";
  t.parentElement.setAttribute("id", "ToDelete");
}

function GRAPHvar(t) {
  try {
    console.log("GRAPHvar");
    elemph = t.parentElement.children[0].placeholder;
    console.log(elemph);
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

/*----------------------------to do list-----------------*/


