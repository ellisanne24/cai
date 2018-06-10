function createNewLesson(){
    var modal = document.getElementById('myModal');
    var createBtn = document.getElementById('modal_createBtn');
    var span = document.getElementsByClassName("close")[0];

    modal.style.display = "block";

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

}

function addedLesson(){
    $(document).ready(function () {
        $("#container_lessons").append('<div class="lesson_holder"><div class="module_item"><br>New Lesson</div></div>');
    });
}





