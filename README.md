# Fingent_Demo_Student_Management
This is a simple laravel 8 appication to add students and enroll their mark.

## How to install and run on your local system
1. git clone https://github.com/Maneesha07/StudentModule.git
2. cd StudentModule
3. composer install
4. npm install
5. copy .env.example .env
6. php artisan key:generate
7. Add your database config in the .env file (you can check my articles on how to achieve that)
8. php artisan migrate
9. php artisan db:seed --class=TeacherSeeder
9. php artisan serve (if the server opens up, http://127.0.0.1:8000,  then we are good to go)
10. Navigate to http://127.0.0.1:8000/register and complete the signup.

## Operations
1. Signup and Login to the system
2. View Student List
3. Add,Edit and Delete Student details
4. View Mark List
5. Add,Edit and Delete Mark details