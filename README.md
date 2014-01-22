WHITELIST_SAMP
==============

### What is WHITELIST_SAMP?
**WHITELIST_SAMP** is a global white portal to get rid of cheaters and generally users that hurt the user experience (by trolling, for example).

BLACKLIST_SAMP _does not_ provide any form of real anti-cheat to servers.

### How does WHITELIST_SAMP work?
WHITELIST_SAMP functionality is fairly simple. Once a user joins a server, if WHITELIST_SAMP is implement the server requests the user to register their WHITELIST_SAMP account in the server. An API sends WHITELIST_SAMP the user IP address, username, password (obviously hashed) and store it in the database. In this way, if a player changes nickname and the IPs match, it will be saved as alias in the database.

Server administrators will be able to **request** a locally or globally (if their API allows them to) ban from the whitelist through APIs.

Local bans are unlimited for server developers, instead only trusted servers will be allowed to globally ban players from the whitelist.

As said before, **WHITELIST_SAMP** does not have a _staff_ and it is community moderated. However, we allow everyone to contribute to the project. Please visit the Project Features wiki page to see what's missing for a stable release.

### Developed with CakePHP
[![CakePHP](http://cakephp.org/img/cake-logo.png)](http://www.cakephp.org)

CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.
Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.
