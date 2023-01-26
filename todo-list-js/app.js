const task_input = document.querySelector('.task-input');
const add_btn = document.querySelector(".add-btn");
const todo_list = document.querySelector(".todo-list");
const option = document.querySelector(".option");
const delete_all = document.querySelector(".delete-all");
const check_all = document.querySelector(".check-all");
const input_task = document.querySelector(".input-task");

add_btn.addEventListener("click", add_task);
todo_list.addEventListener("click", delete_task);
option.addEventListener("click", filter_task);
check_all.addEventListener("click", all_check);
input_task.addEventListener("click", edit);

function add_task(e) {
    e.preventDefault();

    if (task_input.value === "") {
        return false;
    } else {
        const list = document.createElement("div");
        list.innerHTML = `<li class="todo-item">${task_input.value}</li><button class="input-task">edit</button><button class="complete-btn"><i class="fas fa-check"></i></button><button class="trash-btn"><i class="fas fa-trash"></i>`;
        list.classList.add("task");
        todo_list.appendChild(list);

        task_input.value = "";
    }

}

function delete_task(e) {
    const item = e.target;
    if (item.classList[0] === "trash-btn") {
        const trash = item.parentElement;
        trash.style.display = "none";
        trash.remove();
    }

    if (item.classList[0] === "complete-btn") {
        const complete = item.parentElement;
        complete.classList.toggle("completed");
    }
}


function filter_task(e) {
    const result = todo_list.childNodes;
    result.forEach(function (todo) {
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
            case "active":
                if (!todo.classList.contains("completed")) {
                    todo.style.display = "flex";
                } else {
                    todo.style.display = "none";
                }
        }
    });
}

function trash_all(e) {
    e.preventDefault();
    todo_list.style.display = "none";
    todo_list.remove();
}

function all_check(e) {
    e.preventDefault();
    todo_list.classList.toggle("completed");
    return;
}








