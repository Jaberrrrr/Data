create database restauarant;

use restaurant;

create table klant(
naam varchar (255) not null,
email varchar (255) not null,
password varchar(255)
);
 
create table product(
naam varchar (255) not null,
omschrijving varchar (255) not null,
prijs int not null
);
 
create table reservering(
naam varchar (255) not null,
tijd time not null,
datum date not null
);
 
create table tafel(
tafelnummer int not null,
bijzonderheden varchar (255) not null,
max_persoon int not null
 
);
 
create table rekening(
naam varchar(255) not null,
tafelnummer int not null,
totaal_bedrag int not null
);
 