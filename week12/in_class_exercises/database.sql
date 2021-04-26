drop database if exists WEEK12;

create database week12;
use week12;

CREATE TABLE if not exists useraccount (
  username varchar(20) NOT NULL,
  password_hash varchar(64) NOT NULL,
  firstname varchar(40) NOT NULL,
  lastname varchar(40) NOT NULL
);

INSERT INTO `useraccount` (`username`, `password_hash`, `firstname`, `lastname`) VALUES
('obama', '$2y$10$dXplxdw7LLVMFL8AMEX3jesXiEF9QTz7tnGfckbuOwEOPTOoDTcFu', 'Barack', 'Obama'),
('peter', '$2y$10$jZhBW1YIJD3Hm2DKOCYOReMF.GBgHN3g8QhXwbhITcuMu5GSfDDN6', 'Peter', 'Pan');

ALTER TABLE useraccount 
  ADD PRIMARY KEY (username);
  
