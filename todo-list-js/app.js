const task_input = document.querySelector('.task-input');
const add_btn = document.querySelector(".add-btn");
const todo_list = document.querySelector(".todo-list");
const option = document.querySelector(".option");
const delete_all = document.querySelector(".delete-all");
const check_all = document.querySelector(".check-all");


add_btn.addEventListener("click", add_task);
todo_list.addEventListener("click", delete_task);
option.addEventListener("click", filter_task);
check_all.addEventListener("click", all_check);


function add_task(e) {
    e.preventDefault();

    if (task_input.value === "") {
        return false;
    } else {
        const list = document.createElement("div");
        //list.innerHTML = `<input class="todo-item" type="button" value="${task_input.value}" ><button class="complete-btn"><i class="fas fa-check"></i></button><button class="trash-btn"><i class="fas fa-trash"></i>`;

        const task_input_el = document.createElement('input');
        task_input_el.classList.add('todo-item');
        task_input_el.type = 'text';
        task_input_el.value = task_input.value;
        task_input_el.setAttribute('readonly', 'readonly');
        list.appendChild(task_input_el);

        const editButton = document.createElement("button");
        editButton.innerText = `Edit`;
        editButton.classList.add("edit-btn");
        list.appendChild(editButton);

        const completedButton = document.createElement("button");
        completedButton.innerHTML = `<i class="fas fa-check"></i>`;
        completedButton.classList.add("complete-btn");
        list.appendChild(completedButton);

        const trashButton = document.createElement("button");
        trashButton.innerHTML = `<i class="fas fa-trash"></i>`;
        trashButton.classList.add("trash-btn");
        list.appendChild(trashButton);

        list.classList.add("task");
        todo_list.appendChild(list);

        task_input.value = "";



        const editInput = document.querySelector(".edit-btn");
        editInput.addEventListener("click", edit);
        function edit(e) {
            const editArea = e.target;
            const editTxt = list.firstChild;
            if (editArea.innerText.toLowerCase() == "edit") {
                editArea.innerText = "Save";
                editTxt.removeAttribute("readonly");
                editTxt.focus();
            } else {
                editArea.innerText = "Edit";
                editTxt.setAttribute("readonly", "readonly");
            }
        }

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
