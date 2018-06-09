<style>
button#scrollTopBtn {   
    display: none;   
    opacity: 0.3;
    position: fixed;
    bottom: 8px;
    right: 8px; 
    z-index: 1;
    font-size: 1.5rem;
    -webkit-transform: translate3d(0, 0, 0); /* the button dont jump when scrolling */
    transform : translate3d(0, 0, 0); /* the button dont jump when scrolling */
}

button#scrollTopBtn:hover { 
    opacity: 1; 
}
</style>

<!-- OTHER FONT AWESOME SYMBOLS TO USE
fa fa-angle-double-up
fa fa-angle-up
fa fa-chevron-up
fa fa-chevron-circle-up
fa fa-arrow-up
fa fa-arrow-circle-up
fa fa-arrow-circle-o-up
fa fa-caret-up -->
<button class="btn btn-dark" id="scrollTopBtn" title="Back to Top">
    <i class="fa fa-arrow-up"></i>  <!-- <br> TOP -->
</button>

<script>
const scrollTopBtn = document.getElementById("scrollTopBtn");

const handleScroll = function(e) {
    toggleGoToTopBtn();
    moveUpGotToTopBtn();
};

const goToTopClick = function(e) {
    scrollTopBtn.style.display = "none";
    // SCROLL UP SPEED HERE: interval in milliseconds
    let interval = setInterval(frame, 5);
    function frame() {
        if (document.documentElement.scrollTop === 0) {
            clearInterval(interval);
            document.documentElement.scrollTop = 0;
        } else {
            // SCROLL UP SPEED HERE: number of pixel for call
            document.documentElement.scrollTop = document.documentElement.scrollTop - 20;
        }
    }
};

// Listeners
scrollTopBtn.addEventListener("click", e => goToTopClick(e));
window.addEventListener("scroll", e => handleScroll(e));

function moveUpGotToTopBtn() {
    if (window.innerHeight + document.documentElement.scrollTop === document.body.clientHeight) {
        scrollTopBtn.style.bottom = "50px";
    }
    else {
        scrollTopBtn.style.bottom = "8px";
    }
}

function toggleGoToTopBtn() {
    if (document.documentElement.scrollTop >= 200) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }
}
</script>