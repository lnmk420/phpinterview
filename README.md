<p align="center">img src="https://lh3.googleusercontent.com/p/AF1QipM5Ek8I1R7m-7AGk26QA21cKvHbFGoRsh53N3Fg=s680-w680-h510" width="400" alt="Octagon Logo"></p>



## Interview Test Overview

I have implemented register, login and view profile as requested.

On launch the application starts with welcome page from where user can login or register.

On successful registration the app redirects to login page

On successful login the app redirects to profile page

I have also implemented unit tests for login and register functionalities


## Serving the app

- [ cd to projects root directory]

- [run `touch database/iterviewdb.sqlite` to create sqlite database for the application]

- [ set the `DB_DATABASE` environment variable to absolute path of the `interview.sqlite` file ]

- [run `php artisan migrate` to apply migrations ]

- [run `php artisan serve` to start the application server]



