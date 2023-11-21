   // hide geners
     document.addEventListener("DOMContentLoaded", function() {
    let genersBtn = document.getElementById("genersBtn");
    let genersContainer = document.getElementById("genersContainer");

    genersBtn.addEventListener("click", function() {
        if (genersContainer.style.display === "none") {
            genersContainer.style.display = "block";
        } else {
            genersContainer.style.display = "none";
        }
    });
});

// go to top btn
    const goTopBtn = document.querySelector('.go-top-btn');

window.addEventListener('scroll', checkHeight)

function checkHeight(){
if(window.scrollY > 1500) {
goTopBtn.style.display = "flex"
} else {
goTopBtn.style.display = "none"
}
}

goTopBtn.addEventListener('click', () => {
window.scrollTo({
top: 0,
behavior: "smooth"
})
})

