# Introduction

REST API for managing personal learning: courses, skills, goals, and progress.

<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>

    This documentation describes the current SkillForge API endpoints.

    ## Authentication

    This API uses Bearer token authentication.

    1. Send a request to `POST /api/login`
    2. Copy the returned token
    3. Pass it in the `Authorization` header:

    `Authorization: Bearer YOUR_TOKEN`

    <aside class="success">Use the seeded admin account for local testing: <code>admin@skillforge.test</code> / <code>password</code>.</aside>

