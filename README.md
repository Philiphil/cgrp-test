Hi !
This project has been a lot of fun.
The no framework php-rule forced me to write in vanilla PHP, which is a thing I haven't done in years, except for small scripts automating little tasks.
Same thing with vanilla HTML/CSS/JS, I didn't realize for how long I've been using Javascript front end framework until I had to do this assignment.
So it took me back right to college with old school PHP/HTML.


# Installation
This project is supposed to run on apache2
a `composer install` is required
also a `bin/doctrine orm:schema-tool:create` for the database

Now, on to the technical choice.
The first question that came into my mind was

# Should I make a small router to bind routes to controllers or not ?
In any other case, there will be no question, of course I will use controller and routes and not something like my_page.php.

But the assigment asked for no framework, so, either I make an homemade router either I go for a classical my_page.php way.
I could have made an homemade router, I had made those in the past but for this project which is bascily a Single Page Application, It felt like a waste of time.

# Should I use doctrine or not ?
Since twig was mentioned as authorized, I wasn't sure if doctrine was allowed or not.
If the job offer was for vanilla php developement or creating a new framework from scratch, watching me use PDO will me relevant but the job offer is for Laravel, so I chose to use an ORM.
I hope I didn't make a mistake here.

# Why apache2 ?
Since docker was not allowed, I had to choose a more classical approche which mean a widely used webserver which left me 3 options
Ngnix
SSI (windows server)
Apache2
SSI and windows server are only use in full microsoft environment so it didn't feel appropriate, so it left only apache & ngnix
I chose apache2 simply because Im more experienced with it

# Why havent I used Jquery
With modern js frameworks, I simply lost the habbit of using Jquery for everything, and didn't found Jquery relevant for this project.

# Why did I used phpdotenv
I tried to stick with the only (or almost) vanilla php rule but for the database configuration and the user/password, .env file are the cleanest way and I couldn't resolve myself to not use it.

