//Load ajax connection
window.onload = initializeAjax();

//hide unnecessary images
window.onload = hideSymbols();

//hide score image
document.getElementById("score").style.display = "none";

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


//random question to be appeared
var rand = Math.floor((Math.random() * 10)); //random number from 0 to 9
var current_form = document.getElementById(questions[rand]);
current_form.style.display = "inline-block";


//count of current question
count_ques = 1;
//stack with questions that already been appeared
past_ques = [rand];

//show the current number of question
var legend_que = document.getElementById("qNumber");
legend_que.innerHTML = count_ques + "/" + nQuestions;

//score of user
var score = 0;


/**
 * Hiding the correct and incorrect images (to be used later)
 */
function hideSymbols() {
    document.getElementById("correct").style.display = "none";
    document.getElementById("incorrect").style.display = "none";
}

/**
 * Loads the next question
 */
function next() {
    var check_button = document.getElementById("checkButton");//changing the button text to Check Answer
    check_button.innerHTML="Check Answer";
    check_button.disabled = false; //enable
    hideSymbols();
    var flag = false;
    var rand;
    //if there more questions
    if (count_ques < nQuestions) {
        while (!flag) {//getting random numbers till a not answered question
            rand = Math.floor((Math.random() * 10)); //random number from 1 to 10 - getting a random question number
            flag = checkPast(rand);//checking if question already appeared
        }
        if (flag) {
            current_form.style.display = "none";//hide the current question
            var next_form = document.getElementById(questions[rand]);//get the next question
            next_form.style.display = "inline-block";//show the question
            current_form = next_form;
            count_ques++;
            legend_que.innerHTML = count_ques + "/" + nQuestions;//changing the number of current question
            past_ques.push(rand);//push the question id into the answered questions
        }

    }
    else {//if no more questions
        legend_que.style.display = "none";//hide the question number
        var check_button = document.getElementById("checkButton");//changing the button text to Try again
        check_button.innerHTML = "Try Again";
        showScore();//show the score div
        check_button.onclick = reload;// reload the page if try again button is pressed

    }
}
/**
 * reloading the page playing the quiz again
 */
function reload() {
    location.reload(true);//
}
/**
 * Check if the rand(ID) already exist on the answered questions
 * @param rand - id of random question's ID
 * @returns {boolean} True - if doesnt exist , False- if already exists
 */
function checkPast(rand) {
    for (var i = 0; i < past_ques.length; i++) {
        if (rand === past_ques[i]) {
            return false;
        }
    }
    return true;
}

//For ajax
var http = getXMLHttpRequest();

/**
 * Initialisation of Ajax
 */
function initializeAjax() {
    var check_button = document.getElementById("checkButton");
    check_button.onclick = checkAnswer;//when check answered is pressed
}
/**
 * getting the Ajax request
 * @returns {*}
 */
function getXMLHttpRequest() {
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return request;
}
/**
 * Get the response of the Ajax
 * @param ID - id of the current question
 * @param Answer - User answer of the current question
 */
function getResponse(ID, Answer) {
    var myURL = "getAnswer.php?ID=" + ID + "&An=" + Answer; // Url with 2 arguments - the Id of the question and the
    //user's answer
    http.open("GET", myURL);
    http.onreadystatechange = useHttpResponse;
    http.send();
}
/**
 * Using the http (Ajax) response
 */
function useHttpResponse() {
    if (http.readyState == 4) {//request finished and response is ready
        if (http.status == 200) { //everything OK
            showResult(http.responseText);
        }
    }
}
/**
 * Checking the user's answer
 */
function checkAnswer() {
    var ID = current_form.getAttribute("id").substring(8);//Get the id of the form by cropping the form's ID
    var radios = document.getElementsByName("answer" + ID);//getting user's answer
    var flag = false;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            getResponse(ID, i + 1);//getting the server response
            flag = true;
            break;
        }
    }
    if (!flag) {//in case the user's didn't choose a radio button
        alert("You must choose an answer");
    }

}
/**
 * Showing if the answer was correct or incorrect by showing the img
 * @param result the result of the server
 */
function showResult(result) {
    if (result == 1) {
        document.getElementById("correct").style.display = "inline"; //showing the "correct" image
        score += 1;//updating the score
    }
    else {
        document.getElementById("incorrect").style.display = "inline"; //showing the "incorrect" image
    }
    var check_button = document.getElementById("checkButton");//changing the button text to "wait"
    check_button.innerHTML = "Wait......";
    check_button.disabled = true; //disabling while waiting - debug
    setTimeout(next, 1500);//timeout till the next question appears
}
/**
 * Shows the final score of the user
 */
function showScore() {
    current_form.style.display = "none";//hides the current and last qustion
    var quiztext = document.getElementById("score");//get score element
    quiztext.style.display = "block";//shows the score element
    //depending on the score shows the specified message with the percent
    if (score < 4) {
        quiztext.innerHTML = "<h2>Score: " + (score / nQuestions) * 100 + "%</h2><br><h3>Are you sure you have ever heard of Arctic Monkeys?</h3>";
    }
    else if (score < 7) {
        quiztext.innerHTML = "<h2>Score: " + (score / nQuestions) * 100 + "%</h2><br><h3>Let's hope it wasn't luck, listen to more songs</h3>";
    }
    else if (score < 10) {
        quiztext.innerHTML = "<h2>Score: " + (score / nQuestions) * 100 + "%</h2><br><h3>Well well, what we have here? A crazy fan indeed</h3>";
    }
    else {
        quiztext.innerHTML = "<h2>Score: " + (score / nQuestions) * 100 + "%</h2><br><h3>Alex, is that you?</h3>";
    }
    var img = document.createElement("img");//creates and image to fill the space
    img.src = "images/avatars.png";
    img.alt = "Avatars";
    img.id = "avatars";
    quiztext.appendChild(img);
}