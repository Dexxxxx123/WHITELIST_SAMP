BLACKLIST_SAMP
==============

### What is BLACKLIST_SAMP?
**BLACKLIST_SAMP** is a global blacklist portal to get rid of cheaters and generally users that hurt the user experience (by trolling, for example). BLACKLIST_SAMP is community moderated which means that server developers/administrators will either decide if banning a user or not. 

BLACKLIST_SAMP _does not_ provide any form of real anti-cheat to servers.

### How does BLACKLIST_SAMP work?
BLACKLIST_SAMP functionality is fairly simple. Once a user joins a server, the server through an API sends BLACKLIST_SAMP the user IP address and nickname and store it in the database. In this way, if a player changes nickname and the IPs match, it will be saved as alias in the database.

Server administrators will be able to **request** a ban from the system through APIs, meanwhile server administrators will kick or ban from their own servers using their own user authentication system.

A server can only request **one** ban **per user**. Once the system sees that multiple requests have been sent against the same user, the user will be blacklisted from the system.

As said before, **BLACKLIST_SAMP** does not have a _staff_ and it is community moderated. However, we allow everyone to contribute to the project. Please visit the Project Features wiki page to see what's missing for a stable release.

### Developed with CakePHP
[![CakePHP](http://cakephp.org/img/cake-logo.png)](http://www.cakephp.org)

CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.
Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.
