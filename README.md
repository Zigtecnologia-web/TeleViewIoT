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

## .env
```php
APP_ENV=local
APP_DEBUG=true

DB_CONNECTION=pgsql
DB_HOST=timescaledb
DB_PORT=5432
DB_DATABASE=comedata
DB_USERNAME=comedata
DB_PASSWORD=secret

REDIS_HOST=redis
REDIS_PORT=6379
```

## Running the Containers
Start all containers in detached mode:

```php
docker-compose up -d
```

```php
docker-compose logs -f
```

```php
docker-compose down
```

### Worker Execution

To start the telemetry worker in the background, use:

```bash
nohup php App/Workers/TelemetryWorker.php > logs/worker_$(date +%Y%m%d).log 2>&1 &

# 🕵️‍♀️ Inspect Redis Queues

# Use this command to access the Redis CLI inside the container
# and verify the status or items in the queues.

docker exec -it comedata-redis redis-cli

# Example (inside redis-cli):
# LLEN default_queue 
# LRANGE default_queue 0 10