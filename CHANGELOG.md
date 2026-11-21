# Changelog

All notable changes to the application template are documented in this file. The format follows
[Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased]

## [0.2.0] - 2026-11-21

### Changed

- Requires `omnitrix/core` `^0.2` (row and query cache; see `config/database.php`).
- CI builds OpenSwoole 26.2 from source.

## [0.1.0] - 2026-11-14

### Added

- Application template: `bootstrap.php`, `config/`, `routes/api.php`, example `User` and `Post`
  models with migrations and a seeder, `UserController`, `SendWelcomeEmail` job, the `omnitrix`
  command line, and unit and feature tests.
