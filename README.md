# EduVerse — Setup & Run Guide

## 1. Install

1. Extract this folder into your XAMPP `htdocs` directory, e.g.
   `C:\xampp\htdocs\EduVerse`
2. Start **Apache** and **MySQL** from the XAMPP control panel.

## 2. Database

Import your `eduverse` database into MySQL (phpMyAdmin → Import) if you
haven't already. `includes/config.php` and `db.php` both connect to a
database named exactly `eduverse` on `localhost` with user `root` and
no password (the XAMPP default) — edit those two files if your setup
differs.

## 3. AI features (chat assistant + Career Advisor)

Both features read the same key from `includes/ai-key.local.php`, which
is **not included** in this project on purpose (it holds a secret and is
gitignored). Create it yourself:

1. Copy `includes/ai-key.local.example.php` to `includes/ai-key.local.php`
2. Open it and replace the placeholder with your real Groq key:
   ```php
   <?php define('GROQ_API_KEY', 'gsk_your_real_key_goes_here');
   ```
3. Get a free key at https://console.groq.com/keys (name it anything,
   expiration "No expiration" is fine for local dev)

If this file is missing, the floating AI chat shows a friendly
"temporarily unavailable" message, and the Career Advisor automatically
falls back to a local rule-based analysis instead of a live AI one —
neither one breaks the site.

## 4. Open it

Go to `http://localhost/EduVerse/Index.php` (adjust the port/folder
name to match your setup).

## 5. Test accounts

The database already has two registered accounts (see `eduverse.sql`),
or use the Register page to create a new one — passwords are hashed
with `password_hash()`, so there's no way to set one directly in SQL
without hashing it first.

## Troubleshooting

- **AI chat says "temporarily unavailable"**: check `includes/ai-key.local.php`
  exists and has a real key. If it's there and still failing, temporarily
  set `EDUVERSE_AI_DEBUG` to `true` at the top of `api/ai-chat.php`, retry,
  and check the failed request's Response tab in DevTools for the reason —
  then set it back to `false`.
- **Login/Register look unstyled**: make sure `reg.css` is present at the
  project root (same folder as `login.php`).
- **A page 404s**: confirm you're accessing the project through
  `http://localhost/EduVerse/...` and not opening the `.php` file directly
  from disk — PHP needs Apache to run.
