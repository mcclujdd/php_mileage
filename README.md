Project established: 11-26-2023

Creator: Jason McClurg

Purpose: Web based mileage tracking app 

### Network

### Database
Password must be set in a .env file in the same directory as docker-compose file
For example: .../php_mileage/.env

Use whatever you like as a password, for example:

_.env_
```
DB_PASS=super-secret-password
```
##### Using PHPMyAdmin:
Access via localhost:8081
User: root
Pass: (whatever was set in .env file for DB_PASS)

### docker
run docker with 
    docker compose up -d

access the app via **localhost:8080**
