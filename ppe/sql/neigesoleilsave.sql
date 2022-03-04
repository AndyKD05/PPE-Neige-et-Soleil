drop database if exists neigesoleil;
create database neigesoleil;
	use neigesoleil;

create table proprietaire
(
	idp int(5) not null auto_increment,
	nom_p varchar(20) not null,
	prenom_p varchar(20) not null,
	tel_p varchar(15) not null,
	mail_p varchar(40) not null,
	date_naiss_p date not null,
	numero_p varchar(10) not null,
	rue_p varchar(30) not null,
	CP_p varchar(10) not null,
	ville_p varchar(30) not null,
	pays_p varchar(30) not null,
	rib_p varchar(50) not null,
	mdp_p varchar(255) not null,
primary key (idp)
)engine=innodb;


create table saison
( 
	ids int(5) not null auto_increment,
	saison varchar(20) not null,
	debut_saison date not null,
	fin_saison date not null,
	annee_s varchar(20) not null,
	primary key (ids)
)engine=innodb;

create table habitation
(
	idh int(5) not null auto_increment,
	numero_h varchar(10) not null,
	rue_h varchar(50) not null,
	ville_h varchar(50) not null,
	CP_h varchar(6) not null,
	nom_immeuble_h varchar(30),
	superficie_h decimal(6,2) not null,
	type_h enum('maison','appartement','chalet','villa') not null,
	capacite_acceuil_h int(2) not null,
	surface_habitable_h decimal(6,2) not null,
	surface_balcon_h decimal(6,2),
	distance_piste_h decimal(3,1),
	exposition_h varchar(10) not null,
	cave_h enum('non','oui') not null,
	local_a_ski_h enum('non','oui') not null,
	primary key (idh)
)engine=innodb;

create table contrat_mandat_locatif
( 
	idcml int(5) not null auto_increment,
	descriptif varchar(255),
	date_debut_cml date not null,
	date_fin_cml date not null,
	etat_contrat enum('actif','inactif') not null,
	idp int(5) not null,
	idh int(5) not null,
	primary key (idcml),
	foreign key (idp) references proprietaire(idp),
	foreign key (idh) references habitation(idh)
)engine=innodb;

create table date_exception 
( 
	idde int(5) not null auto_increment,
	date_debute date,
	date_fine date,
	idcml int(5) not null,
	primary key (idde),
	foreign key (idcml) references contrat_mandat_locatif(idcml)
)engine=innodb;

create table images
(
	idim int(5) not null auto_increment,
	path_im varchar(255),
	url_im varchar(255),
	idh int(5),
	primary key(idim),
	foreign key(idh) references habitation(idh)
)engine=innodb;

create table tarification
(
	tarif decimal(10,2) not null,
	idcml int(5) not null,
	ids int(5) not null,
	primary key (ids,idcml),
	foreign key (idcml) references contrat_mandat_locatif(idcml),
	foreign key (ids) references saison(ids)
)engine=innodb;

create table employes
(
	idemp int(3) not null auto_increment,
	nom_emp varchar(30) not null,
	prenom_emp varchar(30) not null,
	tel_emp varchar(15) not null,
	mail_emp varchar(40) not null,
	date_naiss_emp date not null,
	numero_emp varchar(10) not null,
	rue_emp varchar(30) not null,
	CP_emp varchar(10) not null,
	ville_emp varchar(30) not null,
	date_embauche date not null,
	mdp_emp varchar(255) not null,
	date_depart date,
	primary key (idemp)
)engine=innodb;

create table client
(
	idc int(5) not null auto_increment,
	nom_c varchar(30) not null,
	prenom_c varchar(30) not null,
	tel_c varchar(15) not null,
	mail_c varchar(40) not null,
	date_naiss_c date not null,
	numero_c varchar(30) not null,
	rue_c varchar(30) not null,
	cp_c varchar(10) not null,
	ville_c varchar(30) not null,
	mdp_c varchar(255) not null,
	primary key (idc)
)engine=innodb;

create table reservation
(
	idr int(5) not null auto_increment,
	nb_personnes_r int(2) not null,
	date_r date not null,
	date_dr date not null,
	date_fr date not null,
	etat_r enum('en attente','validee','refusee') not null,
	idc int(5) not null,
	idh int(5) not null,
	ids int(5) not null,
	primary key (idr),
	foreign key (idc) references client(idc),
	foreign key (idh) references habitation(idh),
	foreign key (ids) references saison(ids)
)engine=innodb;

create table contrat_location
(
	idcl int(5) not null auto_increment,
	prix_total decimal(10,2) not null,
	idr int(5) not null,
	etat_des_lieux varchar(255),
	primary key (idcl),
	foreign key (idr) references reservation(idr)
)engine=innodb;

create table equipement
(
	ide int(5) not null auto_increment,
	nom_e varchar(30) not null,
	etat_e varchar(100) not null,
	nombre_e int (2) not null,
	idh int(5) not null,
	primary key (ide),
	foreign key (idh) references habitation(idh)
)engine=innodb;

create table engendrer
(
	idr int(5) not null,
	idcl int(5) not null,
	primary key (idr,idcl),
	foreign key (idcl) references contrat_location(idcl),
	foreign key (idr) references reservation(idr)
)engine=innodb;

create table user
(
	id varchar(6) not null,
	email varchar(90) not null,
	mdp varchar(255) not null,
	role enum('admin','user') not null,
	primary key (id)
)engine=innodb;

/*triggers*/

drop trigger if exists client_after_insert;
delimiter // 
create trigger client_after_insert 
after insert on client
for each row
begin

insert into user values (concat(new.idc,'|cli'),concat(new.mail_c,'|cli'),new.mdp_c,'user');

end //
delimiter ;

drop trigger if exists client_after_update;
delimiter // 
create trigger client_after_update
after update on client
for each row
begin
update user set email=concat(new.mail_c,'|cli'),mdp=new.mdp_c
where id=concat(new.idc,'|cli');
end //
delimiter ;

drop trigger if exists client_after_delete;
delimiter // 
create trigger client_after_delete
after delete on client
for each row
begin
delete from user where id=concat(old.idc,'|cli');
end //
delimiter ;


drop trigger if exists employe_after_insert;
delimiter // 
create trigger employe_after_insert 
after insert on employes
for each row
begin

insert into user values (concat(new.idemp,'|emp'),concat(new.mail_emp,'|emp'),new.mdp_emp,'admin');

end //
delimiter ;

drop trigger if exists employe_after_update;
delimiter // 
create trigger employe_after_update
after update on employes
for each row
begin
update user set email=concat(new.mail_emp,'|emp'),mdp=new.mdp_emp
where id=concat(new.idemp,'|emp');
end //
delimiter ;

drop trigger if exists employe_after_delete;
delimiter // 
create trigger employe_after_delete
after delete on employes
for each row
begin
delete from user where id=concat(old.idemp,'|emp');
end //
delimiter ;

drop trigger if exists proprietaire_after_insert;
delimiter // 
create trigger proprietaire_after_insert 
after insert on proprietaire
for each row
begin

insert into user values (concat(new.idp,'|prop'),concat(new.mail_p,'|prop'),new.mdp_p,'user');

end //
delimiter ;

drop trigger if exists proprietaire_after_update;
delimiter // 
create trigger proprietaire_after_update
after update on proprietaire
for each row
begin
update user set email=concat(new.mail_p,'|prop'),mdp=new.mdp_p
where id=concat(new.idp,'|prop');
end //
delimiter ;

drop trigger if exists proprietaire_after_delete;
delimiter // 
create trigger proprietaire_after_delete
after delete on proprietaire
for each row
begin
delete from user where id=concat(old.idp,'|prop');
end //
delimiter ;

drop trigger if exists CML_before_insert;
delimiter // 
create trigger CML_before_insert
before insert on contrat_mandat_locatif
for each row
begin
set new.descriptif=concat('contrat ',
	(select nom_p from proprietaire where idp=new.idp),' ',(select count(idp)+1 from contrat_mandat_locatif where idp=new.idp));
end //
delimiter ;

drop trigger if exists ptot;
delimiter // 
create trigger ptot 
before insert on contrat_location
for each row
begin
set new.prix_total= (select tarif*datediff(date_fr,date_dr) 
from reservation r, saison s, tarification t 
where r.ids = s.ids and s.ids =t.ids and r.idr = new.idr);
end //
delimiter ;


/*insert*/
insert into proprietaire values (null,"martin","jean","0123456789","jm@gmail.com","1975-05-03","35","rue de l'eglise","75015","Paris","France","1234567891122axxezgz","123");
insert into proprietaire values (null,"Bernard","Jacques","0623456789","bj@gmail.com","1970-07-09","45","rue jean moulin","64015","Grenoble","France","1456789891122axxesetsz","456");
insert into proprietaire values (null,"Thomas","Henry","0198653214","th@gmail.com","1985-08-25","21","rue de jeanne d'arc","52014","Tour","France","1234577891122azgsefz","789");
insert into saison values (null,"haute","2021-12-20","2022-01-28","2021-2022");
insert into saison values (null,"moyenne","2021-11-01","2021-12-19","2021-2022");
insert into habitation values (null,"5","montee des asphodeles","Ceillac","05600","la marmotte",35.12,"maison",2,32.12,3.00,2,"sud-est",'oui','non');
insert into habitation values (null,"12","rue des chamois","Ceillac","05600","le chamois",40.25,"appartement",3,35.10,5.15,1,"sud-ouest",'oui','non');
insert into habitation values (null,"1","rue des chamois","Ceillac","05600","le bouquetin",100.35,"maison",5,95.05,5.30,1,"nord-est",'non','non');
insert into habitation values (null,"7","place du village","Ceillac","05600","la rouerie",75.22,"appartement",4,75.22,0.0,2,"nord-ouest",'non','oui');
insert into habitation values (null,"9","rue de l'ecole","Ceillac","05600","le saint-bernard",200.30,"maison",7,190.10,10.20,2,"sud-est",'oui','non');
insert into contrat_mandat_locatif values (null,"contrat martin 1","2021-01-01,","2023-01-01","actif","1","1");
insert into contrat_mandat_locatif values (null,"contrat martin 2","2021-01-01,","2025-01-01","actif","1","1");
insert into contrat_mandat_locatif values (null,"contrat martin 3","2021-01-01,","2023-01-01","actif","1","1");
insert into contrat_mandat_locatif values (null,"contrat martin 4","2021-01-01,","2024-01-01","actif","1","1");
insert into contrat_mandat_locatif values (null,"contrat martin 5","2021-01-01,","2025-01-01","actif","1","1");
insert into date_exception values (null,"2021-10-12","2021-10-28","1");
insert into date_exception values (null,"2021-08-25","2021-12-01","2");
insert into date_exception values (null,"2021-12-24","2022-01-03","3");
insert into date_exception values (null,"2022-02-01","2022-02-16","1");
insert into tarification values (1000.00,"1","1");
insert into tarification values (1750.00,"2","2");	
insert into tarification values (1822.00,"3","1");	
insert into tarification values (952.00,"4","1");	
insert into tarification values (5000.00,"5","1");
insert into employes values (null,"Millon","felix","0198765432","f@gmail.com","1992-09-05","25","rue des poirier","75015","Paris","2005-05-04","123",null);
insert into employes values (null,"Dupont","Maurice","0198765432","DM@gmail.com","1985-05-12","12","rue des rosier","75020","Paris","2005-05-04","123",null);
insert into employes values (null,"Durand","Jean","0198765433","DJ@gmail.com","1990-02-22","14","rue des chenes","65102","Marseille","2008-09-01","456",null);
insert into employes values (null,"Fevrier","Alice","0198765431","FA@gmail.com","1970-08-07","25","rue des platanes","10521","Igny","2005-10-22","789",null);
insert into client values (null,"Mars","Jacqueline","0678451236","j.marsgmail.com","1995-12-04","2","rue de la république","92600","Asnieres","123");
insert into client values (null,"Juin","Patrick","0678451239","p.juin@gmail.com","1999-09-12","5","rue des arbres","80102","Juvisy","456");
insert into client values (null,"Novembre","Marie","0678451233","m.novembre@gmail.com","1970-06-08","12","rue des pagaies","77204","Orléan","789");
insert into reservation values (null,1,"2021-09-22","2021-12-10","2021-12-17",'validee',"1","1","1");
insert into reservation values (null,2,"2021-07-21","2021-08-09","2021-08-16",'validee',"2","4","2");
insert into reservation values (null,5,"2021-06-20","2021-07-02","2021-07-19",'validee',"3","5","1");
insert into contrat_location values (null,7000.00,"1",null);
insert into contrat_location values (null,9000.00,"2",null);
insert into contrat_location values (null,12000.00,"3",null);
insert into equipement values (null,"Four a micro-ondes","bon etat",1,"1");
insert into equipement values (null,"Four a micro-ondes","neuf",1,"2");
insert into equipement values (null,"Four a micro-ondes","correct",1,"5");
insert into engendrer values ("1","1");
insert into engendrer values ("2","2");
insert into engendrer values ("3","3");




/*views*/
create view viewCML as (
select c.idcml, c.descriptif, c.date_debut_cml, c.date_fin_cml, c.etat_contrat,p.idp, p.prenom_p, p.nom_p,h.idh,h.nom_immeuble_h,h.ville_h
from contrat_mandat_locatif c, proprietaire p, habitation h
where c.idp = p.idp and c.idh = h.idh);

create view viewReservations as (
select r.idr, r.date_r, r.date_dr, r.date_fr, r.etat_r, r.idc, c.prenom_c, c.nom_c, r.idh, h.nom_immeuble_h, h.ville_h, s.saison, s.debut_saison, s.fin_saison
from reservation r, client c, habitation h, saison s
where r.idc=c.idc and r.idh = h.idh and r.ids=s.ids);

create view viewExceptions as (
select e.idde, e.date_debute, e.date_fine, c.idcml, c.descriptif, p.idp, p.prenom_p, p.nom_p
from contrat_mandat_locatif c, proprietaire p, date_exception e
where c.idp = p.idp and e.idcml = c.idcml);

create view viewCDL as (
select cl.idcl, cl.prix_total, cl.etat_des_lieux, cl.idr, r.date_dr, r.date_fr, c.idc, c.prenom_c, c.nom_c, h.idh, h.nom_immeuble_h, h.ville_h
from contrat_location cl, reservation r, client c, habitation h
where cl.idr = r.idr and r.idc = c.idc and r.idh = h.idh);

create view viewTarifs as (
select t.tarif, t.idcml, cml.descriptif, cml.date_debut_cml, cml.date_fin_cml, h.idh, h.nom_immeuble_h, h.ville_h, p.idp, p.prenom_p, p.nom_p, s.ids, s.saison, s.debut_saison,s.fin_saison,s.annee_s
from tarification t, contrat_mandat_locatif cml, habitation h, proprietaire p, saison s
where t.ids = s.ids and t.idcml = cml.idcml and cml.idh = h.idh and cml.idp = p.idp);

