# SkillForge

SkillForge is a REST API-based application for managing personal learning (courses, skills, goals, and progress).

## Tech Stack
- Laravel 12
- MySQL
- Docker (Laravel Sail)

## Status
Project is under active development.

## Setup

```bash
git clone https://github.com/ivan-kureyko/skillforge.git
cd skillforge

cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
