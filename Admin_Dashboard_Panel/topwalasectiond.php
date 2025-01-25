<div class="top">

    <i class="lanlymera bi bi-list sidebar-toggle"></i>


    <div class="search-box">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search here...">
    </div>

    <img src="images/profile.png" alt="pic">
</div>

<script>
    const lanlymera = document.querySelector(".lanlymera");

    lanlymera.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

</script>