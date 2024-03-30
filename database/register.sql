use projekti;

create table register(id int auto_increment, fullname varchar(100), 
birthday date, email varchar(50), passwordi varchar(50), primary key (id));

insert into register( fullname, birthday, email, passwordi) values
('brilant viqi', '2004-01-01', 'brilantponxhaj@gmail.com', 'brilanti');