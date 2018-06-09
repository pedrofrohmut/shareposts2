const scrollTopBtn = document.getElementById("scrollTopBtn");

const handleScroll = function(e) {
    toggleGoToTopBtn();
    moveUpGotToTopBtn();
};

const goToTopClick = function(e) {
    document.documentElement.scrollTop = 0;
    scrollTopBtn.style.display = "none";
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