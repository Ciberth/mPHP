# Simple nginx + php + mysql charm

This charm is a learning charm. It provides an http interface and requires a mysql interface. It sole purpose is to run a webserver with php and deploy some php files: a test, config, read and write page. 


# How to use 

Use mysql from charm store, and mPHP locally.

juju deploy mysql
juju deploy mphp

juju add-relation mysql mphp
juju expose mphp


Then go to http://IP/info.php to test the php and nginx installation and use http://IP/write.php and read.php for testing out the mysql relation.

