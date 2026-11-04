---
version: 2.0.0
name: Cathena-afterdark
description: Cathena Digital Book turun ke mode gelap sinematik — off-black berlapis ({colors.bg-0} → {colors.bg-2}), satu aksen mint elektrik ({colors.primary}) yang cocok dengan logo teal, amber hangat ({colors.accent-amber}) untuk momen penekanan, dan tipografi grotesk + aksen serif italic. Gerak milik GSAP + ScrollTrigger (reveal, parallax, pin, panel horizontal, marquee, counter), stiker isometrik fun-isometric hidup di atas chip krem, dan setiap viewport punya satu momen interaktif. Satu tema per halaman: gelap penuh, tanpa sakelar tema.
stack:
  motion: "GSAP 3 + ScrollTrigger via npm (gsap.registerPlugin sekali di resources/js/app.js). GSAP milik animasi scroll/gerak; Alpine.js milik status UI (toggle, form, modal). Framer Motion tidak dipakai — khusus React, tidak cocok untuk Blade/Livewire."
  stickers: "fun-isometric kit (kit/fun.ts + kit/motions.ts disalin ke resources/js/stickers/, ikon proyek di icons.ts). Render via play(canvas, icon, {palette}) tanpa React; reduced-motion tampilkan still frame via draw()."

colors:
  bg-0: "#0A0A0F"
  bg-1: "#121219"
  bg-2: "#1A1A24"
  bg-glass: "rgba(255,255,255,0.04)"
  ink: "#F2F1EA"
  ink-dim: "#B9B7AE"
  ink-faint: "#7C7A73"
  line: "#26262F"
  line-soft: "#1C1C25"
  primary: "#2DD4BF"
  primary-deep: "#0D9488"
  on-primary: "#06231F"
  accent-amber: "#FFC53D"
  accent-amber-deep: "#B97A0A"
  accent-violet: "#8B7CFF"
  accent-rose: "#FF6B8A"
  accent-sky: "#7CC7FF"
  semantic-success: "#34D399"
  semantic-warning: "#FFB020"
  semantic-error: "#FF5D5D"
  chip-cream: "#F2F1EA"
  chip-ink: "#14141B"

typography:
  display:
    fontFamily: Space Grotesk
    fontSize: clamp(2.75rem, 6vw, 5.5rem)
    fontWeight: 700
    lineHeight: 1.02
    letterSpacing: -0.03em
  display-accent:
    fontFamily: Instrument Serif
    fontSize: inherit
    fontWeight: 400
    fontStyle: italic
  h1:
    fontFamily: Space Grotesk
    fontSize: clamp(2.25rem, 4.5vw, 3.75rem)
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: -0.02em
  h2:
    fontFamily: Space Grotesk
    fontSize: clamp(1.75rem, 3.5vw, 2.75rem)
    fontWeight: 600
    lineHeight: 1.1
    letterSpacing: -0.02em
  h3:
    fontFamily: Space Grotesk
    fontSize: 1.375rem
    fontWeight: 600
    lineHeight: 1.2
  body-lg:
    fontFamily: Inter
    fontSize: 1.125rem
    fontWeight: 400
    lineHeight: 1.6
  body:
    fontFamily: Inter
    fontSize: 1rem
    fontWeight: 400
    lineHeight: 1.6
  small:
    fontFamily: Inter
    fontSize: 0.875rem
    fontWeight: 400
    lineHeight: 1.5
  caption:
    fontFamily: Inter
    fontSize: 0.8125rem
    fontWeight: 400
    lineHeight: 1.45
  mono-label:
    fontFamily: IBM Plex Mono
    fontSize: 0.75rem
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: 0.12em
  button:
    fontFamily: Space Grotesk
    fontSize: 0.9375rem
    fontWeight: 600
    lineHeight: 1.3

rounded:
  sm: 8px
  md: 14px
  lg: 20px
  xl: 28px
  full: 9999px

spacing:
  xxs: 4px
  xs: 8px
  sm: 12px
  md: 16px
  lg: 24px
  xl: 32px
  xxl: 48px
  section: 96px
  section-lg: 144px
  hero: 160px

motion:
  dur-instant: 120ms
  dur-fast: 200ms
  dur-base: 450ms
  dur-slow: 900ms
  dur-crawl: 1400ms
  ease-enter: "power3.out"
  ease-luxe: "expo.out"
  ease-pop: "back.out(1.4)"
  ease-scrub: "none"
  stagger-cards: 0.08
  stagger-chars: 0.02
  pattern-reveal: "gsap.from anak section: y 28, autoAlpha 0, dur-base, ease-enter, stagger-cards, once true, start 'top 80%'"
  pattern-split-hero: "headline dipecah per kata; from yPercent 110 + rotate 4 dalam mask overflow-hidden; stagger 0.06; ease-luxe; main sekali saat load"
  pattern-parallax: "lapis dekorasi yPercent ±12, scrub 1, start 'top bottom', end 'bottom top'"
  pattern-pin-steps: "pin panel cara-kerja, end '+=1800', scrub 1; tiap langkah fade/slide bergantian via timeline (jangan animasikan elemen pin itu sendiri)"
  pattern-horizontal: "pin seksi showcase desktop; tween xPercent konten dalam ease 'none', scrub 1; tiap kartu punya trigger containerAnimation untuk reveal dalam"
  pattern-marquee: "jalur ganda berlawanan arah, 28s linear infinite; jeda saat hover/fokus; nonaktifkan gerak saat reduce-motion"
  pattern-counter: "angka cacah ke target dengan snap 1, dur-slow, once, trigger 'top 85%'"
  pattern-magnetic: "tombol primer ikuti kursor 0.3x dalam radiusnya, kembali elastic; desktop + pointer halus saja"
  pattern-spotlight: "radial mint 12% ikuti kursor di kartu (rAF throttle); sembunyi di sentuh"
  pattern-tilt: "mockup browser rotateX/Y maks 8deg ikuti kursor; reset saat leave; matikan di mobile"
  responsive: "gsap.matchMedia: full di min-1024; di bawah itu pin + horizontal diganti tumpuk vertikal + reveal biasa"
  reduced-motion: "durasi 0 / lewati tween saat prefers-reduced-motion; stiker tampil still frame; marquee statis"
  performance: "hanya transform + autoAlpha; batch() untuk grid; tanpa markers di produksi; refresh() setelah font/gambar/layout berubah"

isometric:
  rationale: "Stiker slab fun-isometric (outline tinta tebal + sisi ekstrusi) memberi nyawa kartun premium yang tidak bisa dicapai ikon garis. Di tema gelap, stiker selalu duduk di atas chip krem ({colors.chip-cream}) agar outline tinta terbaca dan stiker 'pop' dari latar."
  implementation: "Salin kit/fun.ts + kit/motions.ts skill ke resources/js/stickers/; tulis icons.ts proyek di sebelahnya. Sisip <canvas> 1:1 di Blade, mainkan via play(). Satu rAF global; stiker off-screen tidak di-paint. Fallback: poster PNG frame still."
  palette-default: "riso (bawaan kit)"
  palette-brand: "brand(#2DD4BF, #134E4A)"
  palette-amber: "brand(#FFC53D, #7A4A00)"
  facing-default: "top right"
  stickers:
    - { object: "tumpukan tiga buku melayang dengan sparkle", preset: "drift + twinkle", use: "hero orbit kiri" }
    - { object: "etalase toko kecil pintunya membuka, koin melompat keluar", preset: "impact + bounce", use: "hero orbit kanan" }
    - { object: "buku terbuka halamannya berkibar", preset: "sway", use: "kartu Web Reader" }
    - { object: "dompet menumpahkan koin", preset: "toss", use: "kartu Checkout" }
    - { object: "gembok mengatup", preset: "clasp", use: "kartu Digital Library" }
    - { object: "bel bergetar", preset: "wiggle", use: "toast keranjang + notifikasi order" }
    - { object: "hati melompat", preset: "hop", use: "tombol favorit katalog" }
    - { object: "pesawat kertas meluncur", preset: "drift", use: "status sukses form early-access" }
  rules:
    - "Gerak hanya dari preset kit (k/at untuk tala). Tanpa sine loop tulisan tangan, tanpa CSS wobble."
    - "Anak mengikuti dengan lag (at +4/+6, k 0.6–1.4), tidak pernah serentak."
    - "Pop pakai scale, bukan opacity."
    - "Setiap ikon punya still bermakna untuk reduced-motion."
    - "Cek: fi check lolos bila bun tersedia; selalu render sheet 160px + samping ikon referensi kit."

components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
    typography: "{typography.button}"
    rounded: "{rounded.full}"
    padding: "14px 28px"
    motion: "magnetic + glow mint 24% saat hover"
  button-secondary:
    backgroundColor: "transparent"
    textColor: "{colors.ink}"
    typography: "{typography.button}"
    rounded: "{rounded.full}"
    padding: "14px 28px"
    border: "1px solid {colors.line}"
  button-ghost:
    backgroundColor: "transparent"
    textColor: "{colors.ink-dim}"
    typography: "{typography.button}"
    rounded: "{rounded.full}"
    padding: "12px 20px"
  nav-floating:
    backgroundColor: "rgba(10,10,15,0.72)"
    backdrop: "blur 16px"
    rounded: "{rounded.full}"
    border: "1px solid {colors.line-soft}"
    behavior: "menyusut + bayangan setelah scroll 24px; progress bar mint 2px di tepi atas (scrub); hamburger < 1024px"
  section-head:
    pattern: "eyebrow mono-label mint + display/h2 + body-lg dim, rata tengah; reveal stagger"
  hero-stage:
    backgroundColor: "{colors.bg-0}"
    behavior: "grid samar + orb radial mint 10% parallax; headline split-word; orbit 2 stiker (yoyo y ±14, durasi beda); mockup browser tilt + parallax; scroll-cue memantul"
  marquee-strip:
    behavior: "pita mono-label berjalan (cathena.id/toko • QRIS • Web Reader • ...) di batas hero; dua arah; jeda saat hover"
  bento-grid:
    layout: "12 kolom: 1 sel hero 2x2 + sel 1x1/2x1; spotlight-card + chip stiker tiap sel"
  spotlight-card:
    backgroundColor: "{colors.bg-2}"
    rounded: "{rounded.lg}"
    border: "1px solid {colors.line}"
    behavior: "radial mint ikuti kursor; angkat y -6 + border mint 40% saat hover (dur-fast)"
  iso-chip:
    backgroundColor: "{colors.chip-cream}"
    rounded: "{rounded.md}"
    padding: "12px"
    behavior: "wadah canvas stiker 1:1 (96–160px); pop back.out(1.4) saat reveal"
  mockup-browser:
    backgroundColor: "{colors.bg-1}"
    rounded: "{rounded.xl}"
    border: "1px solid {colors.line}"
    shadow: "0 32px 80px -24px rgba(0,0,0,0.7), 0 0 0 1px rgba(45,212,191,0.08)"
    behavior: "tilt kursor + parallax; konten mockup storefront nyata (toko demo + 3 kartu buku)"
  horizontal-panels:
    behavior: "desktop: pin + geser horizontal (scrub); tiap panel = kartu buku raksasa + detail; mobile: tumpuk vertikal"
  book-card:
    backgroundColor: "{colors.bg-2}"
    rounded: "{rounded.lg}"
    border: "1px solid {colors.line}"
    behavior: "sampul generatif CSS/SVG per tema; hover: sampul terangkat + tombol muncul (dur-fast); favorit hati-hop; tambah keranjang → toast + bel wiggle"
  timeline-steps:
    behavior: "desktop: pin, garis kemajuan scrub + langkah aktif membesar; mobile: garis vertikal + reveal biasa"
  stat-counter:
    typography: "{typography.h2}"
    behavior: "cacah naik sekali saat masuk viewport; label mono dim"
  tab-showcase:
    behavior: "tab Seller/Pembaca (pill); panel crossfade y 12; garis bawah aktif layout-animasi"
  testimonial-slider:
    behavior: "rotasi otomatis 6s + drag + dot; kartu kaca bg-glass + avatar inisial"
  faq-accordion:
    behavior: "satu terbuka; tinggi animasi GSAP (bukan grid-hack); ikon plus → minus rotate 135deg"
  form-early-access:
    behavior: "input 48px bg-1 border line, fokus ring mint; validasi Alpine inline; sukses → pesawat kertas drift + ringkasan data"
  banner-seller:
    backgroundColor: "{colors.accent-amber}"
    textColor: "#231600"
    rounded: "{rounded.xl}"
    behavior: "pita miring -2deg full-bleed; stiker toko impact saat masuk; CTA gelap solid"
  footer-mega:
    backgroundColor: "{colors.bg-1}"
    border: "top 1px {colors.line-soft}"
    behavior: "4 kolom + status dot 'Semua sistem normal' + marquee mini kredit"
  toast-cart:
    backgroundColor: "{colors.bg-2}"
    border: "1px solid {colors.primary}"
    behavior: "slide-up + bel wiggle; tutup otomatis 3.2s; progress bar tipis"
  modal-book:
    behavior: "backdrop blur + scale back.out(1.2); fokus trap; Escape tutup; isi: sampul, sinopsis, daftar bab, harga, CTA"
---

## Overview

Cathena Afterdark adalah wajah gelap sinematik untuk toko e-book: tiga lapis off-black ({colors.bg-0} → {colors.bg-2}, tanpa hitam murni), satu aksen mint elektrik ({colors.primary}) yang lahir dari warna logo, dan amber ({colors.accent-amber}) yang hanya muncul di momen penekanan. Halaman dibuka nav mengambang kaca + progress bar mint, lalu hero dengan headline split-word ("Buka *Tokomu.*" dengan kata miring serif), dua stiker isometrik mengorbit, dan mockup browser storefront yang miring mengikuti kursor. Di bawah hero, pita marquee berjalan sebelum halaman menyelam ke bento fitur, panel horizontal katalog yang di-pin, timeline cara-kerja yang terpicu scroll, banner seller amber miring, slider testimoni, FAQ, dan form early-access yang dirayakan pesawat kertas.

**Key Characteristics:**
- Gelap penuh satu tema: off-black berlapis, teks off-white, hairline samar — tanpa #000/#FFF
- Satu aksen dominan (mint) + satu aksen momen (amber); violet hanya untuk glow max 12%
- Setiap viewport punya satu momen interaktif: magnetik, spotlight, tilt, pin, marquee, counter, atau stiker
- Stiker slab isometrik di chip krem: gerak preset After Effects-grade, bukan wobble CSS
- Tipografi campuran: Space Grotesk display + kata aksen Instrument Serif italic + label IBM Plex Mono
- Tombol pil penuh (eko modern gelap), kartu 20px, bento 12 kolom

## Colors

### Surface (gelap berlapis)
- **Bg 0** ({colors.bg-0}): dasar halaman — near-black semburat biru, bukan hitam murni
- **Bg 1** ({colors.bg-1}): seksi bergantian + mockup browser
- **Bg 2** ({colors.bg-2}): kartu + input + toast
- **Glass** ({colors.bg-glass}): overlay kaca testimoni/nav (selalu + blur 16px)
- **Line** ({colors.line}) / **Line Soft** ({colors.line-soft}): hairline struktural di atas gelap

### Teks (off-white bertingkat)
- **Ink** ({colors.ink}): headline + body utama (kontras ±15:1 di bg-0)
- **Ink Dim** ({colors.ink-dim}): body sekunder (≥4.5:1)
- **Ink Faint** ({colors.ink-faint}): label tersier, placeholder — jangan untuk body

### Aksen (satu dominan, sisanya momen)
- **Mint** ({colors.primary}): CTA primer, progress, ikon aktif, glow. Deep ({colors.primary-deep}) untuk hover/tekan; teks di atasnya ({colors.on-primary}).
- **Amber** ({colors.accent-amber}): HANYA banner seller + badge "Terpopuler" + stiker varian amber. Deep ({colors.accent-amber-deep}) untuk teks di atas amber.
- **Violet** ({colors.accent-violet}): glow dekoratif ≤12% alpha, badge tag. Jangan untuk CTA atau blok besar.
- **Rose** ({colors.accent-rose}) / **Sky** ({colors.accent-sky}): sparkle, dot orbit, varian sampul buku.

### Stiker & Semantik
- **Chip Cream** ({colors.chip-cream}): satu-satunya permukaan terang — wadah stiker + teks chip ({colors.chip-ink}).
- **Success/Warning/Error** ({colors.semantic-success}/{colors.semantic-warning}/{colors.semantic-error}): status form, toast, dot sistem.

## Typography

### Keluarga
- **Space Grotesk** (display + tombol + h1–h3): grotesk berkarakter, cocok untuk headline besar gelap.
- **Instrument Serif italic** (aksen 1–2 kata per headline): kontras editorial yang membuat headline terasa dirancang, bukan generik.
- **Inter** (body): netral, terbaca panjang di atas gelap.
- **IBM Plex Mono** (eyebrow, harga, label marquee, kode): rasa teknis-presisi.

### Hierarki
| Token | Ukuran | Bobot | Pakai |
|---|---|---|---|
| `{typography.display}` | clamp 2.75–5.5rem | 700 | Hero, 1 per halaman |
| `{typography.h1}` | clamp 2.25–3.75rem | 700 | Judul halaman dalam |
| `{typography.h2}` | clamp 1.75–2.75rem | 600 | Pembuka seksi |
| `{typography.h3}` | 1.375rem | 600 | Judul kartu/panel |
| `{typography.body-lg}` | 1.125rem | 400 | Subheadline |
| `{typography.body}` | 1rem | 400 | Body |
| `{typography.mono-label}` | 0.75rem + tracking | 500 | Eyebrow, marquee, harga |

### Prinsip
- Headline display selalu punya 1–2 kata serif italic (class `.font-accent`).
- Eyebrow mono mint + tracking lebar di atas setiap h2 (pola `section-head`).
- Body di atas gelap: `ink-dim` min untuk paragraf, `ink` untuk kalimat penekanan.

## Motion (GSAP + ScrollTrigger)

### Peran
GSAP memiliki semua gerak scroll/sinematik; Alpine.js memiliki status UI (menu, accordion, modal, form, toast). Keduanya hidup berdampingan: jangan menganimasikan properti yang sama dari dua sisi.

### Setup wajib
1. `npm i gsap`, `gsap.registerPlugin(ScrollTrigger)` sekali di `resources/js/app.js`.
2. Semua pola scroll dibungkus `gsap.matchMedia()` (desktop full, mobile ringkas, reduced-motion nol).
3. `ScrollTrigger.refresh()` setelah font, gambar, dan konten dinamis siap.
4. Tanpa `markers` di produksi. Tanpa tween pada elemen yang di-pin — animasikan anaknya.

### Pola & kapan dipakai
- **Reveal** ({motion.pattern-reveal}): default setiap blok seksi. Stagger kartu {motion.stagger-cards}.
- **Split hero** ({motion.pattern-split-hero}): hanya headline hero, main sekali.
- **Parallax** ({motion.pattern-parallax}): orb, grid, dot — dekorasi saja, ±12%.
- **Pin steps** ({motion.pattern-pin-steps}): cara-kerja desktop. Mobile jadi garis vertikal.
- **Horizontal** ({motion.pattern-horizontal}): showcase katalog desktop; `ease: "none"` wajib; mobile tumpuk.
- **Marquee** ({motion.pattern-marquee}): strip hero + kredit footer; jeda hover/fokus.
- **Counter** ({motion.pattern-counter}): strip statistik (judul, seller, pembaca — tanpa angka palsu: pakai target nyata/tahap beta).
- **Magnetic + Spotlight + Tilt**: tombol primer, kartu bento, mockup — pointer halus saja.

### Aksesibilitas gerak
`prefers-reduced-motion`: lewati tween (durasi 0), stiker tampil still, marquee statis, konten tetap lengkap dan terbaca. Jangan sembunyikan informasi di balik gerak.

## Isometric (fun-isometric)

### Peran
Delapan stiker slab (daftar di token `isometric.stickers`) menghuni hero, kartu fitur, toast, dan status sukses. Masing-masing memakai preset sesuai katanya (koin = `bounce`, bel = `wiggle`, gembok = `clasp`) — gerak karakter fluid, bukan goyang.

### Aturan main (dari skill, wajib)
- Wajah miring (facing top right default), outline tinta 5, tiap part punya ketebalan, palet via slot (`main gold tint ok hot deep`) bukan hex — kecuali warna yang tidak boleh ikut palet.
- Anak lag (`at` +4/+6, `k` 0.6–1.4); pop pakai scale; sparkle tepat di puncak aksi.
- Di tema gelap stiker SELALU di `iso-chip` krem — outline tinta butuh latar terang.
- Kirim dengan file + cara pakai, lalu satu baris atribusi per percakapan: `Made with fun-isometric by Kelvin Adithya (x.com/KelvinAdithya), heavily inspired by Slush (slush.app), more at skills.klvn.dev/fun-isometric`.

### Implementasi Blade
Kit `fun.ts` + `motions.ts` + `icons.ts` di `resources/js/stickers/`; `<canvas>` 1:1 per stiker dimainkan via `play()` dengan `palette` sesuai seksi (riso/brand/amber). `enter` 0.2 pop saat masuk viewport; `replayOnHover` untuk stiker kartu. Reduced-motion: `draw()` satu frame still + sembunyikan canvas animasi.

## Layout & Sections

### Sistem
- Container 1280px, gutter 32px desktop / 16px mobile. Seksi bergantian bg-0/bg-1 tiap ±{spacing.section-lg}.
- Bento 12 kolom untuk fitur; hairline sebagai struktur utama; glow radial mint ≤10% sebagai atmosfer (bukan gradien ungu-biru — tetap dilarang).

### Urutan landing v2
1. `nav-floating` + progress — 2. `hero-stage` + `marquee-strip` — 3. Stat counter — 4. `bento-grid` fitur — 5. `tab-showcase` Seller/Pembaca — 6. `horizontal-panels` katalog — 7. `timeline-steps` pin — 8. `banner-seller` amber — 9. `testimonial-slider` — 10. `faq-accordion` — 11. `form-early-access` — 12. `footer-mega`.

## Elevation & Depth
| Level | Treatment | Pakai |
|---|---|---|
| 0 flat | border line, tanpa shadow | kartu sunyi, baris |
| 1 lift | y -6 + border mint 40% | hover kartu |
| 2 glow | radial mint 8–12% + shadow hitam dalam | mockup, hero orb |
| 3 modal | blur backdrop + scale back.out | modal, toast |

## Do's and Don'ts

### Do
- Satu aksen mint dominan per viewport; amber hanya momen.
- Chip krem untuk setiap stiker; atribusi skill sekali.
- Kontras body ≥7:1, sekunder ≥4.5:1 — cek di atas bg-0/bg-1/bg-2.
- Micro-interaksi 150–200ms; sinematik 450–1400ms dengan ease token.
- `refresh()` ScrollTrigger setelah perubahan layout.

### Don't
- Tanpa #000/#FFF murni di mana pun.
- Tanpa gradien ungu-biru generik (aturan antislop abadi).
- Tanpa pin/horizontal/magnetic di mobile dan reduced-motion.
- Tanpa stiker langsung di atas gelap (outline hilang).
- Tanpa angka/statistik palsu di counter (pakai target beta nyata).
- Tanpa lorem, emoji acak, komen AI generik — copy Indonesia konkret (lihat antislop-copywriting).

## Responsive Behavior

| Breakpoint | Perubahan |
|---|---|
| < 480px | Kolom tunggal; display 2.75rem; stiker 96px; marquee 1 jalur lambat |
| 480–767px | Bento 1 kolom besar; tombol full-width; mockup di bawah teks |
| 768–1023px | Bento 2 kolom; horizontal → tumpuk; pin mati |
| 1024–1279px | Full desktop kecuali orbit stiker rapat |
| ≥ 1280px | Panggung penuh: orbit, pin, horizontal, tilt |

Sentuh: target ≥44px; input 48px; hover-only (magnetik/spotlight/tilt) nonaktif tanpa pointer halus. Footer 4→2→1 kolom.

## Iteration Guide

1. Kerjakan SATU seksi + polanya per iterasi (reveal dulu, sinematik kemudian).
2. Rujuk nama token/komponen langsung (`spotlight-card`, `{motion.pattern-pin-steps}`).
3. Uji tiap pola di 390px + reduced-motion sebelum lanjut.
4. Varian baru = entri `components:` baru, bukan modifikasi diam-diam.
5. Stiker baru = objek + kata kerja + preset, lalu `fi check` + sheet 160px.
6. Jaga mint sebagai CTA; amber sebagai momen; violet sebagai glow.

## Known Gaps

- Nilai durasi final per seksi menunggu uji rasa di browser (mulai dari token, tala ±20%).
- Ikon `icons.ts` proyek belum digambar — butuh sesi fun-isometric per stiker.
- Performa HP kentang belum diukur; siapkan sakelar `?static=1` bila perlu.
- Kopian CTA final (early-access vs langsung daftar) menunggu keputusan user.

