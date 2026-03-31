# SkillForge

SkillForge is a REST API application for managing personal learning,
including courses, skills, goals, and progress tracking.

------------------------------------------------------------------------

## 🚀 Features

-   User authentication (Laravel Sanctum)
-   Course management
-   Skill management
-   Goal tracking
-   Progress tracking (history of updates)
-   Policy-based authorization (users can access only their own data)

------------------------------------------------------------------------

## 🛠 Tech Stack

-   Laravel 13
-   MySQL
-   Docker (Laravel Sail)
-   Laravel Sanctum (API authentication)
-   Scribe (API documentation)

------------------------------------------------------------------------

## ⚙️ Installation

``` bash
git clone https://github.com/ivan-kureyko/skillforge.git
cd skillforge

cp .env.example .env

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

------------------------------------------------------------------------

## 🔐 Authentication

This API uses Bearer Token authentication via Laravel Sanctum.

### Login

POST /api/login

Example credentials:

-   email: admin@skillforge.test
-   password: password

Use the returned token in requests:

Authorization: Bearer YOUR_TOKEN

------------------------------------------------------------------------

## 📚 API Endpoints

### Auth

-   POST /api/login
-   POST /api/logout
-   GET /api/profile

### Skills

-   GET /api/skills
-   POST /api/skills
-   GET /api/skills/{id}
-   PUT /api/skills/{id}
-   DELETE /api/skills/{id}

### Courses

-   GET /api/courses
-   POST /api/courses
-   GET /api/courses/{id}
-   PUT /api/courses/{id}
-   DELETE /api/courses/{id}

### Goals

-   GET /api/goals
-   POST /api/goals
-   GET /api/goals/{id}
-   PUT /api/goals/{id}
-   DELETE /api/goals/{id}

### Progress

-   GET /api/progress
-   POST /api/progress
-   GET /api/progress/{id}
-   PUT /api/progress/{id}
-   DELETE /api/progress/{id}

------------------------------------------------------------------------

## 📖 API Documentation

API documentation is generated using Scribe.

To regenerate docs:

``` bash
./vendor/bin/sail artisan scribe:generate
```

Docs are available at: http://localhost/docs

------------------------------------------------------------------------

## 📥 Example Request

POST /api/courses

``` json
{
  "title": "Laravel for Beginners",
  "description": "Intro course",
  "skill_ids": [1, 2]
}
```

------------------------------------------------------------------------

## 📦 Data Structure

### Goal

``` json
{
  "id": 1,
  "user_id": 1,
  "course_id": 2,
  "status": "in_progress",
  "deadline": "2026-04-10",
  "created_at": "2026-03-30T10:00:00.000000Z"
}
```

### Goal Statuses

-   new
-   in_progress
-   completed

------------------------------------------------------------------------

## 🔗 Relationships

-   User has many Courses
-   User has many Goals
-   Course belongs to User (author)
-   Course belongs to many Skills
-   Goal belongs to User
-   Goal belongs to Course
-   Goal has many Progress entries
-   Progress belongs to Goal

------------------------------------------------------------------------

## 🔐 Authorization

-   Users can access only their own data
-   Policies are used for authorization
-   Unauthorized access returns HTTP 403

------------------------------------------------------------------------

## 📥 Example Response

``` json
{
  "data": [
    {
      "id": 1,
      "course": {
        "id": 2,
        "title": "Laravel Basics"
      },
      "status": "in_progress",
      "deadline": "2026-04-10"
    }
  ]
}
```

------------------------------------------------------------------------

## 🧪 Development Status

Project is under active development.

Planned improvements:

-   API Resources (clean JSON responses)
-   Filtering & pagination
-   Automated tests (PHPUnit)

------------------------------------------------------------------------

## 👨‍💻 Author

Ivan Kureyko
