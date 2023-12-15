let ellipses = [];

function setup() {
    let canvas = createCanvas(800, 600);
    canvas.parent('canvasContainer');

    for (let i = 0; i < 100; i++) {
        // evil eye ellipse randomiser: random positions, velocities, and colors
        let ellipseObj = {
            x: random(width),
            y: random(height),
            xSpeed: random(-2, 2),
            ySpeed: random(-2, 2),
            size: random(10, 30),
            fillColor: color(random(255), random(255), random(255)),
            outlineColor: color(0),
            outlineWeight: 4
        };
        ellipses.push(ellipseObj);
    }
}

function draw() {
    background(0); // background colour

    for (let i = 0; i < ellipses.length; i++) {
        let ellipseObj = ellipses[i];

        // speed of bouncy
        ellipseObj.x += ellipseObj.xSpeed;
        ellipseObj.y += ellipseObj.ySpeed;

        // Bounce when hitting corner of canbas
        if (ellipseObj.x < 0 || ellipseObj.x > width) {
            ellipseObj.xSpeed *= -1;
        }
        if (ellipseObj.y < 0 || ellipseObj.y > height) {
            ellipseObj.ySpeed *= -1;
        }

        // evil eye ellipse
        drawEvilEye(
            ellipseObj.x,
            ellipseObj.y,
            ellipseObj.size,
            ellipseObj.fillColor,
            ellipseObj.outlineColor,
            ellipseObj.outlineWeight
        );
    }
}

function drawEvilEye(x, y, size, fillColor, outlineColor, outlineWeight) {
    // blue circle and black border
    stroke(outlineColor);
    strokeWeight(outlineWeight);
    fill(fillColor);
    ellipseMode(RADIUS);
    ellipse(x, y, size, size);

    // white circle and black border
    strokeWeight(outlineWeight);
    fill(255);
    ellipseMode(CENTER);
    ellipse(x, y, size * 0.5, size * 0.5);

    // small blue circle no border
    noStroke();
    fill(fillColor);
    ellipse(x, y, size * 0.2, size * 0.2);
}

