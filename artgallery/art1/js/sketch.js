function setup() {
    createCanvas(400, 400).parent('canvasContainer');
}

function draw() {
    background(0); // background colour

    // follow mouse
    let x = mouseX;
    let y = mouseY;

   // blue circle and black border
    stroke(0);
    strokeWeight(4); // black border
    fill(0, 0, 255);
    ellipseMode(RADIUS);
    ellipse(x, y, 30, 30);

    // white circle and border
    strokeWeight(4); // black border 
    fill(255);
    ellipseMode(CENTER);
    ellipse(x, y, 15, 15);

   // small blue circle no border
    noStroke();
    fill(0, 0, 255);
    ellipse(x, y, 8, 8);
}
