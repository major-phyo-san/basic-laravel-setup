##Devlopment Environment

- Laravel Framework 10.10
- PHP 8.1
- Composer 2.5
- Vue 3.2
- Tailwind 3.3
- Node 18.16
- Npm 9.51
- Vite 4

##Deployment Environment

- Ubuntu 
- NginX 
- MySQL 
- [IPAddress](http://x.x.x.x)

##Naming Conventions 

- `Variables` should typically be in snake case because all table columns are snake_case. (i.e. user_posts).
- `Methods` should be camelCase but the first character lower case and should start with verb . (i.e. getAllUsers)
- `Blade files` should be in lower case, snake_case (underscore between words). (i.e. all.blade.php, all_posts.blade.php)
- `Controllers` should be in singular case, no spacing between words, and end with "Controller".
   Also, each word should be capitalised. (i.e. BlogController)
- `DB tables` should be in lower case, with underscores to separate words (snake_case), and should be in plural form.
  (i.e. posts, project_tasks)
- `Pivot tables` should be all lower case, each model in alphabetical order, separated by an underscore (snake_case).
  (i.e. post_user, task_user )
- `Table column`  should be in lower case, and snake_case (underscores between words). It shouldn't be referenced the table name.
- `Primary Key` This should normally be id.
- `Foreign keys` should be the model name (singular), with '_id' appended to it (assuming the PK in the other table is 'id').
