# Hair Salon APP

### By **Samuel Peppard**

## Description

An app that allows a hair salon owner to add stylists and for each stylist add a list of clients.

## Specifications

#### 1. Return the listed stylist when a stylist name is entered

* Example Input: Matthew
* Example Output: 1. Matthew

#### 2. Return the listed clients when the client's name and assigned stylist is entered.

* Example Input: Bobby, stylist - Matthew
* Example Output: 1. Bobby, stylist - Matthew

#### 3. Delete the stylists when the delete stylists button is pressed

* Example Input: delete
* Example Output: All stylists deleted

#### 4. Delete the clients when the delete clients button is pressed

* Example Input: delete
* Example Output: All clients deleted

## Setup/Installation Requirements

* SQL COMMANDS USED

1. CREATE DATABASE salon;

2. USE salon;

3. CREATE TABLE stylists (name VARCHAR (255), id serial PRIMARY KEY);

4. CREATE TABLE clients (name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);

* Clone this repository
* If editing, open project directory in Code Editor of choice
* If viewing, open your command prompt, type composer install, enter php -S localhost:8000 and type localhost:8000 in your browser address bar to view the application

## Known Bugs

No known bugs.

## Support and contact details

For comments or questions, please email sampeppard@gmail.com

## Technologies Used

HTML
CSS
PHP
PHPUnit
MySQL
Silex
Twig
Bootstrap version 3.3.7.

### License

*This application is licensed under the MIT license*

Copyright (c) 2016 **Samuel Peppard**
