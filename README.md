# How To Run

## Environment Setup
-Download and Install XAMPP
-Navigate to the htdocs folder
-Make a folder "assignment2-sepm" inside the htdocs
-Clone this repository inside this folder

## Setup MYSQL Root User
-Start XAMPP Control Panel and run apache, mysql
-Open the Command Line Shell
-Enter `mysql -u root`
-Use the query `USE mysql; UPDATE user SET password=PASSWORD('Rmit1234') WHERE User='root' AND Host = 'localhost'; flush privileges;`

## Setup MYSQL Database
-Run the query given in the repository named "sql_query.txt" in the shell after setting up the root user.
 
## Run Web Application
-Inside your browser hit `http://localhost/assignment2-sepm/`
-Enjoy! Your WebApp is now running.

### Developed By: Adeeb Ahmed, Yousef Fares, Syed Sabih Ali, Aditya Deswal
