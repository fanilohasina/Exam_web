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
    this.currentElement = this.element.filter((e, k) =>
      this.getCurrentRandom().includes(k)
    );
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

    const oldValue = this.originalArray[index];

    this.used.push(oldValue);

    const newValue = this.available.shift();

    this.currentRandom[index] = newValue;

    this.currentElement = this.element.filter((e, k) =>
      this.getCurrentRandom().includes(k)
    );
    return this.getElement();
  }
}

function templateCadeau(cadeau, index) {
  let div = document.createElement('div');
  div.classList.add('itemCadeau');
  let img = document.createElement('img');
  img.src = cadeau.image;
  div.appendChild(img);

  let div2 = document.createElement('div');
  div2.classList.add('descriptCadeau');
  div2.setAttribute('cadeau-id', cadeau.id);

  let div3 = document.createElement('div');
  let h1 = document.createElement('h1');
  h1.innerText = cadeau.name;
  let p = document.createElement('p');
  p.innerText = cadeau.prix;
  div3.appendChild(h1);
  div3.appendChild(p);
  
  div2.appendChild(div3);

  let div4 = document.createElement('div');
  

  return `<div class="itemCadeau">
  <img src="${cadeau.image}" alt="">
  <div class="descriptCadeau" cadeau-id="${cadeau.id}">
      <div>
          <h1>${cadeau.name}</h1>
          <p>${cadeau.prix} $</p>
      </div>
      <div>
          <button class="btn btn-success">Valider</button>
          <button class="btn btn-default" data-index="${index}" data-type="${cadeau.type}">Changer</button>
      </div>
  </div>
</div>`;
}
