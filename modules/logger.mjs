import fs from "node:fs/promises";
import path from "node:path";
import { fileURLToPath } from "node:url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const logPath = path.join(__dirname, "../logs/app.log");

export async function log(level, message) {
  const time = new Date().toLocaleString("tr-TR");
  const line = `[${time}] ${level.toUpperCase()}: ${message}\n`;

  try {
    await fs.appendFile(logPath, line);
    console.log(line.trim());
  } catch (err) {
    console.error("Log yazilamadi:", err.message);
  }
}