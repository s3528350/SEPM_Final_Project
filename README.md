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

# How it works

## User Accounts
1. There are 3 types of users. Root, Admin, Assistant.
2. Root and Admin can do all the account management except that root can delete users.
3. Assistants can't manage accounts.
4. Admins can edit user information and add users.
5. There can be multiple Admins and Assistants but there can only be one root user above all.

## Locations
1. Admins and Assistants both can add locations to the system.
2. Admins and Assistants both can edit locations information.
3. Admins and Assistants both can delete locations.

## Tours
1. Admins and Assistants both can add tours to the system.
2. Admins and Assistants both can edit tours information.
3. Admins and Assistants both can edit tour types.
4. A tour can have copy locations.
5. Admins and Assistants both can delete tours.

## For More Info
1. Check the folder `SEPM_Assignment2` inside this repo.
2. The folder contains the Product Backlog and 3 Sprint Backlogs that corresponds to this Project. 

### Developed By: Adeeb Ahmed, Syed Sabih Ali, Yousef Fares, Adrian Pratama Suharto, Aditya Deswal
