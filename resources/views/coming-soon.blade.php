<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cathena | Segera Hadir</title>
    <meta name="description" content="Cathena, platform e-book dengan storefront digital, segera hadir. Daftarkan email untuk kabar peluncuran.">
    <meta property="og:title" content="Cathena | Segera Hadir">
    <meta property="og:description" content="Platform e-book dengan storefront digital. Daftarkan email untuk kabar peluncuran.">
    <meta property="og:image" content="{{ url('images/logo.png') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-0: #0a0a0f;
            --ink: #f2f1ea;
            --ink-faint: #7c7a73;
            --line: #26262f;
            --primary: #2dd4bf;
            --on-primary: #06231f;
            --success: #34d399;
            --error: #ff5d5d;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: var(--bg-0);
            color: var(--ink);
            font-family: "Geist", "Inter", system-ui, -apple-system, sans-serif;
            min-height: 100dvh;
        }
        #bg-canvas {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0.55;
        }
        .page {
            position: relative;
            z-index: 2;
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 24px 56px;
            text-align: center;
        }
        .stage {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .notify { width: 100%; margin-top: auto; }
        .brand {
            margin-top: auto;
            margin-bottom: 52px;
        }
        .brand img { height: 64px; width: auto; display: block; }
        h1 {
            font-size: clamp(1.25rem, 4vw, 2rem);
            font-weight: 500;
            letter-spacing: clamp(0.9rem, 3.2vw, 2.2rem);
            text-indent: clamp(0.9rem, 3.2vw, 2.2rem);
            white-space: nowrap;
            color: var(--ink);
            text-shadow: 0 2px 16px rgba(0, 0, 0, 0.9);
        }
        .notify p.label {
            font-size: 0.8125rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            color: var(--primary);
            margin-bottom: 14px;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.9);
        }
        form {
            display: flex;
            gap: 0;
            justify-content: center;
            align-items: stretch;
            width: min(480px, 100%);
            margin: 0 auto;
            background: rgba(18, 18, 25, 0.9);
            border: 1px solid var(--line);
            border-radius: 9999px;
            padding: 4px;
        }
        form input {
            flex: 1;
            min-width: 0;
            background: transparent;
            border: 0;
            outline: 0;
            color: var(--ink);
            font: inherit;
            font-size: 0.75rem;
            letter-spacing: 0.08em;
            padding: 10px 6px 10px 18px;
        }
        form input::placeholder { color: var(--ink-faint); }
        form button {
            background: var(--primary);
            color: var(--on-primary);
            border: 0;
            border-radius: 9999px;
            font: inherit;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            padding: 10px 22px;
            cursor: pointer;
            white-space: nowrap;
        }
        form button:hover { filter: brightness(1.08); }
        form button:focus-visible, form input:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
        .msg { font-size: 0.875rem; margin-top: 12px; }
        .msg.err { color: var(--error); }
        .done {
            width: min(480px, 100%);
            margin: 0 auto;
            background: rgba(18, 18, 25, 0.9);
            border: 1px solid var(--line);
            border-radius: 9999px;
            padding: 14px 22px;
            font-size: 0.875rem;
            color: var(--success);
        }
        @keyframes rise {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: none; }
        }
        .brand, .stage, .notify { animation: rise 0.7s ease-out both; }
        .stage { animation-delay: 0.1s; }
        .notify { animation-delay: 0.2s; }
        @media (prefers-reduced-motion: reduce) {
            .brand, .stage, .notify { animation: none; }
        }
        @media (max-width: 560px) {
            .brand img { height: 48px; }
            h1 { letter-spacing: clamp(0.5rem, 4vw, 1rem); text-indent: clamp(0.5rem, 4vw, 1rem); }
        }
    </style>
</head>
<body>
    <canvas id="bg-canvas" aria-hidden="true"></canvas>

    <main class="page" id="page">
        <div class="brand">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo Cathena" width="120" height="85">
        </div>

        <div class="stage">
            <h1>COMING SOON</h1>
        </div>

        <div class="notify">
            @if (session('notified'))
                <p class="label">Kamu masuk daftar tunggu</p>
                <p class="done">Tercatat. Cek inbox kamu untuk konfirmasi.</p>
            @elseif (session('already'))
                <p class="label">Email ini sudah terdaftar</p>
                <p class="done">Cek inbox kamu. Email konfirmasi sudah dikirim sebelumnya.</p>
            @else
                <p class="label">DAPATKAN NOTIFIKASI SAAT KAMI LAUNCH</p>
                <form method="POST" action="{{ route('notify.store') }}">
                    @csrf
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="MASUKKAN EMAIL" aria-label="Alamat email" required>
                    <button type="submit">INGATKAN SAYA</button>
                </form>
                @error('email')
                    <p class="msg err">{{ $message }}</p>
                @enderror
            @endif
        </div>
    </main>

    <script>
    (function () {
      var LW = 1900, LH = 600;
      var box = document.getElementById('page');
      var cv = document.getElementById('bg-canvas');
      var ctx = cv.getContext('2d');
      var scale = 1, ox = 0, oy = 0;

      function resize() {
        var dpr = Math.min(window.devicePixelRatio || 1, 2);
        var w = box.clientWidth, h = box.clientHeight;
        cv.width = Math.round(w * dpr);
        cv.height = Math.round(h * dpr);
        scale = Math.max(cv.width / LW, cv.height / LH);
        ox = (cv.width - LW * scale) / 2;
        oy = (cv.height - LH * scale) / 2;
      }
      window.addEventListener('resize', resize);
      resize();

      var seed = 11;
      function rnd() { seed = (seed * 16807) % 2147483647; return (seed - 1) / 2147483646; }

      var M = 24, PT = 10, ROWS = 3;
      var innerH = LH - 2 * M;
      var RH = (innerH - (ROWS + 1) * PT) / ROWS;
      var left = M + PT, right = LW - M - PT;
      var accents = ['0,229,255', '255,255,255', '124,255,203', '180,167,255', '255,209,102'];

      var books = [];
      for (var r = 0; r < ROWS; r++) {
        var floorY = M + PT + (r + 1) * RH + r * PT;
        var x = left + 14;
        while (x < right - 30) {
          if (rnd() < 0.09) { x += 28 + rnd() * 50; continue; }
          var w = 20 + rnd() * 28;
          var h = RH * (0.62 + rnd() * 0.32);
          if (x + w > right - 14) break;
          books.push({
            x: x, w: w, h: h, y: floorY,
            c: accents[Math.floor(rnd() * accents.length)],
            bands: rnd() < 0.7 ? 2 : 1,
            mark: Math.floor(rnd() * 3),
            lean: 0
          });
          x += w + 3;
        }
        if (r !== 1 && books.length) {
          var lb = books[books.length - 1];
          lb.lean = r === 0 ? -0.2 : 0.17;
          lb.x += 8;
        }
      }

      var PERIOD = 16;
      function bump(p) {
        var d = 0.16;
        if (p < 0 || p > d) return 0;
        var s = Math.sin(Math.PI * p / d);
        return s * s;
      }

      function drawBook(b, lift, glow) {
        var a = 0.45 + glow * 0.5;
        ctx.save();
        ctx.translate(b.x + b.w / 2, b.y);
        if (b.lean) {
          ctx.translate(b.lean < 0 ? -b.w / 2 : b.w / 2, 0);
          ctx.rotate(b.lean);
          ctx.translate(b.lean < 0 ? b.w / 2 : -b.w / 2, 0);
        }
        ctx.translate(0, -lift);
        var hw = b.w / 2;
        ctx.strokeStyle = 'rgba(' + b.c + ',' + a + ')';
        ctx.lineWidth = 1.4;
        ctx.strokeRect(-hw, -b.h, b.w, b.h);
        ctx.beginPath();
        var y1 = -b.h * 0.2, y2 = -b.h * 0.27;
        ctx.moveTo(-hw, y1); ctx.lineTo(hw, y1);
        if (b.bands === 2) { ctx.moveTo(-hw, y2); ctx.lineTo(hw, y2); }
        var y3 = -b.h * 0.78, y4 = -b.h * 0.85;
        ctx.moveTo(-hw, y3); ctx.lineTo(hw, y3);
        ctx.moveTo(-hw, y4); ctx.lineTo(hw, y4);
        if (b.mark === 1) { ctx.moveTo(0, -b.h * 0.42); ctx.lineTo(0, -b.h * 0.65); }
        if (b.mark === 2) {
          ctx.moveTo(-hw * 0.4, -b.h * 0.5); ctx.lineTo(hw * 0.4, -b.h * 0.5);
          ctx.moveTo(-hw * 0.4, -b.h * 0.56); ctx.lineTo(hw * 0.4, -b.h * 0.56);
        }
        ctx.stroke();
        ctx.restore();
      }

      function drawFrame(sweepX) {
        ctx.lineWidth = 1.6;
        ctx.strokeStyle = 'rgba(255,255,255,0.55)';
        ctx.strokeRect(M, M, LW - 2 * M, LH - 2 * M);
        for (var i = 0; i <= ROWS; i++) {
          var py = M + i * (RH + PT);
          ctx.strokeRect(M, py, LW - 2 * M, PT);
        }
        ctx.beginPath();
        ctx.moveTo(left, M + PT); ctx.lineTo(left, LH - M - PT);
        ctx.moveTo(right, M + PT); ctx.lineTo(right, LH - M - PT);
        ctx.stroke();
        ctx.strokeStyle = 'rgba(255,255,255,0.06)';
        ctx.lineWidth = 1;
        ctx.beginPath();
        for (var gx = left + 60; gx < right; gx += 60) {
          ctx.moveTo(gx, M + PT); ctx.lineTo(gx, LH - M - PT);
        }
        ctx.stroke();
        var g = ctx.createLinearGradient(sweepX - 140, 0, sweepX + 140, 0);
        g.addColorStop(0, 'rgba(0,229,255,0)');
        g.addColorStop(0.5, 'rgba(0,229,255,0.10)');
        g.addColorStop(1, 'rgba(0,229,255,0)');
        ctx.fillStyle = g;
        ctx.fillRect(left, M + PT, right - left, LH - 2 * M - 2 * PT);
      }

      var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      var running = true;
      document.addEventListener('visibilitychange', function () {
        running = !document.hidden;
        if (running) requestAnimationFrame(loop);
      });

      var t0 = performance.now();
      function loop(now) {
        if (!running) return;
        var t = reduce ? 0 : ((now - t0) / 1000) % PERIOD;
        var u = t / PERIOD;

        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.clearRect(0, 0, cv.width, cv.height);
        ctx.setTransform(scale, 0, 0, scale, ox, oy);

        drawFrame(left + u * (right - left));

        var vx0 = -ox / scale - 40, vx1 = (cv.width - ox) / scale + 40;

        for (var i = 0; i < books.length; i++) {
          var b = books[i];
          if (b.x + b.w < vx0 || b.x > vx1) continue;
          var rowOffset = Math.floor((b.y - M) / (RH + PT)) * 0.11;
          var p = (u - (b.x / LW) * 0.8 - rowOffset) % 1;
          if (p < 0) p += 1;
          var k = bump(p);
          drawBook(b, k * 18, k);
        }
        if (!reduce) requestAnimationFrame(loop);
      }
      requestAnimationFrame(loop);
    })();
    </script>
</body>
</html>
