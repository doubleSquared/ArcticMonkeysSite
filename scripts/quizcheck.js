//Load ajax connection
window.onload = initializeAjax();
window.onload = hideSymbols();

//number of total questions
    nQuestions = 10;

//question form's ids
    questions = ["question1", "question2", "question3", "question4", "question5", "question6", "question7", "question8", "question9"
        , "question10"];

//hide all the questions
    for (var i = 0; i < nQuestions; i++) {
        var hide = document.getElementById(questions[i]);
        hide.style.display = "none";
    }
//hide score image
document.getElementById("score").style.display="none";



//random question to be appeared
    var rand = Math.floor((Math.random() * 10)); //random number from 0 to 9

    var current_form = document.getElementById(questions[rand]);
    current_form.style.display = "inline-block";

    count_ques = 1;
    past_ques = [rand];
    var legend_que =document.getElementById("qNumber");
    legend_que.innerHTML = count_ques + "/" + nQuestions;

//score variable
var score=0;

function hideSymbols()
{
    document.getElementById("correct").style.display = "none";
    document.getElementById("incorrect").style.display = "none";
}

function next()
{
    hideSymbols();
    var flag = false;
    var rand;
    if (count_ques<nQuestions)
    {
        while (!flag) {
            rand = Math.floor((Math.random() * 10)); //random number from 1 to 10
            flag=checkPast(rand);
        }
        if (flag)
        {
            current_form.style.display ="none";
            var next_form=document.getElementById(questions[rand]);
            next_form.style.display = "inline-block";
            current_form=next_form;
            count_ques ++;
            legend_que.innerHTML = count_ques + "/" + nQuestions;
            past_ques.push(rand);
        }

    }
    else
    {
        legend_que.style.display = "none";
        var check_button= document.getElementById("checkButton");
        check_button.innerHTML = "Try Again";
        showScore();
        check_button.onclick = reload;

    }
}
function reload()
{
    location.reload(true);
}

function checkPast(rand)
{
    for (var i=0;i<past_ques.length;i++)
    {
        if(rand === past_ques[i])
        {
            return false;
        }
    }
    return true;
}

var http= getXMLHttpRequest();

function initializeAjax()
{
    var check_button = document.getElementById("checkButton");
    check_button.onclick= checkAnswer;
}

function getXMLHttpRequest()
{
    var request;
    if(window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return request;
}

function getResponse(ID,Answer)
{
    var myURL= "getAnswer.php?ID=" + ID + "&An=" + Answer;
    http.open("GET",myURL);
    http.onreadystatechange = useHttpResponse;
    http.send();
}

function useHttpResponse()
{
    if (http.readyState == 4) {
        if (http.status == 200) {
            showResult(http.responseText);
        }
    }
}

function checkAnswer()
{
    var ID= current_form.getAttribute("id").substring(8)//to get the id of the form
    var radios = document.getElementsByName("answer" + ID);//getting current answers
    var flag = false;
    for (var i=0; i< radios.length; i++)
    {
        if(radios[i].checked)
        {
            getResponse(ID,i+1);
            flag=true;
            break;
        }
    }
    if (!flag)
    {
        alert("You must choose an answer");
    }

}

function showResult(result)
{
    if (result == 1)
    {
        document.getElementById("correct").style.display = "inline";
        score += 1;
    }
    else
    {
        document.getElementById("incorrect").style.display = "inline";
    }
    setTimeout(next,1500);
}
function showScore()
{
    current_form.style.display = "none";
    var quiztext=document.getElementById("score");
    quiztext.style.display = "block";
    if(score<4)
    {
        quiztext.innerHTML="<h2>Score: "+ (score/nQuestions)*100 +"%</h2><br><h3>Are you sure you have ever heard of Arctic Monkeys?</h3>";
    }
    else if(score<7)
    {
        quiztext.innerHTML="<h2>Score: "+ (score/nQuestions)*100 +"%</h2><br><h3>Let's hope it wasn't luck, listen to more songs</h3>";
    }
    else if(score<10)
    {
        quiztext.innerHTML="<h2>Score: "+ (score/nQuestions)*100 +"%</h2><br><h3>Well well, what we have here? A crazy fan indeed</h3>";
    }
    else
    {
        quiztext.innerHTML="<h2>Score: "+ (score/nQuestions)*100 +"%</h2><br><h3>Alex, is that you?</h3>";
    }
    var img = document.createElement("img");
    img.src = "images/avatars.png";
    img.alt="Avatars";
    img.id="avatars";
    quiztext.appendChild(img);
}