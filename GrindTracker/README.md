# GrindTracker

A self-progress tracker that keeps daily values, graphs them over time and
emails summaries.

## Features

- Register / login with email verification code.
- Daily **variables**: add, rename, drop custom columns (letters, numbers,
  underscores only).
- Batch save values for any date via the profile calendar
  (`?timecalendar=YYYY-MM-DD`).
- **TODOs** per day (max 124 chars), complete / delete, filter views.
- **Summary** page: last-30-days activity heatmap, current + record streaks,
  today digest, stat cards (values logged, active days, streak, record),
  one Chart.js line graph per variable, last-30-days history table with CSV
  export.
- Download or email each graph (JPEG) and the full summary (PDF).
- Dark mode toggle, scroll-locked popups.

## Local setup

1. Import the schema: `Addons/grindtracker.sql` (DB `grindtracker`).
2. Set DB credentials in `connection.php` (localhost / root / empty password
   by default).
3. Set your mailer in `register.php`, `emailGraph.php`, `emailSummary.php`
   (both `$mailerUsername` and `$mailerPassword` placeholders).
4. Serve the repo root with Apache/PHP (PHP + MySQL + mysqli required).
   No composer / npm / build step — frontend libs are vendored under
   `Addons/`.

Every registered user gets their own `pr<id>` table, so each account needs a
running MySQL server.

## Notes

- The app is designed for local use. Known surfaces remain that should not be
  exposed publicly (raw identifiers in `ALTER TABLE`, no prepared statements
  across the board). All user-supplied strings are escaped with
  `mysqli_real_escape_string` and session ids are cast to int, but this is
  still not hardened for untrusted multi-tenant deployment.