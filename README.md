## Template for new Wordpress sites  **(v 1.0)**

## Instalation

Instalation is done only by 1 team member (let's call him Admin, and new project is newproject).

### First Step:
Admin creates new repository on Gitlab (ex: http://gitlab.tipy.rs/web/newproject)
This repository is empty for now.

### Second Step:
Admin clones **this** repository in his local environment (ex: cd wamp/www/) like this:

    git clone git@gitlab.tipy.rs:web/WProject.git newproject
    
Navigate to that repository (cd newproject) and do following command (to switch remote branch from gitlab.tipy.rs/web/WProject to gitlab.tipy.rs/web/newproject):

    git remote set-url origin git@gitlab.tipy.rs:web/newProject.git
    
You can check is remote origin changed, by typing command:

    git remote -v
    
and you should see output: 

    origin  git@gitlab.tipy.rs:web/newproject.git (fetch)
    origin  git@gitlab.tipy.rs:web/newproject.git (push)
    
So far so good!

### Third Step:
This can be done in few ways, so Admin just chooses one (with pre-installed push).
If you need to seperate branches, first create new branch (manually or via git checkout -b newbranch) and then push to that branch.
Admin pushes his now, local environment (which contains template) onto remote branch (web/newproject) with simple:
    
    git push
    
NOTE: If Admin gets some error, he uses (only once) command:

    git push -u origin master
    
After that, Admin can use simple git push (depending on branch Admin is on).

### Fourth Step
For this to work, you need to have wp-cli ready to use on your local machine (or virtual box etc...).
First step, we will download newest wordpress with command:

    wp core download

/* Note: This will download wordpress into your local repository, #without# overriding wp-content/themes/tipytheme folder that is already inside
 * If by any chance you don't have wp-cli on your pc, you need to download entire wordpress manually into your repo, and move our theme folder (that is in wp-content/themes/tipytheme) into wordpress default wp-content/themes folder.
 * If you are doing things manually, continue instalation with opening your current web site on local machine ex: http://localhost/newproject (if you are on wamp/xamp/lamp etc...) and follow instructions and #skip# to next step completely
*/

Second step, you need to create database. You can do it manually, here are mysql commands in case you are using mysql in command shell:
[WINDOWS] if you get error "...Access denied for user 'ODBC'@'localhost' (using password: NO)" switch user with command:

  mysql -h hostname-u dbusername -p dbpass [default hostname is localhost and pass can be skipped if it is empty]

Once you are logged in mysql, type:

  CREATE DATABASE database-name CHARACTER SET utf8 COLLATE utf8_general_ci;

By default all privilegues are passed to dbusername.
Third step, you need to init wp config with command which is pretty self explanatory (you can skip --dbpass if it doesn't exist):

    wp core config --dbname=database-name --dbuser=dbadmin-username --dbpass=dbadmin-userpass

Fourth step, enter wordpress admin credential:

    wp core install --url=http://localhost/newproject --title="Newproject Website" --admin_user="AdminName" --admin_password="adminpassword" --admin_email="admin@email.com"

That's it! You installed Wordpress via command line (or manually) with wp-cli and mysql

### Fifth Step
You still can't activate theme, because style.css doesn't exist. In order for it to work, you need to follow next steps. Admin now installs npm dependency with:

    npm install

Once it's done, create style.css with running command once:

    grunt run
    
and after this, run grunt, you can but not need to use :3000 for autoreload and start creating something awesome!

Last thing left to do is to push it to remote repo, so other developers can start working with same settings (check for branches as well)

    wp theme activate tipytheme
    //Or do it manually
    
    git add .
    git commit -m "Initial commit"
    git push
    
### Sixth step
Any other developer that wants to start working on project, should clone newly made newProject repo localy:

    git clone git@gitlab.tipy.rs:web/newproject.git
    
and then, just install locally npm:

    npm install
    
and that is it!
    
### Seventh step
About database - coming soon!