WHITELIST_SAMP
==============

### What is WHITELIST_SAMP?
**WHITELIST_SAMP** is a global whitelist portal to get rid of cheaters and generally users that hurt the user experience (by trolling, for example). It works like a centralized account system for San Andreas Multiplayer

WHITELIST_SAMP _does not_ provide any form of real anti-cheat to servers.

### How does WHITELIST_SAMP work?
In order to register an account in the whitelist, you'll need to visit (thiswebsite). Once the account is registered, you'll be done. Easy, right?

Now, how does it work for developers? Developers will be able to request an API for their account. More information on the Terms of Service of the API will be found in the portal. Once the API is requested, they'll be able to do the following things:

* Check if a user is registered in WHITELIST_SAMP and gather its information.
* Check if a user is locally banned from their server or globally banned from WHITELIST_SAMP.
* Locally ban a user from their server or globally (if the API key is allowed) in the whitelist.
* Delete local bans (with the API) from their servers. The API service does not support removal of global bans.

In the future, two-factor authentication will be added as well.
Now, how do you allow your API key to globally ban someone from the whitelist?

Only trusted servers will be allowed to do so for security reasons.
More information on this will be released in the portal.

WHITELIST_SAMP functionality is fairly simple. Once a user joins a server, if WHITELIST_SAMP is implemented, the server requests the user to register their WHITELIST_SAMP account in the server. An API sends WHITELIST_SAMP the user IP address, username, password (obviously hashed) and store it in the database. In this way, if a player changes nickname and the IPs match, it will be saved as alias in the database.

==============
### Developed with CakePHP
[![CakePHP](http://cakephp.org/img/cake-logo.png)](http://www.cakephp.org)

CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.
Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.
