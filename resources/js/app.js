import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu-item");

    menuItems.forEach((menuItem) => {
        const dropdown = menuItem.querySelector(".dropdown");
        if (!dropdown) return;

        menuItem.addEventListener("click", function (event) {
            event.stopPropagation();

            menuItems.forEach((item) => {
                if (item !== menuItem) {
                    const otherDropdown = item.querySelector(".dropdown");
                    if (otherDropdown) {
                        otherDropdown.style.display = "none";
                    }
                }
            });

            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        });
    });

    document.addEventListener("click", function () {
        menuItems.forEach((menuItem) => {
            const dropdown = menuItem.querySelector(".dropdown");
            if (dropdown) {
                dropdown.style.display = "none";
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("dataSulawesiBtn");
    const dropdown = document.getElementById("dataSulawesiDropdown");

    // Event listener untuk membuka/tutup dropdown saat tombol diklik
    btn.addEventListener("click", function (e) {
        e.stopPropagation(); // Mencegah klik pada tombol dianggap klik pada body
        dropdown.classList.toggle("hidden");
    });

    // Event listener untuk menutup dropdown jika klik di luar dropdown
    document.addEventListener("click", function () {
        if (!dropdown.classList.contains("hidden")) {
            dropdown.classList.add("hidden");
        }
    });

    // Event listener untuk mencegah dropdown tertutup jika diklik di dalamnya
    dropdown.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});
