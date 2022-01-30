# PHP Hackathon
This document has the purpose of summarizing the main functionalities your application managed to achieve from a technical perspective. Feel free to extend this template to meet your needs and also choose any approach you want for documenting your solution.

## Problem statement
*Congratulations, you have been chosen to handle the new client that has just signed up with us.  You are part of the software engineering team that has to build a solution for the new client’s business.
Now let’s see what this business is about: the client’s idea is to build a health center platform (the building is already there) that allows the booking of sport programmes (pilates, kangoo jumps), from here referred to simply as programmes. The main difference from her competitors is that she wants to make them accessible through other applications that already have a user base, such as maybe Facebook, Strava, Suunto or any custom application that wants to encourage their users to practice sport. This means they need to be able to integrate our client’s product into their own.
The team has decided that the best solution would be a REST API that could be integrated by those other platforms and that the application does not need a dedicated frontend (no html, css, yeeey!). After an initial discussion with the client, you know that the main responsibility of the API is to allow users to register to an existing programme and allow admins to create and delete programmes.
When creating programmes, admins need to provide a time interval (starting date and time and ending date and time), a maximum number of allowed participants (users that have registered to the programme) and a room in which the programme will take place.
Programmes need to be assigned a room within the health center. Each room can facilitate one or more programme types. The list of rooms and programme types can be fixed, with no possibility to add rooms or new types in the system. The api does not need to support CRUD operations on them.
All the programmes in the health center need to fully fit inside the daily schedule. This means that the same room cannot be used at the same time for separate programmes (a.k.a two programmes cannot use the same room at the same time). Also the same user cannot register to more than one programme in the same time interval (if kangoo jumps takes place from 10 to 12, she cannot participate in pilates from 11 to 13) even if the programmes are in different rooms. You also need to make sure that a user does not register to programmes that exceed the number of allowed maximum users.
Authentication is not an issue. It’s not required for users, as they can be registered into the system only with the (valid!) CNP. A list of admins can be hardcoded in the system and each can have a random string token that they would need to send as a request header in order for the application to know that specific request was made by an admin and the api was not abused by a bad actor. (for the purpose of this exercise, we won’t focus on security, but be aware this is a bad solution, do not try in production!)
You have estimated it takes 4 weeks to build this solution. You have 3 days. Good luck!*

## Technical documentation
### Data and Domain model
In this section, please describe the main entities you managed to identify, the relationships between them and how you mapped them in the database.
  The database created will be formed by two tables , one for clients and other for rooms.
  1. Clients table contains information about the client : name, last name, CNP (which is the PRIMARY KEY), phone number and the type of programme the client chose
  2. Rooms table shows in which rooms any programme type(set as PRIMARY KEY) will take place, name room and its capacity
### Application architecture
In this section, please provide a brief overview of the design of your application and highlight the main components and the interaction between them.\
An admin can add programmes to the Center's timetable.
A user can register and make appointments to the programmes providing his full name, phone number and the CNP which is his unique user id. When registering the client can see the programmes at what time they are set and after registering it will show if the appointment was succesfull or not based on the rooms capacity. The client can also delete his appointment if he changed his mind, something came up and can't attend the programme or want to select a different one, thus an extra free spot will be available for the first said programme
###  Implementation
##### Functionalities
For each of the following functionalities, please tick the box if you implemented it and describe its input and output in your application:

[X] Connection to database\
[X] Creating tables\
[X] Inserting data in tables using a register form\
[x] Create programme \
[x] Book an appointment for the programme \
[X] Delete an appointment
[X] Show all scheduled appointments in a table which contains the clients data and the programme type

##### Business rules
Please highlight all the validations and mechanisms you identified as necessary in order to avoid inconsistent states and apply the business logic in your application.

A client can make a single appointment.
A person can't make more than one account because his CNP(which is also his id number) is unique and cant be inserted in the database more than once.
Each room can host one or more programme types. the rooms can't be used at the same time for separate programmes.
The rooms capacity can't be exceeded. The app will not allow to book appointments over it.

##### 3rd party libraries (if applicable)
Please give a brief review of the 3rd party libraries you used and how/ why you've integrated them into your project.

##### Environment
Please fill in the following table with the technologies you used in order to work at your application. Feel free to add more rows if you want us to know about anything else you used.
| Name | Choice |
| ------ | ------ |
| Operating system (OS) | Windows 10 |
| Database  | MySQL 5.7.19|
| PHP | 7.1.9 |
| Text Editor | Notepad++ |

### Testing
In this section, please list the steps and/ or tools you've used in order to test the behaviour of your solution.
App testing was made by me.

## Feedback
In this section, please let us know what is your opinion about this experience and how we can improve it:

1. Have you ever been involved in a similar experience? If so, how was this one different?
  I wasn't involved in a project like this.
2. Do you think this type of selection process is suitable for you?
  I believe this type of selection is suitable for me because it can show the way a person sees and approach a problem. Knowing more technologies surely helps in creating the app but the lateral and analytical thinking are the main points to be considered.
3. What's your opinion about the complexity of the requirements?
  The requirements were complex and challenging, just the way it had to be, maybe a bit lower.
4. What did you enjoy the most?
  I enjoyed beeing part of a big project and having the support provided by the hiring comittee 
5. What was the most challenging part of this anti hackathon?
  The most challenging part was not beeing able to use more advanced technologies since I did not studied them.
6. Do you think the time limit was suitable for the requirements?
  I don't think the time limit was suitable.
7. Did you find the resources you were sent on your email useful?
  Yes I did.
8. Is there anything you would like to improve to your current implementation?
  I would like to add more options on the admin side, being able to modify the schedule and view more data from the database.
9. What would you change regarding this anti hackathon?
  I think it was good, can't say i would want to change something in particular.
