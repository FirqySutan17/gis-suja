<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PT. Super Unggas Jaya</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CJ Feed and Care">
  <meta name="keywords" content="CJ Feed and Care">
  <meta name="author" content="Cheiljedang Indonesia ">
  <link rel="icon" href="<?= base_url('assets/img/cj-logo.png') ?>" type="image/x-icon">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/PaulLeCam/leaflet-legend@master/leaflet.legend.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js">

  </script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }


    @font-face {
      font-family: cjfont;
      src: url('<?= asset("font/cjfont.ttf") ?>');
    }

    .nav {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
      background-color: #ffffff;
      text-align: center;
    }

    a.login-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      z-index: 10;
      text-decoration: none;
      z-index: 10;
      background: #000;
      border: 1px solid transparent;
      color: #fff;
      font-size: 14px;
      padding: 10px 20px;
      border-radius: 10px;
      font-family: cjfont;
      transition: all 0.5s ease;
    }

    /*Legend specific*/
    .legend {
      padding: 6px 10px;
      font: 14px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255, 255, 255, 0.8);
      /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
      /*border-radius: 5px;*/
      line-height: 24px;
      color: #555;
      text-align: left;
      border-radius: 8px;
      border: 1px solid #000
    }
    .legend h4 {
      text-align: left;
      font-size: 16px;
      margin: 2px 8px 8px;
      color: #000;
    }

    .legend img {
      margin-top: 4px
    }

    .legend span {
      position: relative;
      bottom: 6px;
    }

    .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin: 0 8px 0 0;
      opacity: 0.7;
    }

    .legend i.icon {
      background-size: 18px;
      background-color: rgba(255, 255, 255, 1);
    }
    
    .sm-size {
      font-size: 11px
    }

    .md-size {
      font-size: 14px;
      font-weight: bold
    }
    .btn-survey {
         border: 1px solid #000;
         color: #000 !important;
         text-align: right;
         padding: 5px 10px;
         margin-top: 5px;
         border-radius: 5px;
         display: flex;
         flex-wrap: nowrap;
         align-content: center;
         justify-content: center;
         align-items: center;
         font-size: 11px;
         text-decoration: none;
         width: 100%
    }
    .btn-survey:hover {
        background: #000;
        color: #fff !important;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
      font-family: cjfont;
    }

    /* Modal box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border-radius: 10px;
      width: 90%;
      max-width: 600px;
      position: relative;
      animation: fadeIn 0.3s ease-in-out;
    }

    /* Close button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      position: absolute;
      right: 20px;
      top: 15px;
      cursor: pointer;
    }
    .close:hover {
      color: #000;
    }

    /* Table styling */
    .detail-table {
      width: 100%;
      border-collapse: collapse;
    }
    .detail-table th, .detail-table td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }
    .detail-table th {
      background-color: #f4f4f4;
    }

    /* Buttons */
    .modal-footer {
      margin-top: 20px;
      text-align: right;
    }
    .btn-link {
      background-color: #2e8b57;
      color: white;
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      margin-right: 10px;
    }
    .btn-link:hover {
      background-color: #246d45;
    }
    .btn-close {
      padding: 8px 12px;
      border: none;
      background-color: #999;
      color: white;
      border-radius: 6px;
      cursor: pointer;
    }
    .btn-close:hover {
      background-color: #777;
    }

    /* Tombol Info */
    .toggle-legend {
      position: fixed;
      bottom: 10px;
      left: 10px;
      z-index: 1000;
      padding: 8px 12px;
      font-size: 14px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      display: none;
    }

    /* Animation */
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }

    @media (max-width: 600px) {
      table {
        width: 100%;
        border-collapse: collapse;
      }

      table thead {
        display: none;
      }
      table, table tbody, table tr, table td {
        display: flex;
        flex-direction: column;
        width: 100%;
      } 
      tr {
        padding: 5px 15px;
        border-radius: 0px;
        margin: 0px !important;
        background: #ffff;
      }
      th, td {
        font-size: 16px !important;
        text-align: left !important;
        width: auto !important;
      }
      td {
        padding: 5px 12px !important;
        border: 0px solid #C1C1C1 !important;
      }
      table tbody tr td {
        text-align: center;
        padding-left: 50%;
        position: relative;
        white-space: normal !important;
        font-size: 16px !important;
      }

      table td:before {
        content: attr(data-label);
        width: 100%;
        font-weight: 600;
        font-size: 13px;
        text-align: left;
        text-transform: uppercase;
        margin-right: 0px;
        border-bottom: 1px solid #000;
        padding-bottom: 5px;
        margin-bottom: 10px;
      }

      table.table-bordered.dataTable td {
        font-size: 13px !important;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
      }

      thead th {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 10; /* Z-index untuk header */
        box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4); /* Beri sedikit bayangan untuk efek header tetap */
      }

      thead th.fixed-column {
        position: sticky !important;
        top: 0;
        left: 0;
        z-index: 11; /* Lebih tinggi agar tetap di atas ketika di-scroll */
        background-color: white;
        box-shadow: 2px 0 2px -1px rgba(0, 0, 0, 0.4); /* Efek bayangan horizontal untuk kolom tetap */
      }

      tbody td.fixed-column {
        position: sticky;
        left: 0;
        background-color: white;
        z-index: 1; /* Lebih rendah dari header */
        box-shadow: 2px 0 2px -1px rgba(0, 0, 0, 0.4); /* Efek bayangan pada kolom */
      }
      .table-bordered {
        border: 0px solid #C1C1C1;
        font-size: 12px;
      }
      .table-responsive {
        border: 0px solid #ddd;
      }
      .modal-content {
        background-color: #fefefe;
        margin: 0px;
        border-radius: 0px;
        width: 100%;
        position: relative;
        animation: fadeIn 0.3s ease-in-out;
        height: 100vh;
        padding: 50px 20px;
      }
      .detail-table th {
        background-color: #fff;
        border: 0px;
        padding-bottom: 0px;
      }
      #siteDetailModal h2 {
        font-size: 23px;
      }
      #siteDetailModal a {
        width: 100%;
        padding: 10px 10px;
        font-size: 16px !important;
        margin-bottom: 10px;
        margin-right: 0px !important;
      }
      #partnerDetailModal h2 {
        font-size: 23px;
      }
      #partnerDetailModal a {
        width: 100%;
        padding: 10px 10px;
        font-size: 16px !important;
        margin-bottom: 10px;
        margin-right: 0px !important;
      }
      .btn-close {
        padding: 10px 10px;
        border: none;
        background-color: #999;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        text-transform: uppercase;
      }
      .modal-footer {
        margin-top: 20px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-content: center;
        align-items: center;
      }
      .legend {
        display: none !important;
      }
      .legend.show {
        display: block !important;
      }
      .toggle-legend {
        display: block;
      }
      .leaflet-left .leaflet-control {
        margin: 50px 10px;
      }
      .legend span {
        position: relative;
        bottom: 6px;
        font-size: 13px;
      }
      .legend h4 {
        text-align: left;
        font-size: 18px;
        margin: 10px 0px 10px;
        color: #000;
      }
    }
  </style>
</head>

<body oncontextmenu="return false;">
  <section class="nav">
    <?php if ($is_login): ?>
      <a class="login-btn" href="<?= base_url('dashboard') ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">DASHBOARD</a>
    <?php else: ?>
      <a class="login-btn" href="<?= base_url('login') ?>">LOG IN</a>
    <?php endif ?>
    <div id="mapgis" style="min-height: 100vh; width: 100%; z-index: 1;"></div>
    <button id="toggleLegendBtn" class="toggle-legend">ℹ️ INFO</button> 
  </section>

  <div id="siteDetailModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2 style="margin-bottom: 10px">DETAIL SITE</h2>
      <table class="detail-table">
        <tbody id="siteDetailBody">
          <!-- Konten diisi dari JavaScript -->
        </tbody>
      </table>
      <div class="modal-footer">
        <a id="gmapLink" href="#" target="_blank" class="btn-link" style="font-size: 13px">SEE ON GOOGLE MAPS</a>
        <button class="btn-close" onclick="closeModal()" style="background: red; font-weight: bold">CLOSE</button>
      </div>
    </div>
  </div>

  <div id="partnerDetailModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2 style="margin-bottom: 10px">DETAIL KEMITRAAN</h2>
      <table class="detail-table">
        <tbody id="partnerDetailBody">
          <!-- Konten diisi dari JavaScript -->
        </tbody>
      </table>
      <div class="modal-footer">
        <a id="gmapLink" href="#" target="_blank" class="btn-link" style="font-size: 13px">SEE ON GOOGLE MAPS</a>
        <button class="btn-close" onclick="closepartModal()" style="background: red; font-weight: bold">CLOSE</button>
      </div>
    </div>
  </div>
</body>

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/gh/PaulLeCam/leaflet-legend@master/leaflet.legend.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map("mapgis").setView([-1.2602493507832897, 121.59033600801094], 5);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 17,
            attribution: "© OpenStreetMap",
        }).addTo(map);

        /*Legend specific*/
        var legend = L.control({ position: "bottomleft" });

        legend.onAdd = function(map) {
          var div = L.DomUtil.create("div", "legend");
          div.innerHTML += "<h4>LEGEND :</h4>";
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px"><img src="<?= base_url('assets/img/marker-yellow.png') ?>" style="width: 16px; height: auto; margin-right: 10px" /><span style="font-weight: bold">GPS</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px"><img src="<?= base_url('assets/img/marker-blue.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">PS</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px"><img src="<?= base_url('assets/img/marker-grey.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">BROILER</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px"><img src="<?= base_url('assets/img/marker-cokelat.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">HATCHERY</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px"><img src="<?= base_url('assets/img/marker-green.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">LAB</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px;"><img src="<?= base_url('assets/img/marker-red.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">MEAT CENTER</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px;"><img src="<?= base_url('assets/img/marker-cream.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">RPA</span></div>';
          div.innerHTML += '<div style="display: inline-block; border-right: 1px solid #000; padding-right: 10px; border-radius: 8px;"><img src="<?= base_url('assets/img/marker-orange.png') ?>" style="width: 16px; height: auto; margin-right: 10px; margin-left: 10px" /><span style="font-weight: bold">KEMITRAAN</span></div>';
          

          return div;
        };

        legend.addTo(map);

        // Ikon berdasarkan class
        var classIcons = {
            "GPS": "<?= base_url('assets/img/marker-yellow.png') ?>",
            "PS": "<?= base_url('assets/img/marker-blue.png') ?>",
            "BROILER": "<?= base_url('assets/img/marker-grey.png') ?>",
            "HATCHERY": "<?= base_url('assets/img/marker-cokelat.png') ?>",
            "LAB": "<?= base_url('assets/img/marker-green.png') ?>",
            "MEAT CENTER": "<?= base_url('assets/img/marker-red.png') ?>",
            "RPA": "<?= base_url('assets/img/marker-cream.png') ?>"
        };

        var partnerIconUrl = "<?= base_url('assets/img/marker-orange.png') ?>";

        var gisSite = <?= $gis_site ?>;
        var gisKemitraan = <?= $gis_kemitraan ?>;

        function parseCoordinate(coordStr) {
            if (!coordStr) return null;
            const parts = coordStr.split(',');
            if (parts.length !== 2) return null;
            return [parseFloat(parts[0]), parseFloat(parts[1])];
        }

        // Tampilkan semua marker dari GIS_SITE
      gisSite.forEach(site => {
        console.log("Parsing site:", site);

        const coord = parseCoordinate(site.COORDINATE);
        const cls = site["CLASS"];
        const iconUrl = classIcons[cls];
        site.CAPACITY ? Number(site.CAPACITY).toLocaleString('id-ID') : ''

        if (!coord) console.warn("Invalid coordinate:", site.COORDINATE);
        if (!iconUrl) console.warn("Unknown class:", cls);

        if (coord && iconUrl) {
            const icon = L.icon({
                iconUrl: iconUrl,
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [0, -34]
            });

            L.marker(coord, { icon: icon })
            .bindPopup(`
                <strong>${cls}</strong><br> 
                <span class="md-size" style="margin-bottom: 10px">${site.NAME}</span><br>
                <button class="btn-survey btn-detail btn-site" data-id="${site.ID}">DETAIL</button>
                <a class="btn-survey" href="${site.LINK_GMAPS}" target="_blank">GMAPS</a>
            `)
            .addTo(map);
        }
      });

      map.on('popupopen', function (e) {
          const popupNode = e.popup._contentNode;
          const detailBtn = popupNode.querySelector('.btn-site');

          if (detailBtn) {
              detailBtn.addEventListener('click', function () {
                  const siteId = this.getAttribute('data-id');
                  const siteData = gisSite.find(s => s.ID == siteId);
                  if (siteData) {
                      showDetailModal(siteData);
                  }
              });
          }
      });

        console.log("GIS Site Data:", gisSite);

        // Tampilkan semua marker dari GIS_KEMITRAAN
        const partnerIcon = L.icon({
            iconUrl: partnerIconUrl,
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [0, -34]
        });

        gisKemitraan.forEach(kemitraan => {
          const coord = parseCoordinate(kemitraan.COORDINATE);
          if (coord) {
              L.marker(coord, { icon: partnerIcon })
                  .bindPopup(`
                    <strong>KEMITRAAN :</strong><br>
                    <span class="md-size">${kemitraan.FARM_NAME}</span><br>
                    <span class="sm-size">CAPACITY : ${Number(kemitraan.POPULASI).toLocaleString('id-ID')}</span><br><br>
                    <button class="btn-survey btn-detail btn-kemitraan" data-id="${kemitraan.ID}">DETAIL</button>
                    <a class="btn-survey" href="${kemitraan.LINK_GMAPS}" target="_blank">GMAPS</a>
                  `)
                  .addTo(map);
          }
        });

        map.on('popupopen', function (e) {
          const popupNode = e.popup._contentNode;
          const detailprtBtn = popupNode.querySelector('.btn-kemitraan');

          if (detailprtBtn) {
              detailprtBtn.addEventListener('click', function () {
                  const kemitraanId = this.getAttribute('data-id');
                  const kemitraanData = gisKemitraan.find(s => s.ID == kemitraanId);
                  if (kemitraanData) {
                      showDetailModalPartner(kemitraanData);
                  }
              });
          }
        });
    });
</script>

<script>
  document.getElementById("toggleLegendBtn").addEventListener("click", function () {
      var legendDiv = document.querySelector(".legend");
      if (legendDiv) {
          legendDiv.classList.toggle("show");
      }
  });

  function showDetailModal(site) {
      const table = document.getElementById('siteDetailBody');
      table.innerHTML = `
          <tr><th>NAME</th><td style="text-tranform: uppercase">${site.NAME}</td></tr>
          <tr><th>CLASS</th><td>${site.CLASS}</td></tr>
          <tr><th>CAPACITY</th><td>${Number(site.CAPACITY).toLocaleString('id-ID')}</td></tr>
          <tr><th>REGION</th><td style="text-tranform: uppercase">${site.REGION}</td></tr>
          <tr><th>CITY</th><td style="text-tranform: uppercase">${site.CITY}</td></tr>
          <tr><th>ADDRESS</th><td style="text-transform: uppercase">${site.ADDRESS}</td></tr>
          <tr><th>OWNERSHIP</th><td style="text-tranform: uppercase">${site.OWNERSHIP}</td></tr>
      `;
      document.getElementById('gmapLink').href = site.LINK_GMAPS;
      document.getElementById('siteDetailModal').style.display = 'block';
  }

  function showDetailModalPartner(kemitraan) {
      const table = document.getElementById('partnerDetailBody');
      table.innerHTML = `
          <tr><th>FARM</th><td style="text-tranform: uppercase">${kemitraan.FARM_NAME}</td></tr>
          <tr><th>POPULATION</th><td>${Number(kemitraan.POPULASI).toLocaleString('id-ID')}</td></tr>
          <tr><th>AREA</th><td style="text-tranform: uppercase">${kemitraan.AREA}</td></tr>
          <tr><th>UNIT</th><td style="text-tranform: uppercase">${kemitraan.UNIT}</td></tr>
          <tr><th>ADDRESS</th><td style="text-transform: uppercase">${kemitraan.ADDRESS}</td></tr>
      `;
      document.getElementById('gmapLink').href = kemitraan.LINK_GMAPS;
      document.getElementById('partnerDetailModal').style.display = 'block';
  }

  function closeModal() {
      document.getElementById('siteDetailModal').style.display = 'none';
  }

  function closepartModal() {
      document.getElementById('partnerDetailModal').style.display = 'none';
  }

  // Tutup modal jika klik area luar konten
  window.onclick = function(event) {
      const modal = document.getElementById('siteDetailModal');
      if (event.target === modal) {
          modal.style.display = 'none';
      }
  }

  window.onclick = function(event) {
      const modalPart = document.getElementById('partnerDetailModal');
      if (event.target === modalPart) {
          modalPart.style.display = 'none';
      }
  }
  document.querySelector('#siteDetailModal .close').onclick = closeModal;
  document.querySelector('#partnerDetailModal .close').onclick = closepartModal;
</script>

</body>

</html>