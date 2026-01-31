const http = require("node:http");
const fs = require("node:fs").promises;
const { createWriteStream } = require("node:fs");
const path = require("node:path");

const fileManager = require("./modules/fileManager");
const eventBus = require("./modules/eventBus");

// event-log
eventBus.on("filmViewed", async (title) => {
  const { log } = await import("./modules/logger.mjs");
  await log("event", `filmViewed - Film: ${title}`);
});

eventBus.on("reportGenerated", async (file) => {
  const { log } = await import("./modules/logger.mjs");
  await log("event", `reportGenerated - File: ${file}`);
});

const server = http.createServer(async (request, response) => {
  const { log } = await import("./modules/logger.mjs");

  const baseUrl = `http://${request.headers.host}`;
  const parsedUrl = new URL(request.url, baseUrl);
  const pathname = parsedUrl.pathname;

  await log("info", `${request.method} ${request.url}`);

  try {
    // ana sayfa
    if (pathname === "/") {
      const data = await fileManager.readFilms();
      const templatePath = path.join(__dirname, "templates", "home.html");
      let content = await fs.readFile(templatePath, "utf-8");

      const total = data.films.length;
      const watched = data.films.filter(f => f.watched).length;
      const avg = (data.films.reduce((a, f) => a + f.rating, 0) / total).toFixed(1);

      const last3 = data.films.slice(-3).reverse();
      const lastHtml = last3.map(f => `• ${f.title} (${f.year})`).join("<br>");

      const statsHtml = `
        Toplam Film: ${total}<br>
        İzlenen: ${watched} | İzlenmeyen: ${total - watched}<br>
        Ortalama Puan: ⭐ ${avg}<br><br>
        <b>Son Eklenenler:</b><br>
        ${lastHtml}
      `;

      content = content
        .replaceAll("{{title}}", "Ana Sayfa - Film Arşivi Yönetimi")
        .replace("{{stats}}", statsHtml);

      response.writeHead(200, { "content-type": "text/html; charset=utf-8" });
      response.end(content);
    }

    // filmler
    else if (pathname === "/films") {
      const data = await fileManager.readFilms();
      const templatePath = path.join(__dirname, "templates", "films.html");
      let content = await fs.readFile(templatePath, "utf-8");

      const filmListHtml = data.films.map(f => `
        <div class="film-card">
          <h3>${f.title} (${f.year})</h3>
          <p>⭐ ${f.rating}</p>
          <a href="/films/${f.id}">Detayları Gör</a>
        </div>
      `).join("");

      content = content
        .replaceAll("{{title}}", "Tüm Filmler")
        .replace("{{filmList}}", filmListHtml);

      response.writeHead(200, { "content-type": "text/html; charset=utf-8" });
      response.end(content);
    }

    // kategori
    else if (pathname.startsWith("/films/category/")) {
      const categoryName = decodeURIComponent(pathname.split("/")[3]);
      const data = await fileManager.readFilms();
      const filtered = data.films.filter(f => f.category.toLowerCase() === categoryName.toLowerCase());

      const templatePath = path.join(__dirname, "templates", "films.html");
      let content = await fs.readFile(templatePath, "utf-8");

      const filmListHtml = filtered.map(f => `
        <div class="film-card">
          <h3>${f.title}</h3>
          <a href="/films/${f.id}">Detay</a>
        </div>
      `).join("");

      content = content
        .replaceAll("{{title}}", `${categoryName} Kategorisi`)
        .replace("{{filmList}}", filmListHtml);

      response.writeHead(200, { "content-type": "text/html; charset=utf-8" });
      response.end(content);
    }

    // detay
    else if (pathname.startsWith("/films/")) {
      const id = parseInt(pathname.split("/")[2]);
      const data = await fileManager.readFilms();
      const film = data.films.find(f => f.id === id);

      if (!film) throw new Error("Film bulunamadi");

      const templatePath = path.join(__dirname, "templates", "film-detail.html");
      let content = await fs.readFile(templatePath, "utf-8");

      content = content
        .replaceAll("{{title}}", film.title)
        .replace("{{content}}", `
          <b>Yönetmen:</b> ${film.director}<br>
          <b>Yıl:</b> ${film.year}<br>
          <b>Kategori:</b> ${film.category}<br>
          <b>Puan:</b> ⭐ ${film.rating}<br>
          <b>Durum:</b> ${film.watched ? "✓ İzlenmiş" : "✗ İzlenmemiş"}
        `);

      eventBus.emit("filmViewed", film.title);

      response.writeHead(200, { "content-type": "text/html; charset=utf-8" });
      response.end(content);
    }

    // api
    else if (pathname === "/api/films") {
      const data = await fileManager.readFilms();
      response.writeHead(200, { "content-type": "application/json" });
      response.end(JSON.stringify(data.films));
    }

    // api-ist
    else if (pathname === "/api/stats") {
      const data = await fileManager.readFilms();

      const categories = {};
      data.films.forEach(f => {
        categories[f.category] = (categories[f.category] || 0) + 1;
      });

      const stats = {
        totalFilms: data.films.length,
        watchedFilms: data.films.filter(f => f.watched).length,
        averageRating: (
          data.films.reduce((a, f) => a + f.rating, 0) / data.films.length
        ).toFixed(1),
        categories
      };

      response.writeHead(200, { "content-type": "application/json" });
      response.end(JSON.stringify(stats));
    }

    // rapor
    else if (pathname === "/reports/export") {
      const data = await fileManager.readFilms();
      const reportPath = path.join(__dirname, "reports", "films-export.txt");

      const writer = createWriteStream(reportPath);

      writer.write(`=== Film Arşivi Raporu ===\n`);
      writer.write(`Olusturulma: ${new Date().toLocaleString()}\n`);
      writer.write(`Toplam: ${data.films.length} film\n`);
      writer.write(`==============================\n\n`);

      data.films.forEach((f, i) => {
        writer.write(`${i + 1}. ${f.title} (${f.year})\n`);
        writer.write(`Yönetmen: ${f.director}\n`);
        writer.write(`Kategori: ${f.category} | Puan: ${f.rating}\n`);
        writer.write(`Durum: ${f.watched ? "✓ Izlendi" : "✗ Izlenmedi"}\n\n`);
      });

      writer.end();

      writer.on("finish", () => {
        eventBus.emit("reportGenerated", "films-export.txt");
        response.writeHead(200, { "content-type": "text/plain; charset=utf-8" });
        response.end("Rapor olusturuldu.");
      });
    }

    // error
    else {
      const templatePath = path.join(__dirname, "templates", "404.html");
      const content = await fs.readFile(templatePath, "utf-8");
      response.writeHead(404, { "content-type": "text/html; charset=utf-8" });
      response.end(content);
    }

  } catch (err) {
    await log("error", err.message);
    response.writeHead(500, { "content-type": "text/plain; charset=utf-8" });
    response.end("Server Error");
  }
});

server.listen(3000, () => {
  console.log("Server 3000 portunda calisiyor");
});