# SkillForge

SkillForge is a REST API-based application for managing personal learning (courses, skills, goals, and progress).

## Tech Stack
- Laravel 13
- MySQL
- Docker (Laravel Sail)
- Laravel Sanctum (API authentication)
- Scribe (API documentation)

## Status
Project is under active development.

## API Documentation

Available at:
http://localhost/docs

## Authentication

This API uses Bearer token authentication.

### Login

POST /api/login

Example credentials:
- email: admin@skillforge.test
- password: password

Use the returned token in requests:

Authorization: Bearer YOUR_TOKEN

## Available Endpoints

- POST /api/login - login user
- POST /api/logout - logout user
- GET /api/profile - get current authenticated user profile

## Setup

```bash
git clone https://github.com/ivan-kureyko/skillforge.git
cd skillforge

cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed

