document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("myModal");
  const btn = document.getElementById("myBtn");
  const closeBtn = document.querySelector(".close");

  // Pastikan modal tersembunyi saat halaman dimuat
  modal.style.display = "none";

  // Tampilkan modal saat tombol ditekan
  btn.addEventListener("click", function () {
    modal.style.display = "flex"; // Tampilkan modal dengan flexbox
  });

  // Tutup modal saat tombol "x" ditekan
  closeBtn.addEventListener("click", function () {
    modal.style.display = "none"; // Sembunyikan modal
  });

  // Tutup modal saat klik di luar modal-content
  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});


document.addEventListener("DOMContentLoaded", (event) => {
  // Dark Mode Toggle
  const darkModeToggle = document.getElementById("dark-mode-toggle");
  const body = document.body;

  const darkMode = localStorage.getItem("darkMode");
  if (darkMode === "enabled") {
    body.classList.add("dark-mode");
  }

  // Dark Mode Remember

  darkModeToggle.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    if (body.classList.contains("dark-mode")) {
      localStorage.setItem("darkMode", "enabled");
    } else {
      localStorage.setItem("darkMode", "disabled");
    }
  });

  setInterval(updateCountdown, 1000);
});

// // Copy Text
// function copy() {
//   var copyText = document.getElementById("copyUID");
//   copyText.select();
//   copyText.setSelectionRange(0, 99999); 
//   navigator.clipboard.writeText(copyText.value);
//   alert("Copied the UID: " + copyText.value);
// }