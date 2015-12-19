
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
    current_form.style.display = "block";

    count_ques = 1;
    past_ques = [rand];


function next()
{
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
            next_form.style.display = "block";
            current_form=next_form;
            count_ques ++;
            past_ques.push(rand);
        }

    }
    else
    {
        alert("End of questions");
    }
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

function checkAnswer()
{

}