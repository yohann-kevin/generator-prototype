// tableau avec voyelle minuscule
let vowelMin = ['a', 'e', 'i', 'o', 'u', 'y'];
// tab voyelle maj
let vowelMaj = ['A', 'E', 'I', 'O', 'U', 'Y'];
// tableau avec consonne minuscule
let consonantMin = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'z'];
// tab consonne maj
let consonantMaj = ['B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Z'];
// tableau avec chiffre
let number = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
// tableau avec symbol
let symbol = ['.', '/', '!', '$', '-', '_', '#', '*', '?'];
// récupère l'élément html body
let generator = document.getElementById('generator');
// crée un titre en html
let title = document.createElement('h1');

let symbolActive = false;

// déclaration de variable vide
let name = '';
let randomNumber;

function start() {
    activateSymbol();
    // on insère le titre dans le body
    generator.appendChild(title);
    for (let i = 0; i < 7; i++) {
        // on asigne nos différent charactère a la variable name
        if (name.length < 24) {
            if (name != '') {
                name += consonantMin[randomNum(consonantMin)] + vowelMin[randomNum(vowelMin)] + consonantMaj[randomNum(consonantMaj)] + vowelMaj[randomNum(vowelMaj)];
            } else {
                name = consonantMin[randomNum(consonantMin)] + vowelMin[randomNum(vowelMin)] + consonantMaj[randomNum(consonantMaj)] + vowelMaj[randomNum(vowelMaj)];
            }
        } else if (name.length > 22) {
            if (symbolActive) {
                name += number[randomNum(number)] + symbol[randomNum(symbol)];
            } else if (!symbolActive) {
                name += consonantMin[randomNum(consonantMin)] + vowelMin[randomNum(vowelMin)]
            }
        }
    }
    // on assigne la variable name a title
    title.textContent = name;
}

// fonction permettant de générer un nnuméro aléatoire
function randomNum(tab) {
    randomNumber = Math.floor(Math.random() * Math.floor(tab.length));
    return randomNumber;
}

// fonction générer pour le bouton générer
function generate() {
    name = '';
    start();
}

// fonction permettant d'activer les symbols
function activateSymbol() {
    let checkSymbol = document.getElementById('checkSymbol').checked;
    if (checkSymbol) {
        symbolActive = true;
    } else if (!checkSymbol) {
        symbolActive = false;
    }
    return symbolActive;
}

// lance la fonction start
start();