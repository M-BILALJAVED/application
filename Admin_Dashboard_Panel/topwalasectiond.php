<div class="top">

    <i class="hammBurgur bi bi-list sidebar-toggle text-white" style="z-index: 2;"></i>


    <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search here...">
    </div>

    <img src="images/profile.png" alt="pic">
</div>

<script>
    const hammBurgur = document.querySelector(".hammBurgur");
    let Right_Side_shayd = document.getElementById('Right_Side_shayd')


    hammBurgur.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");

        if (document.querySelector("#sidebar").classList.contains("expand")) {
            // If the sidebar has the "expand" class
            // Initial check on page load
            if (window.innerWidth < 800) {
                document.getElementById('Right_Side_shayd').style.display = 'block';
            } else {
                document.getElementById('Right_Side_shayd').style.display = 'none';
            }  // Show the element
            Right_Side_shayd.addEventListener("click", function () {
                document.querySelector("#sidebar").classList.remove("expand");
                document.getElementById('Right_Side_shayd').style.display = 'none';  // Hide the element

            });
            console.log("Sidebar is expanded");
        } else {
            // If the sidebar does not have the "expand" class
            document.getElementById('Right_Side_shayd').style.display = 'none';  // Hide the element
            console.log("Sidebar is collapsed");
        }

    });

</script>