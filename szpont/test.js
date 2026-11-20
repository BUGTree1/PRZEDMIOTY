let ctx    = null;
let width  = 0;
let height = 0;
let time   = 0;

const R     = 1.0;
const wx    = 1.0;
const wy    = 1.0;
const wz    = 1.0;
const speed = 0.015;

const cam_x = -2.0;
const cam_y = -2.0;
const cam_z = -2.0;

const tri_color = "#5544dd"
const bg_color = "#081220"

function degtorad(deg) {
    return deg * (Math.PI / 180.0);
}

function set_color(color) {
    ctx.fillStyle = color;
}

function clear(color) {
    set_color(color);
    ctx.fillRect(0, 0, width, height);
}

function draw_tri(x1, y1, x2, y2, x3, y3, color) {
    set_color(color);
    ctx.beginPath();
    ctx.moveTo((x1 + 1.0) / 2.0 * width, (-y1 + 1.0) / 2.0 * height);
    ctx.lineTo((x2 + 1.0) / 2.0 * width, (-y2 + 1.0) / 2.0 * height);
    ctx.lineTo((x3 + 1.0) / 2.0 * width, (-y3 + 1.0) / 2.0 * height);
    ctx.closePath();
    ctx.fill();
}

function draw_tri_3d(x1, y1, z1, x2, y2, z2, x3, y3, z3, color) {
    const pz1 = z1 - cam_z;
    const pz2 = z2 - cam_z;
    const pz3 = z3 - cam_z;
    draw_tri(x1 / pz1, y1 / pz1, x2 / pz2, y2 / pz2, x3 / pz3, y3 / pz3, color);
    //draw_tri(x1, y1, x2, y2, x3, y3, color);
}

function draw_example_tri() {
    const alpha = wx * time * speed;
    const beta  = wy * time * speed;
    const gamma = wz * time * speed;

    const sinA = Math.sin(alpha), cosA = Math.cos(alpha);
    const sinB = Math.sin(beta),  cosB = Math.cos(beta);
    const sinG = Math.sin(gamma), cosG = Math.cos(gamma);

    const m00 = cosB * cosG;
    const m01 = sinA * sinB * cosG - cosA * sinG;

    const m10 = cosB * sinG;
    const m11 = sinA * sinB * sinG + cosA * cosG;

    const m20 = -sinB;
    const m21 = sinA * cosB;

    const halfR = 0.5 * R;
    const sqrt3HalfR = (Math.sqrt(3) / 2) * R;
    
    const v1 = [
        R * m01,
        R * m11,
        R * m21
    ];

    const v2 = [
        -sqrt3HalfR * m00 - halfR * m01,
        -sqrt3HalfR * m10 - halfR * m11,
        -sqrt3HalfR * m20 - halfR * m21
    ];

    const v3 = [
        sqrt3HalfR * m00 - halfR * m01,
        sqrt3HalfR * m10 - halfR * m11,
        sqrt3HalfR * m20 - halfR * m21
    ];

    draw_tri_3d(v1[0], v1[1], v1[2], v2[0], v2[1], v2[2], v3[0], v3[1], v3[2], tri_color);
}

function update() {
    clear(bg_color);
    //draw_tri(-0.5, -0.5, 0, 0.5, 0.5, -0.5, "red");

    draw_example_tri();
    time++;
}

function init(kanwa) {
    ctx    = kanwa.getContext("2d");
    width  = kanwa.width;
    height = kanwa.height;
    setInterval(update, 10);
}

document.addEventListener("DOMContentLoaded", () => {
    init(document.getElementById("kanwa"));
});
