document.addEventListener("DOMContentLoaded", () => {
    const barralateral = document.querySelector(".barra-lateral");
    const foto = document.getElementById("foto");
    const spans = document.querySelectorAll("span");
    const palanca = document.querySelector(".switch");
    const circulo = document.querySelector(".circulo");
    const menu = document.querySelector(".menu");
    const main = document.querySelector("main");
    const links = document.querySelectorAll(".navegacion a");
    const mainContent = document.querySelector("main");

    if (foto) {
        foto.addEventListener("click", () => {
            barralateral.classList.toggle("mini-barra-lateral");
            main.classList.toggle("min-main");
            // Iteramos sobre cada span para agregar la clase 'oculto'
            spans.forEach((span) => {
                span.classList.toggle("oculto");
            });
        });
    } else {
        console.log("No se encontró el elemento foto");
    }

    //evento del botón menú
    menu.addEventListener("click", () => {
        barralateral.classList.toggle("max-barra-lateral");
        if (barralateral.classList.contains("max-barra-lateral")) {
            menu.children[0].style.display = "none";
            menu.children[1].style.display = "block";
        }
        else {
            menu.children[0].style.display = "block";
            menu.children[1].style.display = "none";
        }
        if (window.innerWidth <= 320) {
            barralateral.classList.add("mini-barra-lateral");
            main.classList.add("min-main");
            spans.forEach((span) => {
                span.classList.toggle("oculto");
            });
        }
    });

    // Evento para cambiar al modo oscuro
    if (palanca) {
        palanca.addEventListener("click", () => {
            let body = document.body;
            body.classList.toggle("dark-mode");
            circulo.classList.toggle("prendido");
        });
    } else {
        console.log("No se encontró el elemento switch");
    }

    // Función para cargar contenido dinámico
    function loadPage(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                mainContent.innerHTML = data;
            })
            .catch(error => {
                console.error("Error al cargar la página:", error);
                mainContent.innerHTML = "<h1>Error al cargar el contenido</h1>";
            });
    }

    // Cargar automáticamente el dashboard al iniciar
    loadPage("dashboard.php");

    // Evento click para cada enlace de la barra lateral
    links.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const page = link.getAttribute("data-page");
            if (page) {
                loadPage(page);
            }
        });
    });
});