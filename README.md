# symfony-todo

Checkout.  
Edit file app/config/parameters.yml to set correct db information and secret.  
You do not need to have the dabase already created.   
  
Run this to create the database:  
php app/console doctrine:database:create  
  
Then run these:  
php app/console doctrine:generate:entities AppBundle  
php app/console doctrine:schema:update --force  
php app/console doctrine:migrations:migrate  
rm -rf app/cache/  
  
