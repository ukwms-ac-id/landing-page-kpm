# 🚀 PANDUAN LENGKAP MENJALANKAN PROJECT

## ⚡ Quick Start (3 Langkah)

### Langkah 1️⃣: Setup (Hanya sekali)

```bash
composer run setup
```

**Apa yang dilakukan:**

- ✅ Install PHP dependencies (vendor/)
- ✅ Copy .env.example → .env
- ✅ Generate APP_KEY
- ✅ Jalankan database migrations
- ✅ Install Node dependencies (node_modules/)
- ✅ Build assets

### Langkah 2️⃣: Jalankan Server

```bash
composer run dev
```

**Atau manual (3 terminal):**

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev

# Terminal 3 (optional)
php artisan pail
```

### Langkah 3️⃣: Buka Browser

```
http://localhost:8000
```

✨ Landing page dengan components baru siap!

---

## 📍 URLs Project

| URL                                     | Halaman   | Deskripsi                                         |
| --------------------------------------- | --------- | ------------------------------------------------- |
| `http://localhost:8000`                 | Home      | Landing page lengkap dengan hero, ticker, welcome |
| `http://localhost:8000/components-demo` | Demo      | Interactive showcase semua components             |
| `http://localhost:8000/dashboard`       | Dashboard | (Requires login)                                  |

---

## 📦 Folder Structure & Files

```
project-root/
├── 📁 app/                    # Backend logic
├── 📁 routes/
│   └── web.php               # ✅ UPDATED - Added /home & /components-demo routes
├── 📁 resources/js/
│   ├── Pages/
│   │   ├── Home.vue          # ✨ NEW - Homepage
│   │   └── ComponentsDemo.vue # ✨ NEW - Demo all components
│   └── Components/
│       ├── UI/               # ✨ NEW - 4 UI atoms
│       └── Home/             # ✨ NEW - 8 section components
├── 📁 public/                # Static assets (after npm run build)
├── 📁 vendor/                # PHP packages (after composer install)
├── 📁 node_modules/          # Node packages (after npm install)
├── package.json              # Node dependencies ✓
├── composer.json             # PHP dependencies ✓
├── vite.config.js            # Vite configuration ✓
└── .env                       # Environment (created after setup)
```

---

## 🔧 Terminal Commands

### Initial Setup

```bash
# Recommended: One-liner setup
composer run setup

# OR Manual steps:
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
```

### Development

```bash
# Option A: All-in-one (Recommended)
composer run dev

# Option B: Manual
# Terminal 1
php artisan serve

# Terminal 2
npm run dev

# Terminal 3 (Optional - for logs)
php artisan pail
```

### Build & Production

```bash
# Build for production
npm run build

# Start production server
php artisan serve
```

---

## 🎨 Development Workflow

### File Changes & Hot Reload

| File Type      | Location                   | Hot Reload?       |
| -------------- | -------------------------- | ----------------- |
| Vue Components | `resources/js/Components/` | ✅ Yes (Vite)     |
| CSS/SCSS       | `resources/css/`           | ✅ Yes (Vite)     |
| Pages          | `resources/js/Pages/`      | ✅ Yes (Vite)     |
| Routes         | `routes/web.php`           | ❌ Manual restart |
| .env           | `.env`                     | ❌ Manual restart |
| Controllers    | `app/Http/Controllers/`    | ❌ Manual restart |

### Typical Dev Session

```
1. npm run dev              # Terminal 1: Start Vite
2. php artisan serve        # Terminal 2: Start Laravel
3. Open browser → http://localhost:8000
4. Edit files → See changes instantly (hot reload)
5. Adjust props/styling → Auto-update in browser
6. When done: Ctrl+C to stop servers
```

---

## 🐛 Troubleshooting

### ❌ "php: command not found"

**Solution:** PHP belum di PATH

```bash
# Check if PHP is installed
php -v

# If not, install or add to PATH
# Windows: Add C:\php to PATH
# Mac: brew install php
# Linux: sudo apt-get install php
```

### ❌ "npm: command not found"

**Solution:** Node.js belum installed

```bash
# Download & install from: https://nodejs.org
# Download Node LTS (includes npm)
# Then run: npm -v
```

### ❌ Port 8000 already in use

```bash
# Use different port
php artisan serve --port=8001

# OR kill process using port 8000
# Windows:
netstat -ano | findstr :8000
taskkill /PID <PID> /F

# Mac/Linux:
lsof -ti:8000 | xargs kill -9
```

### ❌ Port 5173 already in use

```bash
# Use different port for Vite
npm run dev -- --port 5174
```

### ❌ "Database connection refused"

```bash
# Make sure database exists
# Check .env: DB_DATABASE, DB_HOST, DB_USER, DB_PASSWORD

# If SQLite:
touch database/database.sqlite

# Run migrations
php artisan migrate

# OR reset database
php artisan migrate:fresh
```

### ❌ npm install fails

```bash
# Clear npm cache
npm cache clean --force

# Delete node_modules and lock file
rm -rf node_modules package-lock.json

# Reinstall
npm install
```

### ❌ Vite not hot-reloading

```bash
# 1. Check that resources/js/app.js exists
# 2. Check imports are correct
# 3. Restart npm run dev
# 4. Clear browser cache (Ctrl+Shift+Delete)
```

### ❌ "Class not found" or composer errors

```bash
# Regenerate autoloader
composer dump-autoload

# OR
composer install --no-scripts
php artisan key:generate
```

---

## ✅ Step-by-Step Walkthrough

### First Time Setup

```
📋 STEP 1: Navigate to project
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
cd "c:\SIMONE\LANDING PAGE\lp-kpm"
# Or Mac/Linux: cd ~/path/to/lp-kpm

📋 STEP 2: Run setup
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
composer run setup
# Wait for completion... (2-5 minutes)

📋 STEP 3: Start servers
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
composer run dev
# This opens all 4 servers: Laravel, Vite, Queue, Logs

📋 STEP 4: Open browser
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Open: http://localhost:8000
# You should see the landing page!

📋 STEP 5: Explore
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
• http://localhost:8000 → Homepage
• http://localhost:8000/components-demo → Demo

📋 STEP 6: Start developing
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
• Edit resources/js/Components/**/*.vue
• Watch browser auto-refresh
• See changes instantly!
```

### Subsequent Sessions

```
📋 Just do this:
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
cd "c:\SIMONE\LANDING PAGE\lp-kpm"
composer run dev

👉 That's it! Servers start automatically
```

---

## 🎯 What to Check

### ✅ Project is Running Correctly If:

1. ✅ Terminal shows "Laravel development server started"
2. ✅ Terminal shows "VITE v... ready in XXms"
3. ✅ Browser can access http://localhost:8000
4. ✅ Homepage displays components (hero, ticker, navigation)
5. ✅ Editing Vue file → browser auto-updates (within 1-2 seconds)
6. ✅ No errors in browser console (F12 → Console)
7. ✅ No errors in terminal

### 🔍 Debug: Browser DevTools

```
1. Open browser: http://localhost:8000
2. Press F12 or Ctrl+Shift+I → Developer Tools
3. Go to Console tab
4. Look for red errors

If you see errors:
• Screenshot the error
• Check: is Vite running? (npm run dev)
• Check: is Laravel running? (php artisan serve)
• Check: correct port? (8000 for Laravel, 5173 for Vite)
```

---

## 📊 Server Status Indicators

### ✅ Green (Everything OK)

```
🟢 Laravel artisan serve
   "Starting Laravel development server: http://127.0.0.1:8000"

🟢 npm run dev
   "VITE v5.0.0 ready in 450ms"

🟢 Browser console (F12)
   No red errors
   Maybe some yellow warnings (OK)
```

### ⚠️ Yellow (Check Something)

```
🟡 Browser showing blank page
   → Wait 5 seconds for Vite to bundle
   → Hard refresh: Ctrl+F5
   → Check: is npm run dev running?

🟡 Old version of page showing
   → Clear cache: Ctrl+Shift+Delete
   → Hard refresh: Ctrl+F5

🟡 Styles not loading
   → Check: resources/css/app.css exists
   → Check: npm run dev is running
```

### 🔴 Red (Stop & Fix)

```
🔴 "Port 8000 already in use"
   → Use different port: php artisan serve --port 8001

🔴 "Cannot find module"
   → npm install
   → npm run build

🔴 Browser shows "Cannot GET /"
   → Laravel server not running
   → Run: php artisan serve
```

---

## 🎓 Understanding the Architecture

```
┌─────────────────────────────────────────────┐
│           Browser                           │
│       http://localhost:8000                 │
└──────────────┬──────────────────────────────┘
               │
         ┌─────▼─────┐
         │ Laravel   │ Port 8000
         │ App       │
         │ (php)     │
         └─────┬─────┘
               │
         ┌─────▼──────┐
         │ Inertia.js │ (Server-side rendering)
         └─────┬──────┘
               │
         ┌─────▼──────┐
         │ Vue 3 Page │
         │ (Compiled) │
         └─────┬──────┘
               │
         ┌─────▼──────────┐
         │ Vite           │ Port 5173
         │ Dev Server     │
         │ (HMR)          │
         └────────────────┘

Flow:
1. Browser requests http://localhost:8000
2. Laravel renders page via Inertia
3. Vue component loaded from public/build/
4. Vite dev server provides hot-module-replacement
5. Edit Vue file → Vite detects change
6. Browser auto-updates (HMR magic!)
```

---

## 📚 Next Steps

### ✅ After Setup Complete

1. **Read docs** (15 min)
    - Read: QUICK_REFERENCE.md
    - Quick copy-paste for components

2. **Explore components** (10 min)
    - Visit: http://localhost:8000/components-demo
    - Click through examples
    - See all components in action

3. **Edit & test** (20 min)
    - Open: resources/js/Pages/Home.vue
    - Edit some text
    - Watch browser auto-update (magic! ✨)

4. **Customize** (30 min)
    - Edit component props
    - Change colors in CSS variables
    - Try different button variants

5. **Build for production** (5 min)
    - Run: npm run build
    - Check: public/build/ folder created
    - Assets optimized & minified

---

## 🆘 Getting Help

### Resources

| Resource       | Location                  | What For           |
| -------------- | ------------------------- | ------------------ |
| Quick Lookup   | QUICK_REFERENCE.md        | Fast copy-paste    |
| Full Docs      | COMPONENTS_GUIDE.md       | Detailed guide     |
| Architecture   | IMPLEMENTATION_SUMMARY.md | How it's built     |
| This file      | RUN_GUIDE.md              | How to run         |
| Component Demo | /components-demo          | See all components |

### Debug Checklist

Before asking for help, check:

- [ ] PHP installed? (`php -v`)
- [ ] Node installed? (`node -v`)
- [ ] npm installed? (`npm -v`)
- [ ] Ran `composer run setup`?
- [ ] Ran `composer run dev`?
- [ ] Waiting long enough for Vite to compile? (30 seconds)
- [ ] Clear browser cache? (Ctrl+Shift+Delete)
- [ ] Hard refresh? (Ctrl+F5)
- [ ] Checking both terminals for errors?
- [ ] Correct URL? (http://localhost:8000)

---

## 🎉 SUCCESS!

If you see the landing page with:

- ✅ Top bar info
- ✅ Navigation menu
- ✅ Yellow ticker scrolling
- ✅ Hero slider with stats
- ✅ Welcome section

**Congratulations! 🎊**

Everything is working correctly!

---

**Version**: 1.0.0  
**Last Updated**: June 2, 2026  
**Support**: Full documentation included  
**Status**: Ready to develop 🚀
