$(document).ready(function(){
    loadAllTopics();
});

function loadAllTopics(){
    $.ajax({
        url: 'controller/get_all_topic_record.php',
        type: 'POST',
        dataType: 'json',
        success: function (topicData) {
            var len = topicData.length;
            for (var i = 0; i < len; i++) {
                var topicId = topicData[i]['topicId'];
                var topicTitle = topicData[i]['topicTitle'];
                //$('#modalDrpDown_selectSectionTeacher').append("<option value='" + topicId + "'>" + completeName+ "</option>");

                var topicDiv = $('<div></div>');
                var topicLink = $('<a>' + topicTitle+ '</a>').addClass('topic_link').attr('href','view/student_learn_topiclink.php').attr('target','_blank');
                var btnStartPretest = $('<button> Start Pretest </button>');
                var btnStartPostTest = $('<button> Start PostTest </button>');
                topicDiv.append(topicLink);
                topicDiv.append(btnStartPretest);
                topicDiv.append(btnStartPostTest);


                $(".allContent_Container").append(topicDiv);
            }
        },
        error: function (x, e) {
            if (x.status == 0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if (x.status == 404) {
                alert('Requested URL not found.');
            } else if (x.status == 500) {
                alert('Internal Server Error.');
            } else if (e == 'parsererror') {
                alert('Error.\nParsing JSON Request failed.');
            } else if (e == 'timeout') {
                alert('Request Time out.');
            } else {
                alert('Unknown Error.\n' + x.responseText);
            }
        }
    });
}