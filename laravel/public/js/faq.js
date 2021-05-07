const faq_questions = document.querySelectorAll(".faq-question");
const faq_answers = document.querySelectorAll(".faq-answer");

faq_questions.forEach(faq_question => {
    faq_question.onclick = question_clicked;
});

function question_clicked() {
    const answer = this.nextSibling.nextSibling;

    var open = false;
    if (!answer.hidden) {
        open = true;
    }

    faq_questions.forEach(faq_question => {
        faq_question.style.borderColor = "var(--bs-light)";
    });
    faq_answers.forEach(faq_answers => {
        faq_answers.hidden = true;
    });

    if (!open){
        answer.hidden = false;
        this.style.borderColor = "var(--green)";
    }
}
