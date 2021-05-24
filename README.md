Laravel Facebook Stock Applicaton

Core Features:
  1. Login to application using Facebook JS API
  2. Store the user to the database
  3. Get the stock quotes using Alpha Vantage stock quote API
  4. Store the stock quotes to the database
  5. Show the stored stock quotes to user (UI)

Navigation:
  1. Profile - Once user is loggedin, system will show user's public details such as name, facebook user ID, and user email
  2. Stock - Stock page will facilitae user to get the stock quotes and list the all the searched stocks by current user
  3. Facebook Log In Button - Click to login using your facebook accout 
  4. Logout - Logout and clear the session
 
 Database (Modal/Migartion file):
 
  1. facebook_users table - Store the user's deatils at first time. Modal will check is user is present into DB? if not not present, system will create new record        else fetch the existing record and login. 
    Table Structure: ![image](https://user-images.githubusercontent.com/38145514/119388861-c2095180-bcc2-11eb-932a-6078b570c349.png)
  2. stock table - Store the searched stock quotes on success reponce of Alpha Vantage API with current loggedin user ID
     Table Structure: ![image](https://user-images.githubusercontent.com/38145514/119389083-0bf23780-bcc3-11eb-825a-c2df275a8c84.png)

- **[Vehikl](https://vehikl.com/)**
- **[Vehikl](https://vehikl.com/)**

Tech Stack:
  PHP (Laravel), JS, jQuery, CSS, Bootstrap, Facebook JS API, Alpha Vantage Stock Quote API, AJAX, JSON 
