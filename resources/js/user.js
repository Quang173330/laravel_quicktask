let button = document.getElementById('button-add-task');
let add = document.getElementById('add-task');
button.addEventListener('click', addUser);
function addUser() {
    button.style.display = "none";
    add.style.display = "block";
}
let button_edit = document.getElementById('button-edit');
let edit = document.getElementById('form-edit');
button_edit.addEventListener('click', editTask);
function editTask() {
    document.getElementById("table-user").style.display = "none";
    edit.style.display = "block";
}

document.getElementById("button-back").addEventListener('click', resetForm);

function resetForm() {
    edit.style.display = "none";
    document.getElementById("table-user").style.display = "";

}
