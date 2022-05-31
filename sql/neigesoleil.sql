drop database if exists neigesoleil;
create database neigesoleil;
	use neigesoleil;

create table proprietaire
(
	idp int(5) not null auto_increment,
	nom_p varchar(20) not null,
	prenom_p varchar(20) not null,
	tel_p varchar(15) not null,
	mail_p varchar(40) not null UNIQUE,
	date_naiss_p date not null,
	numero_p varchar(10) not null,
	rue_p varchar(30) not null,
	CP_p varchar(10) not null,
	ville_p varchar(30) not null,
	pays_p varchar(30) not null,
	rib_p varchar(50) not null,
	mdp_p varchar(255) not null,
	question enum('d2c250498d347cddbef5305d79c7624f0d38721dd91d39eee4a322993817d5d3',
		'91fb7ebfd0dd4b72a59f8a27e7a19992501a4c1f90b56d4a82df40c8202764c3',
		'70320976b477e0bd37abf44b56f970c067516c675475fca8f92e5f4fccfd19ec',
		'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100',
		'7986a03bd3dc7bcdfb1ab7fe2fc51df3fc7eb6db3a329297ec09e2d681a99f46') not null,
	reponse varchar(255) not null,
primary key (idp)
)engine=innodb;

create table saison
( 
	saison enum('haute','moyenne','basse') not null,
	debut_saison date not null,
	fin_saison date not null,
	annee_s date not null,
	primary key (saison,annee_s)
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
	idp int(5) not null,
	primary key (idh),
	foreign key(idp) references proprietaire(idp)
	on update cascade
	on delete cascade
)engine=innodb;

create or replace table habitation_dispo_total
(
	idh int(5) not null,
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
	idp int(5) not null,
	prix_total decimal(10,2) not null,
	primary key (idh),
	foreign key(idp) references proprietaire(idp)
	on update cascade
	on delete cascade
)engine=innodb;

create table contrat_mandat_locatif
( 
	idcml int(5) not null auto_increment,
	descriptif varchar(255),
	date_debut_cml date not null,
	date_fin_cml date not null,
	etat_contrat enum('actif','inactif') not null,
	idh int(5) not null,
	primary key (idcml),
	foreign key (idh) references habitation(idh)
	on update cascade
	on delete cascade
)engine=innodb;

create table archive_contrat_mandat_locatif
( 
	idcml int(5) not null auto_increment,
	descriptif varchar(255),
	date_debut_cml date not null,
	date_fin_cml date not null,
	etat_contrat enum('actif','inactif') not null,
	idh int(5) not null,
	date_suppression datetime,
	idp int(5) not null,
	primary key (idcml,date_suppression),
	foreign key (idh) references habitation(idh)
	on update cascade
	on delete cascade
)engine=innodb;

create table date_exception 
( 
	idde int(5) not null auto_increment,
	date_debute date,
	date_fine date,
	idcml int(5) not null,
	primary key (idde),
	foreign key (idcml) references contrat_mandat_locatif(idcml)
	on update cascade
	on delete cascade
)engine=innodb;

create table images
(
	idim int(5) not null auto_increment,
	path_im varchar(255),
	url_im varchar(255),
	idh int(5),
	primary key(idim),
	foreign key(idh) references habitation(idh)
	on update cascade
	on delete cascade
)engine=innodb;

create table tarification
(
	tarif decimal(10,2) not null,
	idcml int(5) not null,
	saison enum('haute','moyenne','basse') not null,
	annee_s date not null,
	primary key (idcml,saison,annee_s),
	foreign key (idcml) references contrat_mandat_locatif(idcml)
	on update cascade
	on delete cascade,
	foreign key (saison,annee_s) references saison(saison,annee_s)
	on update cascade
	on delete cascade
)engine=innodb;

create table employes
(
	idemp int(3) not null auto_increment,
	nom_emp varchar(30) not null,
	prenom_emp varchar(30) not null,
	tel_emp varchar(15) not null,
	mail_emp varchar(40) not null UNIQUE,
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
	mail_c varchar(40) not null UNIQUE,
	date_naiss_c date not null,
	numero_c varchar(30) not null,
	rue_c varchar(30) not null,
	cp_c varchar(10) not null,
	ville_c varchar(30) not null,
	mdp_c varchar(255) not null,
	question enum('d2c250498d347cddbef5305d79c7624f0d38721dd91d39eee4a322993817d5d3',
		'91fb7ebfd0dd4b72a59f8a27e7a19992501a4c1f90b56d4a82df40c8202764c3',
		'70320976b477e0bd37abf44b56f970c067516c675475fca8f92e5f4fccfd19ec',
		'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100',
		'7986a03bd3dc7bcdfb1ab7fe2fc51df3fc7eb6db3a329297ec09e2d681a99f46') not null,
	reponse varchar(255) not null,
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
	saison enum('haute','moyenne','basse') not null,
	annee_s date not null,
	primary key (idr),
	foreign key (idc) references client(idc)
	on update cascade
	on delete cascade,
	foreign key (idh) references habitation(idh)
	on update cascade
	on delete cascade,
	foreign key (saison,annee_s) references saison(saison,annee_s)
	on update cascade
	on delete cascade
)engine=innodb;

create table contrat_location
(
	idcl int(5) not null auto_increment,
	prix_total decimal(10,2) not null,
	idr int(5) not null,
	etat_des_lieux varchar(255),
	primary key (idcl),
	foreign key (idr) references reservation(idr)
	on update cascade
	on delete cascade
)engine=innodb;

create table archive_contrat_location
(
	idcl int(5) not null auto_increment,
	prix_total decimal(10,2) not null,
	idr int(5) not null,
	etat_des_lieux varchar(255),
	date_suppression datetime,
	idclient int(3),
	idhabitation int(3),
	primary key (idcl,date_suppression),
	foreign key (idr) references reservation(idr)
	on update cascade
	on delete cascade
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
	on update cascade
	on delete cascade
)engine=innodb;

create table engendrer
(
	idr int(5) not null,
	idcl int(5) not null,
	primary key (idr,idcl),
	foreign key (idcl) references contrat_location(idcl)
	on update cascade
	on delete cascade,
	foreign key (idr) references reservation(idr)
	on update cascade
	on delete cascade
)engine=innodb;

create table user
(
	id varchar(6) not null,
	email varchar(90) not null,
	mdp varchar(255) not null,
	role boolean,
	primary key (id)
)engine=innodb;

create table indispo
(
	debut_indispo date not null,
	fin_indispo date not null,
	idh int(5) not null,
	primary key (debut_indispo,fin_indispo,idh),
	foreign key (idh) references habitation(idh)
	on update cascade
	on delete cascade
)engine=innodb;




/*triggers*/



drop trigger if exists client_after_insert;
delimiter // 
create trigger client_after_insert 
after insert on client
for each row
begin

insert into user values (concat(new.idc,'|cli'),concat(new.mail_c,'|cli'),new.mdp_c,0);

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

insert into user values (concat(new.idemp,'|emp'),concat(new.mail_emp,'|emp'),new.mdp_emp,0);

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

insert into user values (concat(new.idp,'|prop'),concat(new.mail_p,'|prop'),new.mdp_p,0);

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
	(select nom_p from proprietaire p, 
	habitation h where p.idp=h.idp and h.idh=new.idh),
	' ',
	(select nom_immeuble_h from habitation where idh=new.idh),
	' ',
	(select count(idh)+1 from contrat_mandat_locatif where idh=new.idh));
end //
delimiter ;

drop trigger if exists saison_before_insert;
delimiter //
create trigger saison_before_insert
before insert on saison
for each row
begin
	set new.annee_s=concat(year(new.debut_saison),'-01-01');
	if new.saison='basse'
	then 
		set new.debut_saison=concat(year(new.debut_saison),'-01-01');
		set new.fin_saison=concat(year(new.fin_saison),'-12-31');
	end if;
end //
delimiter ;

drop trigger if exists saison_before_update;
delimiter //
create trigger saison_before_update
before insert on saison
for each row
begin
	set new.annee_s=concat(year(new.debut_saison),'-01-01');
	if new.saison='basse'
	then 
		set new.debut_saison=concat(year(new.debut_saison),'-01-01');
		set new.fin_saison=concat(year(new.fin_saison),'-12-31');
	end if;
end //
delimiter ;

drop trigger if exists reservation_before_insert;
delimiter //
create trigger reservation_before_insert
before insert on reservation
for each row
begin
	set new.annee_s=concat(year(new.date_dr),'-01-01');
	if 'haute' in (select saison from saison where new.date_dr between debut_saison and fin_saison)
		then set new.saison='haute';
	elseif 'moyenne' in (select saison from saison where new.date_dr between debut_saison and fin_saison)
		then set new.saison='moyenne';
	end if;
end //
delimiter ;

drop trigger if exists reservation_before_update;
delimiter //
create trigger reservation_before_update
before insert on reservation
for each row
begin
	set new.annee_s=concat(year(new.date_dr),'-01-01');
	if 'haute' in (select saison from saison where new.date_dr between debut_saison and fin_saison)
		then set new.saison='haute';
	elseif 'moyenne' in (select saison from saison where new.date_dr between debut_saison and fin_saison)
		then set new.saison='moyenne';
	end if;
end //
delimiter ;

drop trigger if exists reservation_after_update;
delimiter //
create trigger reservation_after_update
after update on reservation
for each row
begin
	delete from indispo where idh=old.idh and debut_indispo=old.date_dr and fin_indispo=old.date_fr;
	insert into indispo values(new.date_dr,new.date_fr,new.idh);
	if new.etat_r='validee' and new.idr not in(select idr from contrat_location)
	then insert into contrat_location values(null,10.0,new.idr,"");
	end if;
end //
delimiter ;

drop trigger if exists contrat_location_before_insert;
delimiter //
create trigger contrat_location_before_insert
before insert on contrat_location
for each row
begin
	set new.prix_total=(select t.tarif*datediff(r.date_fr,r.date_dr)
	from reservation r, tarification t, habitation h, contrat_mandat_locatif cml
	where t.saison=r.saison
	and t.annee_s=r.annee_s
	and r.idr = new.idr
	and r.idh=h.idh
	and h.idh=cml.idh
	and t.idcml=cml.idcml
	and r.date_dr between cml.date_debut_cml and cml.date_fin_cml
	and r.date_fr between cml.date_debut_cml and cml.date_fin_cml);
end //
delimiter ;

drop trigger if exists archive_CDL_before_delete;
delimiter //
create trigger archive_CDL_before_delete
before delete on contrat_location
for each row
begin
insert into archive_contrat_location values(old.idcl,old.prix_total,old.idr,old.etat_des_lieux,sysdate(),(select idc from reservation r where old.idr=r.idr),(select idh from reservation r where old.idr=r.idr));
end //
delimiter ;

drop trigger if exists archive_CML_before_delete;
delimiter //
create trigger archive_CML_before_delete
before delete on contrat_mandat_locatif
for each row
begin
insert into archive_contrat_mandat_locatif values(
	old.idcml,
	old.descriptif,
	old.date_debut_cml,
	old.date_fin_cml,
	'inactif',
	old.idh,
	sysdate(),
	(select idp from habitation where idh=old.idh)
	);
end //
delimiter ;

drop trigger if exists date_exception_after_insert;
delimiter //
create trigger date_exception_after_insert
after insert on date_exception
for each row
begin
insert into indispo values (new.date_debute,new.date_fine,(select idh from contrat_mandat_locatif where idcml=new.idcml));
end //
delimiter ;

drop trigger if exists date_exception_after_update;
delimiter //
create trigger date_exception_after_update
after update on date_exception
for each row
begin
update indispo set debut_indispo=new.date_debute, fin_indispo=new.date_fine
where idh=(select idh from contrat_mandat_locatif where idcml=old.idcml) and debut_indispo=old.date_debute and fin_indispo=old.date_fine;
end //
delimiter ;

drop trigger if exists date_exception_after_delete;
delimiter //
create trigger date_exception_after_delete
after delete on date_exception
for each row
begin
delete from indispo
where idh=(select idh from contrat_mandat_locatif where idcml=old.idcml) and debut_indispo=old.date_debute and fin_indispo=old.date_fine;
end //
delimiter ;

/*insert*/
insert into proprietaire values (null,"martin","jean","0123456789","jm@gmail.com","1975-05-03","35","rue de l'eglise","75015","Paris","France","1234567891122axxezgz","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100','b4057e6d1f69fa65d0f6c88dc738d7a7872e3b2742b6fb7c6e582b1b51a3a471');
insert into proprietaire values (null,"Bernard","Jacques","0623456789","bj@gmail.com","1970-07-09","45","rue jean moulin","64015","Grenoble","France","1456789891122axxesetsz","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100','b4057e6d1f69fa65d0f6c88dc738d7a7872e3b2742b6fb7c6e582b1b51a3a471');
insert into proprietaire values (null,"Thomas","Henry","0198653214","th@gmail.com","1985-08-25","21","rue de jeanne darc","52014","Tour","France","1234577891122azgsefz","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100','88464f3fe88e62ddd273f5d5a67a71d413d22ac9c24254d0f75667d3c1da8bc6');
insert into saison values ("haute","2021-12-20","2022-01-28",null);
insert into saison values ("moyenne","2021-11-01","2021-12-19",null);
insert into saison values ("basse","2021-11-01","2021-12-19",null);
insert into habitation values (null,"5","montee des asphodeles","Ceillac","05600","la marmotte",35.12,"maison",2,32.12,3.00,2,"sud-est",'oui','non',1);
insert into habitation values (null,"12","rue des chamois","Ceillac","05600","le chamois",40.25,"appartement",3,35.10,5.15,1,"sud-ouest",'oui','non',2);
insert into habitation values (null,"1","rue des chamois","Ceillac","05600","le bouquetin",100.35,"maison",5,95.05,5.30,1,"nord-est",'non','non',3);
insert into habitation values (null,"7","place du village","Ceillac","05600","la rouerie",75.22,"appartement",4,75.22,0.0,2,"nord-ouest",'non','oui',1);
insert into habitation values (null,"9","rue de l'ecole","Ceillac","05600","le saint-bernard",200.30,"maison",7,190.10,10.20,2,"sud-est",'oui','non',2);
insert into contrat_mandat_locatif values (null,"","2021-01-01,","2023-01-01","actif","1");
insert into contrat_mandat_locatif values (null,"","2021-01-01,","2025-01-01","actif","2");
insert into contrat_mandat_locatif values (null,"","2021-01-01,","2023-01-01","actif","3");
insert into contrat_mandat_locatif values (null,"","2021-01-01,","2024-01-01","actif","4");
insert into contrat_mandat_locatif values (null,"","2021-01-01,","2025-01-01","actif","5");
insert into date_exception values (null,"2021-10-12","2021-10-28","1");
insert into date_exception values (null,"2021-08-25","2021-12-01","2");
insert into date_exception values (null,"2021-12-24","2022-01-03","3");
insert into date_exception values (null,"2022-02-01","2022-02-16","1");
insert into tarification values (200.00,"1","haute","2021-01-01");
insert into tarification values (150.00,"1","moyenne","2021-01-01");
insert into tarification values (100.00,"1","basse","2021-01-01");
insert into tarification values (400.00,"2","haute","2021-01-01");
insert into tarification values (200.00,"2","moyenne","2021-01-01");
insert into tarification values (150.00,"2","basse","2021-01-01");
insert into tarification values (450.00,"3","haute","2021-01-01");
insert into tarification values (400.00,"3","moyenne","2021-01-01");	
insert into tarification values (250.00,"3","basse","2021-01-01");	
insert into tarification values (150.00,"4","haute","2021-01-01");
insert into tarification values (100.00,"4","moyenne","2021-01-01");
insert into tarification values (80.00,"4","basse","2021-01-01");
insert into tarification values (800.00,"5","haute","2021-01-01");
insert into tarification values (500.00,"5","moyenne","2021-01-01");
insert into tarification values (350.00,"5","basse","2021-01-01");
insert into employes values (null,"Millon","felix","0198765432","f@gmail.com","1992-09-05","25","rue des poirier","75015","Paris","2005-05-04","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",null);
insert into employes values (null,"Dupont","Maurice","0198765432","DM@gmail.com","1985-05-12","12","rue des rosier","75020","Paris","2005-05-04","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",null);
insert into employes values (null,"Durand","Jean","0198765433","DJ@gmail.com","1990-02-22","14","rue des chenes","65102","Marseille","2008-09-01","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",null);
insert into employes values (null,"Fevrier","Alice","0198765431","FA@gmail.com","1970-08-07","25","rue des platanes","10521","Igny","2005-10-22","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",null);
insert into client values (null,"Mars","Jacqueline","0678451236","j.mars@gmail.com","1995-12-04","2","rue de la république","92600","Asnieres","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100','b4057e6d1f69fa65d0f6c88dc738d7a7872e3b2742b6fb7c6e582b1b51a3a471');
insert into client values (null,"Juin","Patrick","0678451239","p.juin@gmail.com","1999-09-12","5","rue des arbres","80102","Juvisy","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100','90a6be9243bae58034825e81b937519181a0e98441739f05674a9dcd246f87fb');
insert into client values (null,"Novembre","Marie","0678451233","m.novembre@gmail.com","1970-06-08","12","rue des pagaies","77204","Orléan","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3",'560d70119014c382cef46594d3cbc205159103d04a68825da90d7b50e7804100','88464f3fe88e62ddd273f5d5a67a71d413d22ac9c24254d0f75667d3c1da8bc6');
insert into reservation values (null,1,"2021-09-22","2021-12-10","2021-12-17",'en attente',"1","1","basse","2022-12-12");
insert into reservation values (null,2,"2021-07-21","2021-08-09","2021-08-16",'en attente',"1","1","basse","2022-12-12");
insert into reservation values (null,5,"2021-06-20","2021-07-02","2021-07-19",'en attente',"3","3","basse","2022-12-12");
insert into reservation values (null,3,'2021-10-12','2021-12-25','2021-12-31','en attente',2,5,'basse','0000-00-00');
insert into contrat_location values (null,7000.00,"1","");
insert into contrat_location values (null,9000.00,"2","");
insert into contrat_location values (null,12000.00,"3","");
insert into equipement values (null,"Four a micro-ondes","bon etat",1,"1");
insert into equipement values (null,"Four a micro-ondes","neuf",1,"2");
insert into equipement values (null,"Four a micro-ondes","correct",1,"5");
insert into images values(null,"maison.png",null,1);
insert into images values(null,"paysage1.png",null,1);
insert into images values(null,"paysage1.png",null,1);
insert into images values(null,"maison2.png",null,2);
insert into images values(null,"queyras_ete.jpg",null,2);
insert into images values(null,"queyras_soleil.jpg",null,2);
insert into images values(null,"maison3.png",null,3);
insert into images values(null,"maison4.png",null,4);
insert into images values(null,"maison.png",null,5);
insert into images values(null,"paysage1.png",null,5);
insert into images values(null,"paysage1.png",null,5);

/*EVENTS*/

SET GLOBAL event_scheduler = ON;

drop event if exists archivCML;
create event archivCML
on SCHEDULE every 24 hour
starts CURRENT_TIMESTAMP + interval 24 hour
do delete from contrat_mandat_locatif where etat_contrat = 'inactif';

drop event if exists archivContrat;
create event archivContrat
on SCHEDULE every 24 hour
starts CURRENT_TIMESTAMP + interval 24 hour
do delete from contrat_location where length(etat_des_lieux)!=0  and etat_des_lieux != null;


/*PROCEDURES STOCKEES*/

drop procedure if exists archivCML;
DELIMITER //
CREATE PROCEDURE archivCML()
BEGIN
delete from contrat_mandat_locatif where etat_contrat = 'inactif';
END //
DELIMITER ;

drop procedure if exists archivCDL;
DELIMITER //
CREATE PROCEDURE archivCDL()
BEGIN
delete from contrat_location where length(etat_des_lieux)!=0 and etat_des_lieux != null;
END //
DELIMITER ;

drop procedure if exists selectdispo;
DELIMITER //
CREATE PROCEDURE selectdispo
(IN debut date, IN fin date, IN nb_personne int)
BEGIN
delete from habitation_dispo_total;
if 'haute' in (select saison from saison where debut between debut_saison and fin_saison)
then
	insert into habitation_dispo_total
	select h.*,datediff(fin,debut)*t.tarif from habitation h, tarification t, contrat_mandat_locatif c
	where h.idh not in (select idh from indispo 
		where (fin between debut_indispo and fin_indispo) 
		or (debut between debut_indispo and fin_indispo) 
		or (debut<= debut_indispo and fin>=fin_indispo))
		and h.capacite_acceuil_h>=nb_personne
		and h.idh=c.idh
		and c.idcml = t.idcml
		and annee_s= concat(year(debut),'-01-01')
		and saison= 'haute';
elseif 'moyenne' in (select saison from saison where debut between debut_saison and fin_saison)
then
	insert into habitation_dispo_total
	select h.*,datediff(fin,debut)*t.tarif from habitation h, tarification t, contrat_mandat_locatif c
	where h.idh not in (select idh from indispo 
		where (fin between debut_indispo and fin_indispo) 
		or (debut between debut_indispo and fin_indispo) 
		or (debut<= debut_indispo and fin>=fin_indispo))
		and h.capacite_acceuil_h>=nb_personne
		and h.idh=c.idh
		and c.idcml = t.idcml
		and annee_s= concat(year(debut),'-01-01')
		and saison= 'moyenne';
else
	insert into habitation_dispo_total
	select h.*,datediff(fin,debut)*t.tarif from habitation h, tarification t, contrat_mandat_locatif c
	where h.idh not in (select idh from indispo 
		where (fin between debut_indispo and fin_indispo) 
		or (debut between debut_indispo and fin_indispo) 
		or (debut<= debut_indispo and fin>=fin_indispo))
		and h.capacite_acceuil_h>=nb_personne
		and h.idh=c.idh
		and c.idcml = t.idcml
		and annee_s= concat(year(debut),'-01-01')
		and saison= 'basse';
end if;
END //
DELIMITER ;

drop procedure if exists cleandispo;
DELIMITER //
CREATE PROCEDURE cleandispo()
BEGIN
delete from habitation_dispo_total;
END //
DELIMITER ;

drop procedure if exists addadmin;
DELIMITER //
CREATE PROCEDURE addadmin(in idadd int)
BEGIN
update user set role =1 where id = concat(idadd,'|emp');
END //
DELIMITER ;

call addadmin(1);
/*
DELIMITER //
CREATE PROCEDURE deletehabita
(IN id int, IN ville varchar(50))
BEGIN
delete from habitation where idh=id and ville_h=ville;

END //
DELIMITER ;
*/
/*views*/

create view viewCML as (
select c.idcml, c.descriptif, c.date_debut_cml, c.date_fin_cml, c.etat_contrat,p.idp, p.prenom_p, p.nom_p,h.idh,h.nom_immeuble_h,h.ville_h
from contrat_mandat_locatif c, proprietaire p, habitation h
where h.idp = p.idp and c.idh = h.idh);

create view viewReservations as (
select r.idr,r.nb_personnes_r, r.date_r, r.date_dr, r.date_fr, r.etat_r, r.idc, c.prenom_c, c.nom_c, r.idh, h.nom_immeuble_h, h.ville_h, s.saison, s.debut_saison, s.fin_saison
from reservation r, client c, habitation h, saison s
where r.idc=c.idc and r.idh = h.idh and r.saison=s.saison and r.annee_s=s.annee_s);

create view viewExceptions as (
select e.idde, e.date_debute, e.date_fine, c.idcml, c.descriptif, p.idp, p.prenom_p, p.nom_p
from contrat_mandat_locatif c, proprietaire p, date_exception e, habitation h
where c.idh = h.idh and h.idp = p.idp and e.idcml = c.idcml);

create view viewCDL as (
select cl.idcl, cl.prix_total, cl.etat_des_lieux, cl.idr, r.date_dr, r.date_fr, c.idc, c.prenom_c, c.nom_c, h.idh, h.nom_immeuble_h, h.ville_h
from contrat_location cl, reservation r, client c, habitation h
where cl.idr = r.idr and r.idc = c.idc and r.idh = h.idh);

create view viewTarifs as (
select t.tarif, t.idcml, 
cml.descriptif, cml.date_debut_cml, cml.date_fin_cml, 
h.idh, h.nom_immeuble_h, h.ville_h, 
p.idp, p.prenom_p, p.nom_p, 
s.saison, s.debut_saison,s.fin_saison,s.annee_s
from tarification t, 
contrat_mandat_locatif cml, 
habitation h, 
proprietaire p, 
saison s
where t.saison = s.saison 
and t.annee_s = s.annee_s 
and t.idcml = cml.idcml 
and cml.idh = h.idh 
and h.idp = p.idp);
