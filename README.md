## Laravel scheduled
Example how you can use laravel schedule task to synchronize statuses of tasks.

#### Used
* Laravel
* NodeJS with Express server
* MySQL
* Docker

#### How to start
1. At first run docker-compose up -d
2. First run will create migration of database
3. After this add comment in your docker-compose file php artisan migrate --seed and start again with docker-compose up -d
4. Run "docker ps" to find docker with nginx and connect to it by "docker exec -it ceea06a4f8c1 bash" where ceea06a4f8c1 id of container.
5. Run sh /home/scripts/daemon.sh
6. Open http://localhost:8080 in your browser and register to get access in dashboard.