# TeleViewIoT Project

TeleViewIoT is a complete IoT data visualization system built with a **PHP service-repository-layer architecture**, **TimescaleDB** for time-series data, **Redis** for queueing and caching, and **Nginx** as the web server. The entire environment is containerized using **Docker** for easy deployment and scalability.

## Technologies Used

- **PHP 8.4** (FPM) for the backend application  
- **Nginx** as the web server  
- **PostgreSQL + TimescaleDB** for time-series IoT data storage  
- **Redis** for queuing and caching  
- **Docker & Docker Compose** for containerized environment  
- **Eloquent ORM** for database interactions  
- **Cron / Worker scripts** to process Redis queues 

## Docker Setup

We use **Docker Compose** to run 4 containers:

| Service          | Image                           | Purpose                                           | Ports           |
|-----------------|---------------------------------|-------------------------------------------------|----------------|
| `php`           | `php:8.4-fpm`                  | Runs the backend MVC application               | N/A            |
| `nginx`         | `nginx:alpine`                  | Serves PHP application and static files       | 8080:80        |
| `timescaledb`   | `timescale/timescaledb:latest-pg15` | Stores IoT time-series data                    | 5432:5432      |
| `redis`         | `redis:alpine`                  | Queue and caching for IoT data                 | 6379:6379      |
