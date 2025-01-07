class RandomPicker {
  currentRandom = [];
  element = [];
  currentElement = [];

  constructor(element) {
    let array = [];
    for (let i = 0; i < element.length; i++) array.push(i);

    this.originalArray = [...array];
    this.available = [...array];
    this.used = [];
    this.element = element;
  }

  getElement() {
    return this.currentElement;
  }

  getCurrentRandom() {
    return this.currentRandom;
  }

  getRandomElements(n) {
    if (n > this.originalArray.length) {
      throw new Error("Requested more elements than available in the array.");
    }

    const result = [];

    for (let i = 0; i < n; i++) {
      if (this.available.length === 0) {
        this.available = [
          ...this.originalArray.filter(
            (e) => !this.getCurrentRandom().includes(e)
          ),
        ];
        this.used = [];
      }

      // Pick a random index from the available array
      const randomIndex = Math.floor(Math.random() * this.available.length);
      const value = this.available[randomIndex];

      // Remove the value from available and add it to used
      this.available.splice(randomIndex, 1);
      this.used.push(value);

      // Add the value to the result
      result.push(value);
    }

    this.currentRandom = result;
    for (let i = 0; i < this.currentRandom.length; i++) {
      this.currentElement.push(this.element[this.currentRandom[i]]);
    }
    return this.getElement();
  }

  changeValue(index) {
    if (index < 0 || index >= this.currentRandom.length)
      throw new Error("Invalid index provided.");

    if (this.available.length === 0) {
      this.available = [
        ...this.originalArray.filter(
          (e) => !this.getCurrentRandom().includes(e)
        ),
      ];
      this.used = [];
    }

    const oldValue = this.getCurrentRandom()[index];

    this.used.push(oldValue);

    const newValue = this.available.shift();

    this.currentRandom[index] = newValue;

    this.currentElement = [];
    for (let i = 0; i < this.currentRandom.length; i++) {
      this.currentElement.push(this.element[this.currentRandom[i]]);
    }
    return this.getElement();
  }
}

function templateCadeau(cadeau, index) {
  let div = document.createElement("div");
  div.classList.add("itemCadeau");
  div.setAttribute('data-cadeau-prix', cadeau.prix);
  let img = document.createElement("img");
  img.src = cadeau.image;
  img.setAttribute("data-image", cadeau.name);
  div.appendChild(img);

  let div2 = document.createElement("div");
  div2.classList.add("descriptCadeau");
  div2.setAttribute("cadeau-id", cadeau.id);

  let div3 = document.createElement("div");
  let h1 = document.createElement("h1");
  h1.innerText = cadeau.name;
  let p = document.createElement("p");
  p.innerText = cadeau.prix;
  div3.appendChild(h1);
  div3.appendChild(p);

  div2.appendChild(div3);

  let div4 = document.createElement("div");
  let but1 = document.createElement("button");
  but1.classList.add("btn");
  but1.classList.add("btn-success");
  but1.innerText = "Valider";
  div4.appendChild(but1);
  let but2 = document.createElement("button");
  but2.classList.add("btn");
  but2.classList.add("btn-default");
  but2.setAttribute("data-index", index);
  but2.setAttribute("data-type", cadeau.type);
  but2.setAttribute("data-change-cadeau", "");
  but2.innerText = "Changer";
  div4.appendChild(but2);

  let inp = document.createElement("input");
  inp.type = "hidden";
  inp.name = `type_${cadeau.type}[]`;
  inp.value = cadeau.id;
  div4.appendChild(inp);

  div2.appendChild(div4);
  div.appendChild(div2);

  return div;
}

function dummyImage() {
  const imgs = document.querySelectorAll("[data-image]");
  imgs.forEach((img) => {
    const text = img.getAttribute("data-image");
    const canvas = document.createElement("canvas");
    canvas.width = 800;
    canvas.height = 400;

    // Get the canvas context
    const ctx = canvas.getContext("2d");

    // Draw a gray background
    ctx.fillStyle = "gray";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Set text properties
    ctx.font = "50px Arial";
    ctx.fillStyle = "white";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";

    // Add text
    ctx.fillText(text, canvas.width / 2, canvas.height / 2);

    // Convert the canvas to a data URL
    const dataURL = canvas.toDataURL();

    img.src = dataURL;
  });
}
