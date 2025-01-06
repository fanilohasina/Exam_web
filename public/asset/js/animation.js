function sortir(button) {
  const buttonEl = document.getElementById(button);
  buttonEl.addEventListener("click", function (event) {
    if (buttonEl.hasAttribute("afterAnimation")) {
      return;
    }

    event.preventDefault(); // Empêche le comportement par défaut (navigation immédiate)

    // Ajouter des classes aux div existants
    const element1 = document.querySelectorAll(".element1");

    element1.forEach((el) => {
      el.classList.add("sort1");
    });
    const element2 = document.querySelectorAll(".element2");

    element2.forEach((el) => {
      el.classList.add("sort2");
    });
    const element3 = document.querySelectorAll(".element3");

    element3.forEach((el) => {
      el.classList.add("sort3");
    });
    const element4 = document.querySelectorAll(".element4");

    element4.forEach((el) => {
      el.classList.add("sort4");
    });
    
    setTimeout(() => {
      buttonEl.setAttribute("afterAnimation", "");
      buttonEl.click();
    }, 200);
  });
}
function entreProg() {
  const elements = document.querySelectorAll(".elementProg"); // Sélectionne tous les éléments
  let delay = 0; // Initialisation du délai

  elements.forEach((el, index) => {
    setTimeout(() => {
      el.classList.add("entreProg");
      el.classList.remove("opacity"); // Ajoute la classe après le délai
    }, delay);

    delay += 100; // Augmente le délai de 0,5 seconde pour chaque élément
  });
}
