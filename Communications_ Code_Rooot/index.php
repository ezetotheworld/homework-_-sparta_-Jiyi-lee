<!doctype html>
<html>
<head>
<title>Experiment Survey</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
    font-size: 13pt;
}
.p4-option {
    height: 194px;
}

.p4-option img {
    transform: scale(2, 2);
    transform-origin: 50% 0;
    -ms-transform: scale(2, 2);
    -ms-transform-origin: 50% 0;
    -webkit-transform: scale(2, 2);
    -webkit-transform-origin: 50% 0;
}

.p4-question > .row > .col-12 {
    height: 194px;
}

.p4-question img {
    transform: scale(2, 2);
    transform-origin: 50% 0;
    -ms-transform: scale(2, 2);
    -ms-transform-origin: 50% 0;
    -webkit-transform: scale(2, 2);
    -webkit-transform-origin: 50% 0;
}

.option-selected {
    border-style: solid;
    border-color: #101010;
    border-width: 1px;
}
</style>
</head>

<body>

<div id="container" class="container">
    <div id="contents"></div>
    <div class="row">
        <div class="col-md-1">
            <button id="next-button">Next</button>
        </div>
    </div>
</div>

<script>
/** 여기서,makeFilenameArray함수에서 사진-소리가 pair가 지어지는 로직을 이해못하겠음ㅠㅠ    수정하려고하는 방향: pair의 내용과 숫자를 바꾸려고 함.*/
function makeFilenameArray() {
    var filenames = ["introduction", "audio_check", "part1_intro"];
    var group1 = ["rooster", "wolf", "tiger", "sheep", "frog", "owl", "elephant", "pig"];
    var group2 = ["duck", "dog", "cat", "white_horse", "lizard", "crow", "cattle", "hamster"];
    var pairs_a = [];
    var pairs_b = [];
    var pairs_c = [];
    var pairs_d = [];
    for(i=0;i<8;i++) pairs_a.push([group1[i], group1[i]]);
    for(i=0;i<8;i++) pairs_b.push([group1[i], group2[i]]);
    for(i=0;i<8;i++) pairs_c.push([group2[i], group1[i]]);
    for(i=0;i<8;i++) pairs_d.push([group2[i], group2[i]]);
    var part1_pairs = [];
    var part3_pairs = [];
    for(i=0;i<8;i++) {
        part1_pairs.push([1].concat(pairs_a[i]));
        part3_pairs.push([3].concat(pairs_a[i]));
    }
    for(i=0;i<8;i++) {
        part1_pairs.push([1].concat(pairs_b[i]));
        part3_pairs.push([3].concat(pairs_b[i]));
    }
    for(i=0;i<8;i++) part3_pairs.push([3].concat(pairs_c[i]));
    for(i=0;i<8;i++) part3_pairs.push([3].concat(pairs_d[i]));

    while(part1_pairs.length > 0) {
        var i = Math.floor(Math.random() * part1_pairs.length);
        filenames.push(part1_pairs.splice(i, 1)[0]);
    }
    filenames.push("part2_intro");
    filenames.push("part2_1");
    filenames.push("part2_2");
    filenames.push("part2_3");
    filenames.push("part3_intro");
    filenames.push([3, "white_horse", "white_horse"]);
    filenames.push([3, "white_horse", "sheep"]);
    while(part3_pairs.length > 0) {
        var i = Math.floor(Math.random() * part3_pairs.length);
        var n = part3_pairs.splice(i, 1)[0];
        if(n[1] == "white_horse") continue;
        filenames.push(n);
    }
    filenames.push("part4_intro");
    filenames.push("part4_1");
    filenames.push("part4_2");
    filenames.push("part4_3");
    filenames.push("partn4_intro");
    filenames.push("partn4_1");
    filenames.push("partn4_2");
    filenames.push("partn4_3");
    filenames.push("partn4_4");
    filenames.push("partn4_5");
    filenames.push("partn4_6");
    filenames.push("partn4_7");
    filenames.push("partn4_8");
    filenames.push("partn4_9");
    filenames.push("part5");
    filenames.push("partn5_1");
    filenames.push("partn5_2");
    filenames.push("part6_1");
    filenames.push("part6_2");
    filenames.push("part6_3");
    filenames.push("final");
    return filenames;
}

/**if, else if 구조가 계속 반복되고 있는데, 흐름이 눈에 잘 안들어와서, 간략한 흐름 설명만 부탁해용! */
function displayPage(page_index) {
    $.current_page = page_index;
    if($.filenames[page_index] instanceof Array) {
        var filename;
        if($.filenames[page_index][0] == 1){
            filename = "part1.html";

        } else {
            if($.result == undefined) $.result = {};
            $.start_time = $.now();
            filename = "part3.html";
            $(document).unbind("keypress");
            $(document).keypress(function(event) {
                var pair = $.filenames[page_index];
                if(event.which == 121 || event.which == 89) { // 'y' or 'Y'
                    $.result["p_" + pair[1] + "_" + pair[2] + "_answer"] = 'y';
                    $.result["p_" + pair[1] + "_" + pair[2] + "_time"] = $.now() - $.start_time;
                    displayPage(page_index + 1);
                } else if(event.which == 110 || event.which == 78) { // 'n' or 'N'
                    $.result["p_" + pair[1] + "_" + pair[2] + "_answer"] = 'n';
                    $.result["p_" + pair[1] + "_" + pair[2] + "_time"] = $.now() - $.start_time;
                    displayPage(page_index + 1);
                }
            });
        }

        $("#contents").load(filename, function() {
            $("#contents").unbind("load");
            $("#animal-sound").attr("src", "audio/" + $.filenames[page_index][2] + ".wav");
            if($.filenames[page_index][0] == 1) {
                $("#animal-image").ready(function() {
                    $("#animal-image").unbind('ready');
                    setTimeout(function() {
                        displayPart1AnswerPage(page_index);
                    }, 5000)
                });
            }
            $("#animal-image").attr("src", "image/" + $.filenames[page_index][1] + ".png");

        });
        $("#next-button").hide();
    } else if($.filenames[page_index] == "final") {
        $("#contents").load($.filenames[page_index] + ".html", function() {
            $("#next-button").unbind();
            $("#next-button").hide();
            $.ajax({
                type: "POST",
                url: "submit.php",
                data: $.result,
                success: function(data) {
                    alert(data);
                }
            });
        });
    } else if($.filenames[page_index] == "part4_intro") {
        $("#contents").load("part4_intro.html", function() {
            $(document).unbind("keypress");
            $("#next-button").unbind();
            $("#next-button").hide();
            $("#p4-example-answer").hide();
            $(".p4-question input[name='p4-answer-1']").change(function() {
                if($(".p4-question input[name='p4-answer-2']:checked").length >= 1) {
                    $("#p4-example-answer").show();
                    $("#next-button").click(function() {
                        displayPage(page_index + 1);
                    });
                    $("#next-button").show();
                }
            });
            $(".p4-question input[name='p4-answer-2']").change(function() {
                if($(".p4-question input[name='p4-answer-1']:checked").length >= 1) {
                    $("#p4-example-answer").show();
                    $("#next-button").click(function() {
                        displayPage(page_index + 1);
                    });
                    $("#next-button").show();
                }
            });
        });
    } else if($.filenames[page_index].startsWith("part4_")) {
        $("#contents").load($.filenames[page_index] + ".html", function() {
            if($.filenames[page_index] == "part4_1") {
                var p4_epoch = new Date().getTime();
                var setCounter = function() {
                    var text = "";
                    var diff = new Date().getTime() - p4_epoch;
                    var left = 600000 - diff;
                    if(left > 60000) {
                        text += Math.floor(left / 60000) + " minutes ";
                    }
                    text += Math.floor((left % 60000) / 1000) + " seconds";
                    $("#countdown").text(text);

                    if(left <= 0) {
                        alert("Time's up. Moving on to the next page.");
                        displayPage(page_index + 1);
                    }
                }
                setCounter();
                $.timerHandle = setInterval(setCounter, 500);
            }

            $("#next-button").unbind();
            $("#next-button").click(function() {
                var st, ed;
                if($.filenames[page_index] == "part4_1") { st = 1; ed = 3; }
                else if($.filenames[page_index] == "part4_2") { st = 4; ed = 5; }
                else { st = 6; ed = 8; }
                for(i=st; i<=ed; i++){
                    if($("input[name='p4-answer-" + i + "']:checked").length == 0) {
                        alert("Please select an answer for question " + i);
                        return;
                    }
                }
                if(confirm("Are you sure you are going to the next page? You will not be able to modify your answer anymore.")) {
                    for(i=st;i<=ed;i++){
                        $.result["part4_" + i] = $("input[name='p4-answer-" + i + "']:checked").val();
                    }
                    displayPage(page_index + 1);
                }
            });
        });
    } else if($.filenames[page_index].startsWith("partn4_")) {
        window.clearInterval($.timerHandle);
        $("#contents").load($.filenames[page_index] + ".html", function() {
            var question_number = $.filenames[page_index].substring("partn4_".length, "partn4_".length + 1);
            $("#next-button").unbind();
            $("#next-button").click(function() {
                if($("input[type='radio']").length > 0)
                {
                    if($("input[name='n4-" + question_number + "']:checked").length == 0) {
                        alert("Please select an answer");
                        return;
                    }
                    $.result["partn4_" + question_number] = $("input[name='n4-" + question_number + "']:checked").val();
                }
                displayPage(page_index + 1);
            });
            $("#next-button").show();
        });
    } else if($.filenames[page_index] == "part5") {
        $("#contents").load("part5.html", function() {
            $(".p5-option").click(function() {
                $(this).siblings().removeClass("option-selected");
                $(this).toggleClass("option-selected");
            });
            $("#next-button").unbind();
            $("#next-button").click(function() {
                $.result["part5"] = -1;
                if($(".option-selected").length > 0) {
                    $.result["part5"] = $(".option-selected").index() + 1;
                }
                displayPage(page_index + 1);
            });
        });
    } else if($.filenames[page_index].startsWith("partn5_")) {
        var random_target = Math.random() > .5 ? 1 : 2;
        var filename = $.filenames[page_index] + ( random_target == 1 ? "_1.html" : "_2.html");
        $("#contents").load(filename, function() {
            $(".p5-option").click(function(){
                $(this).siblings().removeClass("option-selected");
                $(this).toggleClass("option-selected");
            });
            $("#next-button").unbind();
            $("#next-button").click(function() {
                $.result[$.filenames[page_index] + "_1"] = -1;
                $.result[$.filenames[page_index] + "_2"] = -1;
                if($(".option-selected").length > 0)
                {
                    $.result[$.filenames[page_index] + "_" + random_target] = $(".option-selected").index() + 1;
                }
                displayPage(page_index + 1);
            });
        });
    } else if($.filenames[page_index] == "part6_1") {
        $("#contents").load($.filenames[page_index] + ".html", function() {
            $("#next-button").unbind();
            $("#next-button").click(function() {
                if($("input[name='nationality']").val().trim() == "" ||
                    $("input[name='ethnicity']").val().trim() == "" ||
                    $("input[name='race']:checked").length == 0 ||
                    $("input[name='parent']:checked").length == 0 ||
                    $("input[name='english']:checked").length == 0 ||
                    $("input[name='stayasia']:checked").length == 0) {
                    alert("Please answer to all of the questions.");
                    return;
                }
                $.result["nationality"] = $("input[name='nationality']").val().trim();
                $.result["ethnicity"] = $("input[name='ethnicity']").val().trim();
                $.result["race"] = $("input[name='race']:checked").val();
                $.result["parent"] = $("input[name='parent']:checked").val() == "same" ? 1 : 0;
                $.result["english"] = $("input[name='english']:checked").val() == "yes" ? 1 : 0;
                $.result["stayasia"] = $("input[name='stayasia']:checked").val().trim();
                $.result["overseaexperience"] = $("textarea#overseaexperience").val().trim();
                displayPage(page_index + 1);
            });
        });
    } else if($.filenames[page_index] == "part6_2") {
        $("#contents").load($.filenames[page_index] + ".html", function() {
            $("#next-button").unbind();
            $("#next-button").click(function() {
                if($("input[name='involvement']:checked").length == 0 ||
                    $("input[name='interested']:checked").length == 0 ||
                    $("input[name='motivated']:checked").length == 0 ||
                    $("input[name='happiness']:checked").length == 0 ||
                    $("input[name='sadness']:checked").length == 0 ||
                    $("input[name='anger']:checked").length == 0 ||
                    $("input[name='excitement']:checked").length == 0 ||
                    $("input[name='disgust']:checked").length == 0) {
                    alert("Please answer to all of the questions.");
                    return;
                }
                $.result["involvement"] = parseInt($("input[name='involvement']:checked").val());
                $.result["interested"] = parseInt($("input[name='interested']:checked").val());
                $.result["motivated"] = parseInt($("input[name='motivated']:checked").val());
                $.result["happiness"] = parseInt($("input[name='happiness']:checked").val());
                $.result["sadness"] = parseInt($("input[name='sadness']:checked").val());
                $.result["anger"] = parseInt($("input[name='anger']:checked").val());
                $.result["excitement"] = parseInt($("input[name='excitement']:checked").val());
                $.result["disgust"] = parseInt($("input[name='disgust']:checked").val());
                displayPage(page_index + 1);
            });
        });
    } else if($.filenames[page_index] == "part6_3") {
        $("#contents").load($.filenames[page_index] + ".html", function() {
            $("#next-button").unbind();
            $("#next-button").click(function() {
                $.result["mturkid"] = $("input[name='mturkid']").val().trim();
                $.result["comment"] = $("textarea#comment").val();
                $.result["luckyboxemail"] = $("input[name='luckyboxemail']").val().trim();
                displayPage(page_index + 1);
            });
        });
    } else {
        $("#contents").load($.filenames[page_index] + ".html");
        $("#next-button").unbind("click");
        $("#next-button").click(function() {
            if($.filenames[page_index] == "audio_check") {
                if($("#answer-input").val().trim().toLowerCase() != "sky") {
                    alert("Wrong! Please check your audio.");
                    return;
                }
            } else if($.filenames[page_index] == "part2_1" || $.filenames[page_index] == "part2_2") {
                if($("input[name='prob']:checked").length == 0) {
                    alert("Please select your answer!");
                    return;
                }
                if($.filenames[page_index] == "part2_1") {
                    $.result['calc1'] = $("input[name='prob']:checked").val();
                } else {
                    $.result['calc2'] = $("input[name='prob']:checked").val();
                }
            } else if($.filenames[page_index] == "part2_3") {
                if($("input[name='prob']").val().trim() == "") {
                    alert("Please input your answer!");
                    return;
                }
                $.result['calc3'] = $("input[name='prob']").val();
            }

            displayPage(page_index + 1);
        });
    }
}

/** pair 갯수가 바뀌면 여기에 손 볼 파트는 없는가요?? */
function displayPart1AnswerPage(page_index) {
    $("#contents").load("part1_answer.html", function() {
        $("#next-button").show();
        $("#next-button").unbind("click");
        $("#next-button").click(function() {
            if($("input[name='familiar']:checked").length > 0) {
                var pair = $.filenames[page_index];
                $.result["p_" + pair[1] + "_" + pair[2] + "_congruity"] = $("input[name='familiar']:checked").val() == "congruent" ? 1 : 0;
                displayPage(page_index + 1);
            } else
                alert("Please select your answer!");
        });
    });
}

$.filenames = makeFilenameArray();

$(function() {
    if (!String.prototype.startsWith) {
        String.prototype.startsWith = function(searchString, position) {
                position = position || 0;
                    return this.indexOf(searchString, position) === position;
                  
        };

    }
    window.onbeforeunload = function() {
          return "Are you sure you want to leave? You will lose your responses.";
    }
    $.result = {};
    displayPage(0);
});
</script>
</body>
</html>
