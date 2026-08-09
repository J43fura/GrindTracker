## Execution Mode

Work autonomously.

After completing each step:
- Check whether the original task is fully solved.
- If not solved, continue investigating.
- Run tests/builds.
- Fix errors automatically.
- Do not stop to ask for confirmation unless blocked by missing information.

## Stack & verification

- Plain PHP (mysqli) + vanilla JS. **No package manager, no Composer, no build step, no test suite, no lint config, no CI that runs code.**
- The only automated check available is PHP syntax: `php -l <file>` (php may not be installed in the default env).
- Frontend libs are vendored under `GrindTracker/Addons/` (jQuery, Chart.js, jspdf, PHPMailer). Never try to install them via npm.

## Local setup (only served pages to real data)

- DB schema to import: `GrindTracker/Addons/grindtracker.sql`.
- DB credentials are hardcoded in `GrindTracker/connection.php` (`root`/empty password, db `grindtracker`); edit there for local runs.
- Per user `register.php` creates an owned table `pr<id>`, so every registered user needs a running MySQL.

## Architecture notes

- Auth guard: every page starts with `session_start()` and checks `$_SESSION["id"]` (redirect to `index.php` if absent). A new page must keep this guard.
- AJAX endpoints are plain PHP that `echo` a code (1 = ok, 0 = error, 2 = duplicate) consumed by jQuery in `profile.php` / `summary.php`; there is no JSON API.
- `varssettings.php` ADD/RENAME/DROP custom columns on `pr<id>` with raw identifiers in `ALTER TABLE`; this is intentionally unparameterizable and a known SQL-injection surface. The wider codebase is mid-refactor to escape POST values with `mysqli_real_escape_string` (done in `vars.php` only). Keep the pattern, but don't claim it's safe for public deployment.
- `summary.php`, `graph.php`, `profile.php` render Chart.js charts in-page; log and die on JS errors rather than swallowing them.

## Deployment

- Single workflow `.github/workflows/azure-static-web-apps-jolly-river-0b19b2103.yml`: Azure Static Web Apps upload, triggered **only** on push/PR to branch `add-license-1`. No build/serve of PHP; this repo is expected to run locally.