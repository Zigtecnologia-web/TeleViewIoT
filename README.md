# Comedata IoT - TeleViewIoT Project

Comedata IoT is a complete IoT data visualization system built with a **PHP service-repository-layer architecture**, **TimescaleDB** for time-series data, **Redis** for queueing and caching, and **Nginx** as the web server. The entire environment is containerized using **Docker** for easy deployment and scalability.

## Technologies Used

- **PHP 8.4** (FPM) for the backend MVC application  
- **Nginx** as the web server  
- **PostgreSQL + TimescaleDB** for time-series IoT data storage  
- **Redis** for queuing and caching  
- **Docker & Docker Compose** for containerized environment  
- **Eloquent ORM** for database interactions  
- **Cron / Worker scripts** to process Redis queues 
