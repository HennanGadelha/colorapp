create table users (
        id      int not null auto_increment primary key,
        name    varchar(100) not null,
        email   varchar(100) not null,
        idade   int not null,
        fone    int not null,
)
    


create table colors(
        id      int not null auto_increment primary key,
        name    varchar (50)
)

create table userforcolors (

id int not null AUTO_INCREMENT PRIMARY KEY,
    userColor int not null,
    colorUser int not null
    
)

ALTER TABLE  userforcolors ADD FOREIGN KEY(userColor) REFERENCES users(id)
ALTER TABLE  userforcolors ADD FOREIGN KEY(colorUser) REFERENCES color(id)