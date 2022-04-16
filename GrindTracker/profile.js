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
    /*
    console.log("V vars");
    fetch('wrap.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: "text=" + document.querySelector("p.unbroken").innerText
    })
    .then(response => response.text())
    .then(data => document.querySelector("p.broken").innerHTML = data);
    */
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
