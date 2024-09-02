// Carousel functionality
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

// Side panel functionality
function openNav() {
    document.getElementById("right-side-panel").style.width = "300px";
}

function closeNav() {
    document.getElementById("right-side-panel").style.width = "0";
}

// Details popup functionality
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

// Modal functionality
var modal = document.getElementById("myModal");

// Check that modal and buttons exist
if (modal) {
    var btn = document.getElementById("login-button");
    var span = document.querySelector("#myModal .close");

    // Ensure button exists
    if (btn) {
        btn.onclick = function() {
            modal.style.display = "block";
        }
    }

    // Ensure close button exists
    if (span) {
        span.onclick = function() {
            modal.style.display = "none";
        }
    }

    // Close modal if clicked outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
// Get the chat button and chat box elements
const chatButton = document.querySelector('.chat-button');
const chatBox = document.querySelector('.chat-box');

// Position the chat box near the chat button
function positionChatBox() {
    const buttonRect = chatButton.getBoundingClientRect();
    console.log('Button Rect:', buttonRect);
    chatBox.style.left = `${buttonRect.left + (chatButton.offsetWidth / 2) - (chatBox.offsetWidth / 6)}px`;
    console.log('Chat Box Style:', chatBox.style.bottom, chatBox.style.left);
}

// Function to show the chat box with an animation
function showChatBox() {
    chatBox.classList.add('visible');
    setTimeout(() => {
        chatBox.classList.remove('visible');
    }, 60000); // Box visible for 60 seconds
}

// Position the chat box initially
positionChatBox();

// Re-position the chat box on window resize
window.addEventListener('resize', positionChatBox);

// Show the chat box when the chat button is clicked
chatButton.addEventListener('click', showChatBox);
