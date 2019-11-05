var MIN_BRIGHTNESS = 0.1;
var MAX_BRIGHTNESS = 1.0;
var MIN_COLOR = 200;
var MAX_COLOR = 255;
var MIN_SIZE = 0.1;
var MAX_SIZE = 1.5;
var NUM_STARS = 1000;

function init() {
    var canvas = document.getElementById("background");
    var context = canvas.getContext("2d");
        context.canvas.width = window.innerWidth;
        context.canvas.height = window.innerHeight;
    var starfield = generateStarfield();
    draw(context, starfield);
    initNav();
}

function initNav() {
    var handler = document.getElementById("nav-handle");
    handler.addEventListener("click", toggleNav);
}

function draw(context, starfield) {
    for(var i = 0; i < starfield.length; i++) {
        var star = starfield[i];
        context.fillStyle = "rgba(" + star.color.r + "," + star.color.g + ", " + star.color.b + ", " + star.brightness + ")";
        context.beginPath();
        context.arc(star.x, star.y, star.radius, 0, 2 * Math.PI);
        context.fill();
    }
}

function generateColor() {
    var color = new Color(
        Math.round(getRandom(MIN_COLOR, MAX_COLOR)),
        MIN_COLOR,
        Math.round(getRandom(MIN_COLOR, MAX_COLOR))
    );
    return color;
}

function generateStarfield() {
    var stars = [];
    for(var i = 0; i < NUM_STARS; i++) {
        var x = getRandom(0, window.innerWidth);
        var y = getRandom(0, window.innerHeight);
        var radius = getRandom(MIN_SIZE, MAX_SIZE);
        var brightness = getRandom(MIN_BRIGHTNESS, MAX_BRIGHTNESS);
        var color = generateColor();
        stars.push(new Star(x, y, radius, brightness, color));
    }
    return stars;
}
    
function getRandom(min, max) {
    return (Math.random() * (max - min)) + min;
}

function toggleNav() {
    this.classList.toggle("handle-active");
    var main = document.getElementById("main");
    main.classList.toggle("nav-active");
}

function Color(r, g, b) {
    this.r = r;
    this.g = g;
    this.b = b;
}

function Star(x, y, r, b, c) {
    this.x = x;
    this.y = y;
    this.radius = r;
    this.brightness = b;
    this.color = c;
}

window.addEventListener("load", init);