<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/student_learn.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="mainWrapper">
    <div class="pageDiv_controlContainer">
        <label class="pageLbl" id="pageLbl_studentID">
            Student ID : 20150908
        </label>
        <label class="pageLbl" id="pageLbl_studentName">
            Student Name : Ellis, Anne
        </label>
        <label class="pageLbl" id="pageLbl_studentSection">
            Section : Narra
        </label>
        <label class="pageLbl" id="pageLbl_studentAdviser">
            Adviser : Ms. LastName
        </label>
        <label class="pageLbl" id="pageLbl_sy">
            SY : 2019-2020
        </label>
    </div>
<!-- All Contents Wrapper-->
    <div class="allContent_Container">
<!--MULTIPLICATION------------------------------------------------------------------->
        <div class="mainWrapper_multiplication" id="mainWrapper_multiplication">
            <div class="subWrapper_multiplication" id="subWrapper_multiplication">

                <div class="topic_link_Container">
                    <a class="topic_link" href="#">Multiplication</a><br>
                    <label class="topic_link_labels">Lessons Completed:</label>

                </div>
                <div class="topic_buttons_Container">
                    <button onclick="" class="button" id="btn_MultiplicationStartPretest">
                        Start Pretest
                    </button>
                    <button onclick="" class="button" id="btn_MultiplicationStartPostTest">
                        Start Post Test
                    </button>
                    <button onclick="" class="button" id="btn_MultiplicationStartUnitTest">
                        Start Unit Test
                    </button>
                </div>
            </div>
            <div class="scoreContainer_multiplication" id="scoreContainer_multiplication">
                <label class="pageLbl_scores" id="pageLbl_pretestScore_multiplication">Pretest Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_posttestScore_multiplication">Post Test Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_unitestScore_multiplication">Unit Test Score: 25/50 | 50%</label>
            </div>
        </div>
<!--DIVISION----------------------------------------------------------------------------->
        <div class="mainWrapper_division" id="mainWrapper_division">
            <div class="subWrapper_division" id="subWrapper_division">

                <div class="topic_link_Container">
                    <a class="topic_link" href="#">Division</a><br>
                    <label class="topic_link_labels">Lessons Completed:</label>

                </div>
                <div class="topic_buttons_Container">
                    <button onclick="" class="button" id="btn_divisionStartPretest">
                        Start Pretest
                    </button>
                    <button onclick="" class="button" id="btn_divisionStartPostTest">
                        Start Post Test
                    </button>
                    <button onclick="" class="button" id="btn_divisionStartUnitTest">
                        Start Unit Test
                    </button>
                </div>
            </div>
            <div class="scoreContainer_division" id="scoreContainer_division">
                <label class="pageLbl_scores" id="pageLbl_pretestScore_division">Pretest Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_posttestScore_division">Post Test Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_unitestScore_division">Unit Test Score: 25/50 | 50%</label>
            </div>
        </div>
<!--FRACTION---------------------------------------------------------------------------->
        <div class="mainWrapper_fraction" id="mainWrapper_fraction">
            <div class="subWrapper_fraction" id="subWrapper_fraction">

                <div class="topic_link_Container">
                    <a class="topic_link" href="#">Fractions</a><br>
                    <label class="topic_link_labels">Lessons Completed:</label>

                </div>
                <div class="topic_buttons_Container">
                    <button onclick="" class="button" id="btn_fractionStartPretest">
                        Start Pretest
                    </button>
                    <button onclick="" class="button" id="btn_fractionStartPostTest">
                        Start Post Test
                    </button>
                    <button onclick="" class="button" id="btn_fractionStartUnitTest">
                        Start Unit Test
                    </button>
                </div>
            </div>
            <div class="scoreContainer_fraction" id="scoreContainer_fraction">
                <label class="pageLbl_scores" id="pageLbl_pretestScore_fractions">Pretest Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_posttestScore_fractions">Post Test Score: 5/10 | 50%</label>
                <label class="pageLbl_scores" id="pageLbl_unitestScore_fractions">Unit Test Score: 25/50 | 50%</label>
            </div>
        </div>
    </div>
</div>

    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/student_learn.js"></script>
</body>
</html>