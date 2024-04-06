
# Car rental web app    

Car rental web app, personal project made while learning the laravel framework, deployed on railway.app



## Selected features

- Booking a car by user, with possibilty of changing/delating record both by user and admin.
![](https://github.com/szmmon/car-rental-laravel/blob/main/car-rental-app/gifs/booking%20and%20editing%20and%20delate%20booking.gif)

- Admin can access cars menu for adding/delating cars, same for users table. 

![App Screenshot](https://github.com/szmmon/car-rental-laravel/blob/main/car-rental-app/gifs/admin%20cars%20menu.gif)

- Email verification done with mailtrap.io
  
 ## Demo 
 Sample account: 
 
 `login = user2@user.com`
 
 `password = useruser`
 
 https://car-rental-laravel-production.up.railway.app/

## Running Tests

To run tests,you will need to change the following environment variables and create your .env.testing file 

`APP_ENV=testing`

`DB_CONNECTION=sqlite`

`DB_DATABASE=:memory:`
 
Run following command to run tests
```bash
  php artisan test --env=testing
```
