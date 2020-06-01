# How To Run

## Environment Setup
1. Download and Install XAMPP
2. Navigate to the htdocs folder
3. Make a folder "assignment2-sepm" inside the htdocs
4. Clone this repository inside this folder

## Setup MYSQL Root User
1. Start XAMPP Control Panel and run apache, mysql
2. Open the Command Line Shell
3. Enter `mysql -u root`
4. Use the query `USE mysql; UPDATE user SET password=PASSWORD('Rmit1234') WHERE User='root' AND Host = 'localhost'; flush privileges;`

## Setup MYSQL Database
1. Run the query given in the repository named "sql_query.txt" in the shell after setting up the root user.
 
## Run Web Application
1. Inside your browser hit `http://localhost/assignment2-sepm/`
2. Enjoy! Your WebApp is now running.

### Developed By: Adeeb Ahmed, Yousef Fares, Syed Sabih Ali, Aditya Deswal
