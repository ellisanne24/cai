var acc = document.getElementsByClassName("btn_lessons_Accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight){
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}

$(".btn_lessons_Accordion").click(function(event){
    var valueOfButtonClicked = $(this).val();
    $("#lesson_title_display").html(valueOfButtonClicked);

});

