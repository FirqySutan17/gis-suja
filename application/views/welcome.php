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
    
  </section>
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
    });
</script>

</body>

</html>