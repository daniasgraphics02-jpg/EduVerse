document.addEventListener("DOMContentLoaded", () => {

    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach(item => {

        const question = item.querySelector(".faq-question");
        const answer = item.querySelector(".faq-answer");

        // Open first FAQ by default
        if(item.classList.contains("active")){
            answer.style.maxHeight = answer.scrollHeight + "px";
        }

        question.addEventListener("click", () => {

            const isActive = item.classList.contains("active");

            // Close all FAQs
            faqItems.forEach(faq => {

                faq.classList.remove("active");

                faq.querySelector(".faq-answer").style.maxHeight = null;

            });

            // Open clicked FAQ
            if(!isActive){

                item.classList.add("active");

                answer.style.maxHeight = answer.scrollHeight + "px";

            }

        });

    });

});