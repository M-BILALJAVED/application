window.onload = function () {
    // Delay hiding the Loader_main by 800 milliseconds
    setTimeout(() => {
        const wrapper = document.getElementById("wrapper");
        const Loader_main = document.getElementById("Loader_main");

        // Remove D_none from the wrapper and add d-flex
        wrapper.classList.remove("d-none");
        wrapper.classList.add("d-flex");

        // Add D_none to the Loader_main and add d-flex
        Loader_main.classList.remove("d-flex");
        Loader_main.classList.add("d-none");
    }, 800);
}