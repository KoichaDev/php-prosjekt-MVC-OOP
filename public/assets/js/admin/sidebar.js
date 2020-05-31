document.addEventListener("DOMContentLoaded", () => {
  document.querySelector(".nav-btn").addEventListener("click", (e) => {
    e.preventDefault();
    const sideBar = document.querySelector(".sidebar");
    
    if (sideBar.style.display === "none") {
      sideBar.style.display = "block";
    } else {
      sideBar.style.display = "none";
    }
  });
});
