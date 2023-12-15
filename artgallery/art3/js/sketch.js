let angle = 0;

function setup() {
    let canvas = createCanvas(400, 400);
    canvas.parent('canvas-container');
    frameRate(30);
}

function draw() {
    background(0);

    // Calculate position based on angle for spinning effect
    let x = 200 + 100 * cos(angle);
    let y = 200 + 100 * sin(angle);

    // Evil eye ellipse that changes colors
    drawEvilEye(
        x,
        y,
        30,
        color(random(255), random(255), random(255)),
        color(0),
        4
    );

    // Increment angle for spinning animation
    angle += 0.05;
}

function drawEvilEye(x, y, size, fillColor, outlineColor, outlineWeight) {
    stroke(outlineColor);
    strokeWeight(outlineWeight);
    fill(fillColor);
    ellipseMode(RADIUS);
    ellipse(x, y, size, size);

    strokeWeight(outlineWeight);
    fill(255);
    ellipseMode(CENTER);
    ellipse(x, y, size * 0.5, size * 0.5);

    noStroke();
    fill(fillColor);
    ellipse(x, y, size * 0.2, size * 0.2);
}
