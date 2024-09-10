let slideIndex = 0;
let intervalId;

const slides = document.querySelectorAll('.slide');
const slidesContainer = document.querySelector('.slides');
const intervalTime = 5000; // 5 seconds

function showSlide(n) {
    if (n >= slides.length) {
        slideIndex = 0;
    } else if (n < 0) {
        slideIndex = slides.length - 1;
    } else {
        slideIndex = n;
    }
    const offset = -slideIndex * 100;
    slidesContainer.style.transform = `translateX(${offset}%)`;
}

function moveSlide(n) {
    clearInterval(intervalId);
    showSlide(slideIndex + n);
    intervalId = setInterval(autoSlide, intervalTime);
}

function autoSlide() {
    slideIndex++;
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    showSlide(slideIndex);
}

intervalId = setInterval(autoSlide, intervalTime);
showSlide(slideIndex);

function openNav() {
    document.getElementById("right-side-panel").style.width = "300px";
}

function closeNav() {
    document.getElementById("right-side-panel").style.width = "0";
}
document.getElementById('details-button').addEventListener('click', function() {
    var popup = document.getElementById('details-popup');
    popup.style.display = 'block';
    setTimeout(() => {
        popup.style.transform = 'translateY(0)';
    }, 10); // slight delay for the slide effect
});

document.getElementById('close-popup').addEventListener('click', function() {
    var popup = document.getElementById('details-popup');
    popup.style.transform = 'translateY(-100%)';
    setTimeout(() => {
    popup.style.display = 'none';
    }, 300); // match the transition duration
});
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("login-button");

var btn = document.getElementById("logout-button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}   