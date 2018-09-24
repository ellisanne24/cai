<!DOCTYPE html>
<html>
<head>
    <title>Student | Learn</title>
    <link rel="stylesheet" href="../css/student_topiclink.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/tables.css">
    <link rel="stylesheet" href="../css/control.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="wrapper">
    <div class="lessons_Container">
        <div class="lessons_label_Container">
            <img src="../img/openbookWhitesmoke.png" />
            <label class="lessons_label" id="pageLbl_learnMultiplication">Learn Multiplication</label>
        </div>
        <div class="accordion_Container">
            <button class="btn_lessons" value="Start Pretest">Start Pretest</button>
<!-- Lesson 1-->
            <button  class="btn_lessons_Accordion"  value=" Lesson 1: Multiplication Facts of 6,7,8,9, and 10">
                Lesson 1: Multiplication Facts of 6,7,8,9, and 10
            </button>
                <div class="panel">
                    <div class="video_Container" id="lesson1_video">
                        <img src="../img/watchvideo.png" />
                        <button class="btn_video" id="lesson1_video">Watch Video</button>
                    </div>
                    <div class="ppt_Container">
                        <img src="../img/ppt.png" />
                        <button class="btn_textAndAudio">Read and/or Listen</button>
                    </div>
                    <div class="practice_Container">
                        <img src="../img/practice.png" />
                        <button class="btn_practice">Let's Practice!</button>
                    </div>
                    <div class="enrichment_Container">
                        <img src="../img/enrichment.png" />
                        <button class="btn_enrichment">Enrichment</button>
                    </div>
                    <div class="miniquiz_Container">
                        <img src="../img/miniquiz.png" />
                        <button class="btn_miniquiz">Take Lesson Quiz</button>
                    </div>
                </div>
<!-- Lesson 2-->
            <button class="btn_lessons_Accordion" value="Lesson 2: Properties of Multiplication">
                Lesson 2: Properties of Multiplication
            </button>
                <div class="panel">
                        <div class="video_Container">
                        <img src="../img/watchvideo.png" />
                        <button class="btn_video">Watch Video</button>
                    </div>
                    <div class="ppt_Container">
                        <img src="../img/ppt.png" />
                        <button class="btn_textAndAudio">Read and/or Listen</button>
                    </div>
                    <div class="practice_Container">
                        <img src="../img/practice.png" />
                        <button class="btn_practice">Let's Practice!</button>
                    </div>
                    <div class="enrichment_Container">
                        <img src="../img/enrichment.png" />
                        <button class="btn_enrichment">Enrichment</button>
                    </div>
                    <div class="miniquiz_Container">
                        <img src="../img/miniquiz.png" />
                        <button class="btn_miniquiz">Take Mini-quiz</button>
                    </div>
                </div>
<!-- Lesson 3-->
            <button class="btn_lessons_Accordion" value=" Lesson 3: Multiplying Numbers without Regrouping">
                Lesson 3: Multiplying Numbers without Regrouping
            </button>
                <div class="panel">
                    <div class="video_Container">
                        <img src="../img/watchvideo.png" />
                        <button class="btn_video">Watch Video</button>
                    </div>
                    <div class="ppt_Container">
                        <img src="../img/ppt.png" />
                        <button class="btn_textAndAudio">Read and/or Listen</button>
                    </div>
                </div>
<!-- Lesson 4 -->
            <button class="btn_lessons_Accordion" value="Lesson 4: Multiplying Numbers with Regrouping">
                Lesson 4: Multiplying Numbers with Regrouping
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!-- Lesson 5-->
            <button class="btn_lessons_Accordion" value=" Lesson 5: Multiplying Numbers by 10, 100, and 1000">
                Lesson 5: Multiplying Numbers by 10, 100, and 1000
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!-- Lesson 6-->
            <button class="btn_lessons_Accordion" value="Lesson 6: Multiplying Numbers Mentally">
                Lesson 6: Multiplying Numbers Mentally
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!--Lesson 7-->
            <button class="btn_lessons_Accordion" value=" Lesson 7: Solving One-Step Word Problems Including Money">
                Lesson 7: Solving One-Step Word Problems Including Money
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!-- Lesson 8-->
            <button class="btn_lessons_Accordion" value="Lesson 8: Solving Two-Step Word Problems Including Money">
                Lesson 8: Solving Two-Step Word Problems Including Money
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!--lesson 9-->
            <button class="btn_lessons_Accordion" value=" Lesson 9: Prime and Composite Numbers">
                Lesson 9: Prime and Composite Numbers
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!-- Lesson 10-->
            <button class="btn_lessons_Accordion" value="Lesson 10: Factors and Multiples">
                Lesson 10: Factors and Multiples
            </button>
            <div class="panel">
                <p>video here</p>
            </div>
<!-- Unit Test-->
<!--            <button class="btn_lessons" value="Start Unit Test">Start Unit Test</button>-->
<!--Post Test-->
            <button class="btn_lessons" value="Start Post Test">Start Post Test</button>
<!-- Play a Game-->
            <button class="btn_lessons" value="Let's Play!">Let's Play!</button>
        </div>
    </div>
    <div class="lessons_contents_Container">
        <div class="lessons_label_Container">
            <label class="lessons_label" id="lesson_title_display"></label>
        </div>
        <div class="progressBar">75%</div>

    </div>


</div>
    <script src="../js/jquery-3.3.1.js"></script>
   <script src="../js/student_topiclink.js"></script>
</body>
</html>