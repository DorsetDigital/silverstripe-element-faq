document.querySelectorAll('.dorsetdigital__elements__faqelement .faq__question button').forEach((faq) => {
    faq.addEventListener("click", () => {
        let answerElem = faq.parentElement.nextElementSibling;
        answerElem.classList.toggle('expanded');
        let ex = "false";
        if (answerElem.classList.contains('expanded')) {
            ex = "true";
        }
        faq.setAttribute('aria-expanded', ex);
    });
});