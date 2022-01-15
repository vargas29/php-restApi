# Description

In this folder we are providing a database for the test, a simple MySQL DB running through Docker.

# Instalation

- You need to install docker locally so follow the instruction on docker's webpage https://docs.docker.com/desktop/#download-and-install 

- Also you will need to be able to run docker-compose https://docs.docker.com/compose/install/

- To run the instalation of docker you will need to run the command 
```
docker-compose up
```
with that you will have the database running on the 3307 port

# Considerations

The database has only one database called `blankfactor` with a table called `users`. The table has the following structure
```
+-----------+-----------------+------+-----+---------+----------------+
| Field     | Type            | Null | Key | Default | Extra          |
+-----------+-----------------+------+-----+---------+----------------+
| id        | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| name      | varchar(100)    | NO   |     | NULL    |                |
| last_name | varchar(100)    | YES  |     | NULL    |                |
| email     | varchar(250)    | NO   | UNI | NULL    |                |
| password  | varchar(250)    | NO   |     | NULL    |                |
+-----------+-----------------+------+-----+---------+----------------+
```

The users are:

- Normal user: bfuser:bfpassword
- Root user: root:root

You can make any change to the db if you need it by managing it directly, you can connect via the next commands

```
docker exec -it db-mysql bash 
mysql -u bfuser -p
```
Then entering the password bfpassword

Or you can use a DB manager like MySQL Workbench


That's all, if you have any question you can ask them to `santiago.agudelo@blankfactor.com`.
Have fun!