const fs = require("node:fs/promises");
const path = require("node:path");

const filmsPath = path.join(__dirname, "../data/films.json");

async function readFilms() {
  try {
    const data = await fs.readFile(filmsPath, "utf-8");
    return JSON.parse(data);
  } catch (err) {
    console.error("Dosya okunamadi:", err.message);
    return { films: [] };
  }
}

async function writeFilms(data) {
  try {
    await fs.writeFile(filmsPath, JSON.stringify(data, null, 2), "utf-8");
    return true;
  } catch (err) {
    console.error("Dosya yazilamadi:", err.message);
    return false;
  }
}

module.exports = {
  readFilms,
  writeFilms
};