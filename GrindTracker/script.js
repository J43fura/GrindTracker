try {
  const checkbox = document.getElementById("checkbox");
} catch (e) {
  console.log(e);
}
checkbox.addEventListener("change", () => {
  try {
    const darke = document.querySelectorAll(".TitleGT1-d");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-text-b");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".login");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-container");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".main-footer");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-footer");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".div-about");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-about");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".dark-t-w");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-text-w");
    }
  } catch (e) {
    console.log(e);
  }
  try {
    const darke = document.querySelectorAll(".dark-h");
    for (let i = 0; i < darke.length; i++) {
      darke[i].classList.toggle("dark-header");
    }
  } catch (e) {
    console.log(e);
  }

  const darke = document.querySelectorAll(".nav-elements");
  for (let i = 0; i < darke.length; i++) {
    darke[i].classList.toggle("dark-text-w");
  }

  try {
    const darkt = document.querySelectorAll(".dark-t");
    for (let i = 0; i < darkt.length; i++) {
      darkt[i].classList.toggle("dark-text");
    }
  } catch (e) {
    console.log(e);
  }

  /*try {
    const darkt = document.querySelectorAll(".gender");
    for (let i = 0; i < darkt.length; i++) {
      darkt[i].classList.toggle("dark-text-w");
    }
  } catch (e) {
    console.log(e);
  }*/
});

function togglePopup() {
  document.getElementById("popup-1").classList.toggle("active");
}

/*
btnRegister.addEventListener("click", () => {
  var request = new XMLHttpRequest();
  request.open('POST', 'register.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
  request.send(data);
});

btnLogin.addEventListener("click", () => {});



  document.querySelector(".nav a").classList.toggle("dark-text-w");
  // .nav a > .dark-t-w
  */


  /*----------------------------to do list-----------------*/

  //selectors
  document.addEventListener("DOMContentLoaded",getTodos);
  const todoInput = document.querySelector('.todo-input');
  const todoButton = document.querySelector('.todo-button');
  const todoList = document.querySelector('.todo-list');
  const filterOption = document.querySelector(".filter-todo");

  //event listeners

todoButton.addEventListener('click',addTodo)
todoList.addEventListener('click',deletCheck);
filterOption.addEventListener("click",filterTodo)

  //Functions

  function addTodo(event) {
    //prevent from submitting
    event.preventDefault();
    //Todo div
    const todoDiv = document.createElement('div');
    todoDiv.classList.add("todo");
    //create li
    const newTodo = document.createElement('li');
    newTodo.innerText = todoInput.value;
    newTodo.classList.add('todo-item');
    todoDiv.appendChild(newTodo);
    //ADD TODO LOCALSTORAGE
    saveLocalTodos(todoInput.value);
    //check mark button
    const completedButton = document.createElement('button');
    completedButton.innerHTML = '<i class="fas fa-check"></i>';
    completedButton.classList.add("complete-btn");
    todoDiv.appendChild(completedButton);
    //check trash butoon
    const trashButton = document.createElement('button');
    trashButton.innerHTML = '<i class="fas fa-trash"></i>';
    trashButton.classList.add("trash-btn");
    todoDiv.appendChild(trashButton);
    //append to list
    todoList.appendChild(todoDiv);
    //clear todo input value
    todoInput.value="";
  }


  function deletCheck(e){
    const item = e.target;
    //delete todo
    if(item.classList[0]==='trash-btn'){
      const todo = item.parentElement;
      removeLocalTodos(todo);
      todo.remove();
    }
    //check mark
    if(item.classList[0] ==="complete-btn"){
      const todo = item.parentElement;
      todo.classList.toggle("completed")
    }
  }



function filterTodo(e){
const todos = todoList.childNodes;
todos.forEach(function(todo){
  switch(e.target.value){
    case "all":
      todo.style.display = 'flex';
      break;
    case "completed":
      if(todo.classList.contains('completed')){
        todo.style.display = "flex";
      }else{
        todo.style.display = "none";
      }break;
      case "uncompleted":
        if(!todo.classList.contains('completed')){
          todo.style.display = "flex";
        }else{
          todo.style.display = "none";
        }break;
  }
})
}


function saveLocalTodos(todo){
  //checking if i have one
  let todos;
  if(localStorage.getItem('todos')=== null){
    todos = [];
  }else{
    todos = JSON.parse(localStorage.getItem('todos'))
  }
  todos.push(todo);
  localStorage.setItem('todos',JSON.stringify(todos));
}

function getTodos(){
  
  //checking if i have one
  let todos;
  if(localStorage.getItem('todos')=== null){
    todos = [];
  }else{
    todos = JSON.parse(localStorage.getItem('todos'))
  }
  todos.forEach(function(todo)
  {
    //Todo div
    const todoDiv = document.createElement('div');
    todoDiv.classList.add("todo");
    //create li
    const newTodo = document.createElement('li');
    newTodo.innerText = todo;
    newTodo.classList.add('todo-item');
    todoDiv.appendChild(newTodo);
    //check mark button
    const completedButton = document.createElement('button');
    completedButton.innerHTML = '<i class="fas fa-check"></i>';
    completedButton.classList.add("complete-btn");
    todoDiv.appendChild(completedButton);
    //check trash butoon
    const trashButton = document.createElement('button');
    trashButton.innerHTML = '<i class="fas fa-trash"></i>';
    trashButton.classList.add("trash-btn");
    todoDiv.appendChild(trashButton);
    //append to list
    todoList.appendChild(todoDiv);
  });
}
function removeLocalTodos(todo){
  let todos;
  if(localStorage.getItem('todos')=== null){
    todos = [];
  }else{
    todos = JSON.parse(localStorage.getItem('todos'))
  }
  const todoIndex = todo.children[0].innerText;
  todos.splice(todos.indexOf(todoIndex),1);
  localStorage.setItem('todos',JSON.stringify(todos));
}