(function() {
    "use strict";
    document.addEventListener("DOMContentLoaded", function() {
        
        var toggles = document.querySelectorAll(".toggle");
        var menu = document.querySelector("#bko-mobile-menu");
        var menuOpen = false;
        var loginModal = false;
        var registerModal = false;
     
        function closeMobile(e) {
            menuOpen = false;
            menu.children[0].style.transform = null;
            var timeout = setTimeout(() => {
                /* we wait till the transition completes (250ms)
                 before we remove the scroll block and hide the mobile menu */
                menu.classList.toggle("is-active");
                document.documentElement.classList.remove("no-scroll");
                document.documentElement.style.overflow = null;
                clearTimeout(timeout);
              }, 250);
        }

        function toggleMobile(e) {
            if (menuOpen) return closeMobile(e);
            menuOpen = true;
            menu.classList.add("is-active");
            document.documentElement.classList.add("no-scroll");
            document.documentElement.style.overflow = "hidden";
            
            var timeout = setTimeout(() => {
                /* we want to display the parent container before we start the transition */
                menu.children[0].style.transform = "translateX(0)";
                clearTimeout(timeout);
              }, 100);
        }

        toggles.forEach(function(el) {
            el.addEventListener("click", toggleMobile, false);
        });

        /* prevent closing the menu long as you're within the menu container */
        menu.children[0].addEventListener("click", function(e) { e.stopPropagation(); });

        /* clicking outside the menu container will close the menu */
        menu.addEventListener("click", closeMobile, false);
    });
})();