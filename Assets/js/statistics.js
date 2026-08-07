/*=====================================================
            EDUVERSE STATISTICS
=====================================================*/

document.addEventListener("DOMContentLoaded", () => {

    const section = document.querySelector(".statistics");
    const counters = document.querySelectorAll(".counter");
    const cards = document.querySelectorAll(".stat-card");

    let started = false;

    /*=====================================
            COUNTER
    =====================================*/

    function startCounter() {

        counters.forEach(counter => {

            const target = +counter.dataset.target;

            let count = 0;

            const speed = target / 120;

            function updateCounter() {

                count += speed;

                if (count < target) {

                    counter.innerText = Math.floor(count).toLocaleString();

                    requestAnimationFrame(updateCounter);

                }

                else {

                    counter.innerText = target.toLocaleString() + "+";

                }

            }

            updateCounter();

        });

    }


    /*=====================================
        INTERSECTION OBSERVER
    =====================================*/

    const observer = new IntersectionObserver(entries => {

        entries.forEach(entry => {

            if (entry.isIntersecting && !started) {

                started = true;

                startCounter();

                animateCards();

            }

        });

    }, {

        threshold:0.35

    });

    observer.observe(section);



    /*=====================================
            CARD ANIMATION
    =====================================*/

    function animateCards(){

        cards.forEach((card,index)=>{

            card.style.opacity="0";
            card.style.transform="translateY(60px)";

            setTimeout(()=>{

                card.style.transition="all .7s ease";

                card.style.opacity="1";

                card.style.transform="translateY(0)";

            },index*180);

        });

    }



    /*=====================================
            FLOAT ICON
    =====================================*/

    document.querySelectorAll(".stat-icon").forEach((icon,index)=>{

        icon.style.animation=

        `floating ${3+index*.3}s ease-in-out infinite`;

    });



    /*=====================================
            3D HOVER EFFECT
    =====================================*/

    cards.forEach(card=>{

        card.addEventListener("mousemove",(e)=>{

            const rect=card.getBoundingClientRect();

            const x=e.clientX-rect.left;

            const y=e.clientY-rect.top;

            const centerX=rect.width/2;

            const centerY=rect.height/2;

            const rotateX=((y-centerY)/18);

            const rotateY=((centerX-x)/18);

            card.style.transform=

            `perspective(900px)
            rotateX(${rotateX}deg)
            rotateY(${rotateY}deg)
            translateY(-8px)`;

        });

        card.addEventListener("mouseleave",()=>{

            card.style.transform=

            "perspective(900px) rotateX(0) rotateY(0) translateY(0)";

        });

    });



    /*=====================================
            BADGES HOVER
    =====================================*/

    document.querySelectorAll(".badge").forEach(badge=>{

        badge.addEventListener("mouseenter",()=>{

            badge.style.transform="translateY(-6px) scale(1.05)";

        });

        badge.addEventListener("mouseleave",()=>{

            badge.style.transform="translateY(0) scale(1)";

        });

    });

});