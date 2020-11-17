let button = document.getElementById('button-add-user');
let add = document.getElementById('add-user');
button.addEventListener('click', addUser);
function addUser() {
    button.style.display = "none";
    add.style.display = "block";
}
let buttonedit = document.getElementById('button-edit');
let edit = document.getElementById('form-edit');
buttonedit.addEventListener('click', editTask);
function editTask() {
    document.getElementById("table-task").style.display = "none";
    edit.style.display = "block";
}

document.getElementById("button-reset").addEventListener('click', resetForm);

function resetForm() {
    edit.style.display = "none";
    document.getElementById("table-task").style.display = "";

}
