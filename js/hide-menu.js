const menu = document.querySelector(".menu");
        function hideMenuOnSmallScreen() {
            if (window.innerWidth < 900) {
                menu.classList.add("menu-hidden");
               
            } else {
                menu.classList.remove("menu-hidden");
         
            }
        }

        // Initial check on page load
        hideMenuOnSmallScreen();

        // Listen for window resize events
        window.addEventListener("resize", hideMenuOnSmallScreen);