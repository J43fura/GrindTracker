document.writeln(
  "<script type='text/javascript' src='Adds/jquery-3.6.0.js'></script>"
);
document.getElementById("calendar").valueAsDate = new Date();
const NowDate = document.getElementById("calendar").valueAsDate;

// ("yyyy-MM-dd")> console.log(newLocal.toISOString().slice(0, 10));

function DisplaySettings() {
  if (document.querySelector(".Settings").style.display != "block") {
    //vars
    document.querySelector(".vars").style.display = "none";
    document.querySelector(".Settings").style.display = "block";
    //input: number > string
    /*try {
      const elemvar = document.querySelectorAll(".Settings input[type=number]");
      for (let i = 0; i < elemvar.length; i++) {
        elemvar[i].type = "text";
      }
    } catch (e) {
      console.log(e);
    }*/
  } else if (document.querySelector(".Settings").style.display == "block") {
    //settings
    document.querySelector(".vars").style.display = "block";
    document.querySelector(".Settings").style.display = "none";
    //input: string > number //+sql?
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
          } else {
            //ADD
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

        $.ajax({
          url: "vars.php",
          type: "POST",
          data: { elemvl: elemvl, elemph: elemph, timecalendar: timecalendar },
          success: function (data) {
            if (data == 0) {
              alert("Something wrong went. Please try again.");
            }
          },
        });
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

function GRAPHvar() {}

/*----------------------------to do list-----------------*/

//selectors
document.addEventListener("DOMContentLoaded", getTodos);
const todoInput = document.querySelector(".todo-input");
const todoButton = document.querySelector(".todo-button");
const todoList = document.querySelector(".todo-list");
const filterOption = document.querySelector(".filter-todo");

//event listeners

todoButton.addEventListener("click", addTodo);
todoList.addEventListener("click", deletCheck);
filterOption.addEventListener("click", filterTodo);

//Functions

function addTodo(event) {
  //prevent from submitting
  event.preventDefault();
  //Todo div
  const todoDiv = document.createElement("div");
  todoDiv.classList.add("todo");
  //create li
  const newTodo = document.createElement("li");
  newTodo.innerText = todoInput.value;
  newTodo.classList.add("todo-item");
  todoDiv.appendChild(newTodo);
  //ADD TODO LOCALSTORAGE
  saveLocalTodos(todoInput.value);
  //check mark button
  const completedButton = document.createElement("button");
  completedButton.innerHTML = '<i class="fas fa-check"></i>';
  completedButton.classList.add("complete-btn");
  todoDiv.appendChild(completedButton);
  //check trash butoon
  const trashButton = document.createElement("button");
  trashButton.innerHTML = '<i class="fas fa-trash"></i>';
  trashButton.classList.add("trash-btn");
  todoDiv.appendChild(trashButton);
  //append to list
  todoList.appendChild(todoDiv);
  //clear todo input value
  todoInput.value = "";
}

function deletCheck(e) {
  const item = e.target;
  //delete todo
  if (item.classList[0] === "trash-btn") {
    const todo = item.parentElement;
    removeLocalTodos(todo);
    todo.remove();
  }
  //check mark
  if (item.classList[0] === "complete-btn") {
    const todo = item.parentElement;
    todo.classList.toggle("completed");
  }
}

function filterTodo(e) {
  const todos = todoList.childNodes;
  todos.forEach(function (todo) {
    switch (e.target.value) {
      case "all":
        todo.style.display = "flex";
        break;
      case "completed":
        if (todo.classList.contains("completed")) {
          todo.style.display = "flex";
        } else {
          todo.style.display = "none";
        }
        break;
      case "uncompleted":
        if (!todo.classList.contains("completed")) {
          todo.style.display = "flex";
        } else {
          todo.style.display = "none";
        }
        break;
    }
  });
}

function saveLocalTodos(todo) {
  //checking if i have one
  let todos;
  if (localStorage.getItem("todos") === null) {
    todos = [];
  } else {
    todos = JSON.parse(localStorage.getItem("todos"));
  }
  todos.push(todo);
  localStorage.setItem("todos", JSON.stringify(todos));
}

function getTodos() {
  //checking if i have one
  let todos;
  if (localStorage.getItem("todos") === null) {
    todos = [];
  } else {
    todos = JSON.parse(localStorage.getItem("todos"));
  }
  todos.forEach(function (todo) {
    //Todo div
    const todoDiv = document.createElement("div");
    todoDiv.classList.add("todo");
    //create li
    const newTodo = document.createElement("li");
    newTodo.innerText = todo;
    newTodo.classList.add("todo-item");
    todoDiv.appendChild(newTodo);
    //check mark button
    const completedButton = document.createElement("button");
    completedButton.innerHTML = '<i class="fas fa-check"></i>';
    completedButton.classList.add("complete-btn");
    todoDiv.appendChild(completedButton);
    //check trash butoon
    const trashButton = document.createElement("button");
    trashButton.innerHTML = '<i class="fas fa-trash"></i>';
    trashButton.classList.add("trash-btn");
    todoDiv.appendChild(trashButton);
    //append to list
    todoList.appendChild(todoDiv);
  });
}
function removeLocalTodos(todo) {
  let todos;
  if (localStorage.getItem("todos") === null) {
    todos = [];
  } else {
    todos = JSON.parse(localStorage.getItem("todos"));
  }
  const todoIndex = todo.children[0].innerText;
  todos.splice(todos.indexOf(todoIndex), 1);
  localStorage.setItem("todos", JSON.stringify(todos));
}
