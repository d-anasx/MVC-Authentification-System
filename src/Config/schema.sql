create DATABASE mvc;

use MVC;

create table users(
    id int PRIMARY KEY ,
    name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(225),
    role_id int,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE Table Roles(
    id int PRIMARY key,
    title enum('admin' , 'company' , 'candidate')
)