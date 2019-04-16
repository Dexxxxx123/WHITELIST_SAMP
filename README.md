WHITELIST_SAMP [abandoned]
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

You may view the versions roadmap in [this](https://github.com/GiampaoloFalqui/WHITELIST_SAMP/wiki/Versions-Roadmap) wiki page.

==============
### Developed with Laravel 5
[![Laravel 5](http://laravel.com/assets/img/laravel-logo.png)](http://laravel.com)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.
