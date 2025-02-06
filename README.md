# Laravel Boilerplate

A modern Laravel application boilerplate with Docker support, PostgreSQL, and Adminer.
Created and maintained by [3C Plus](https://3cplusnow.com/).

## Features

- **PostgreSQL Database**: Modern, powerful, and open-source database system
- **Adminer**: Lightweight database management interface
- **Redis**: In-memory data structure store
- **Laravel Horizon**: Beautiful dashboard and code-driven configuration for your Redis queues
  - Real-time queue monitoring
  - Job & Queue metrics
  - Failed job management
  - Process management
  - Custom queue configuration
  - Auto-balancing strategies
- **MailDev**: SMTP Server + Web Interface for email testing
  - Catch all outgoing emails
  - Web interface to preview emails
  - API for email testing
  - No emails are actually sent to real recipients

## Requirements

- Docker
- Docker Compose

## Quick Start

1. Clone the repository:
```bash
git clone <repository-url>
cd Laravel-Boilerplate
```

2. Copy the environment file:
```bash
cp .env.example .env
```

3. Start the Docker containers:
```bash
docker compose up -d
```

4. Install dependencies and set up the application:
```bash
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```

## Services

The following services will be available:

- **Laravel Application**: http://localhost:8001
- **PostgreSQL Database**: localhost:5432
  - Database: laravel
  - Username: laravel
  - Password: secret
- **Adminer (Database Management)**: http://localhost:8081
  - System: PostgreSQL
  - Server: db
  - Username: laravel
  - Password: secret
  - Database: laravel
- **Redis**: localhost:6379
- **Horizon Dashboard**: http://localhost:8001/horizon
- **MailDev (Email Testing)**: http://localhost:1080
  - SMTP Server: localhost:1025
  - Web Interface: http://localhost:1080

## API Endpoints

- Health Check: http://localhost:8001/api/health

## Development

### Directory Structure

- `app/` - Application core code
- `routes/` - Application routes
  - `api.php` - API routes
- `database/` - Database migrations and seeders
- `tests/` - Application tests
- `docker/` - Docker configuration files

### Available Commands

```bash
# Start containers
docker compose up -d

# Stop containers
docker compose down

# View logs
docker compose logs

# Run migrations
docker compose exec app php artisan migrate

# Run tests
docker compose exec app php artisan test

# Clear cache
docker compose exec app php artisan cache:clear

# Start Horizon
docker compose exec app php artisan horizon

# Check Horizon Status
docker compose exec app php artisan horizon:status

# Pause Horizon
docker compose exec app php artisan horizon:pause

# Continue Horizon
docker compose exec app php artisan horizon:continue
```

### Database Management

1. Access Adminer at http://localhost:8081
2. Use the credentials mentioned in the Services section
3. You can manage your database through this interface

## Queue Management with Horizon

Laravel Horizon provides a beautiful dashboard and code-driven configuration for your Redis queues. Some key features include:

### Dashboard Access
Access the Horizon dashboard at: http://localhost:8001/horizon

### Queue Configuration
The queue configuration is handled through Redis and can be customized in `config/horizon.php`. The default setup includes:

- Simple queue balancing
- Process management for different environments
- Job retry settings
- Queue metrics and monitoring

### Common Queue Commands
```bash
# Start Horizon
docker compose exec app php artisan horizon

# Check Horizon Status
docker compose exec app php artisan horizon:status

# Pause Horizon
docker compose exec app php artisan horizon:pause

# Continue Horizon
docker compose exec app php artisan horizon:continue

# Terminate Horizon
docker compose exec app php artisan horizon:terminate
```

### Monitoring
Horizon provides real-time monitoring of:
- Queue wait times
- Throughput
- Runtime
- Job failures
- Process counts

### Failed Jobs
Failed jobs can be managed through the dashboard:
- View failure details
- Retry failed jobs
- Delete failed jobs

## Environment Variables

Key environment variables:

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

QUEUE_CONNECTION=redis

MAIL_MAILER=smtp
MAIL_HOST=maildev
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Contributing

1. Create a new branch
2. Make your changes
3. Submit a pull request

## License

This project is open-sourced software licensed under the MIT license.
