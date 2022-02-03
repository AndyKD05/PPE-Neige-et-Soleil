drop database if exists neigesoleil;
create database neigesoleil;
	use neigesoleil;

create table proprietaire
(
	idp varchar(5) not null,
	nom_p varchar(20) not null,
	prenom_p varchar(20) not null,
	tel_p varchar(20) not null,
	mail_p varchar(40) not null,
	date_naiss_p date not null,
	numero_p varchar(10) not null,
	rue_p varchar(30) not null,
	CP_p varchar(10) not null,
	ville_p varchar(30) not null,
	pays_p varchar(30) not null,
	rib_p varchar(50) not null,
primary key (idp)
)engine=innodb;

create table date_exception 
( 
	idde varchar(5) not null,
	date_debute date,
	date_fine date,
	idp varchar(5) not null,
	primary key (idde),
	foreign key (idp) references proprietaire(idp)
)engine=innodb;

create table saison
( 
	ids varchar(5) not null,
	saison varchar(10) not null,
	debut_saison date not null,
	fin_saison date not null,
	annee_s varchar(20) not null,
	primary key (ids)
)engine=innodb;

create table habitation
(
	idh varchar(5) not null,
	numero_h varchar(10) not null,
	rue_h varchar(50) not null,
	ville_h varchar(50) not null,
	CP_h varchar(6) not null,
	nom_immeuble_h varchar(30),
	superficie_h decimal(6,2) not null,
	type_h varchar(30) not null,
	capacite_acceuil_h int(2) not null,
	surface_habitable_h decimal(6,2) not null,
	surface_balcon_h decimal(6,2),
	distance_piste_h decimal(3,1),
	exposition_h varchar(10) not null,
	cave_h boolean not null,
	local_a_ski_h boolean,
	primary key (idh)
)engine=innodb;

create table contrat_mandat_locatif
( 
	idcml varchar(5) not null,
	date_debut_cml date not null,
	date_fin_cml date not null,
	etat_contrat varchar(5) not null,
	idp varchar(5) not null,
	idde varchar(5) not null,
	idh varchar(5) not null,
	primary key (idcml),
	foreign key (idp) references proprietaire(idp),
	foreign key (idde) references date_exception(idde),
	foreign key (idh) references habitation(idh)
)engine=innodb;

create table tarification
(
	tarif decimal(10,2) not null,
	idcml varchar(5) not null,
	ids varchar(5) not null,
	primary key (ids,idcml),
	foreign key (idcml) references contrat_mandat_locatif(idcml),
	foreign key (ids) references saison(ids)
)engine=innodb;

create table identifiants
(
	id varchar(6) not null,
	mdp varchar(30) not null,
	log varchar (30) not null,
	droit int (1) not null,
	primary key (id)
)engine=innodb;

create table employes
(
	idemp varchar(3) not null,
	nom_emp varchar(30) not null,
	prenom_emp varchar(30) not null,
	date_naiss_emp date not null,
	tel_emp varchar(10) not null,
	numero_emp varchar(10) not null,
	rue_emp varchar(30) not null,
	ville_emp varchar(30) not null,
	CP_emp varchar(10) not null,
	date_embauche date not null,
	date_depart date,
	primary key (idemp)
)engine=innodb;

create table client
(
	idc varchar (5) not null,
	nom_c varchar(30) not null,
	prenom_c varchar(30) not null,
	date_naiss_c date not null,
	tel_c varchar(10) not null,
	rue_c varchar(30) not null,
	ville_c varchar(30) not null,
	cp_c varchar(10) not null,
	mail_c varchar(40) not null,
	primary key (idc)
)engine=innodb;

create table reservation
(
	idr varchar(5) not null,
	nb_personnes_r int(2) not null,
	date_r date not null,
	date_dr date not null,
	date_fr date not null,
	etat_r bool not null,
	idc varchar (5) not null,
	idh varchar(5) not null,
	primary key (idr),
	foreign key (idc) references client(idc),
	foreign key (idh) references habitation(idh)
)engine=innodb;

create table contrat_location
(
	idcl varchar(5) not null,
	prix_total decimal(10,2) not null,
	idr varchar(5) not null,
	primary key (idcl),
	foreign key (idr) references reservation(idr)
)engine=innodb;

create table equipement
(
	ide varchar(5) not null,
	nom_e varchar(30) not null,
	etat_e varchar(100) not null,
	nombre_e int (2) not null,
	idh varchar(5) not null,
	primary key (ide),
	foreign key (idh) references habitation(idh)
)engine=innodb;

create table effectuer
(
	ids varchar(5) not null,
	idr varchar(5) not null,
	primary key (ids,idr),
	foreign key (ids) references saison(ids),
	foreign key (idr) references reservation(idr)
)engine=innodb;

create table engendrer
(
	idr varchar(5) not null,
	idcl varchar(5) not null,
	primary key (idr,idcl),
	foreign key (idcl) references contrat_location(idcl),
	foreign key (idr) references reservation(idr)
)engine=innodb;

insert into proprietaire values ("1","martin","jean","0123456789","jm@gmail.com","1975-05-03","35","rue de l'eglise","75015","Paris","France","1234567891122axxezgz");
insert into proprietaire values ("2","Bernard","Jacques","0623456789","bj@gmail.com","1970-07-09","45","rue jean moulin","64015","Grenoble","France","1456789891122axxesetsz");
insert into proprietaire values ("3","Thomas","Henry","0198653214","th@gmail.com","1985-08-25","21","rue de jeanne d'arc","52014","Tour","France","1234577891122azgsefz");
insert into date_exception values ("1","2021-10-12","2021-10-28","1");
insert into date_exception values ("2","2021-08-25","2021-12-01","2");
insert into date_exception values ("3","2021-12-24","2022-01-03","3");
insert into date_exception values ("5","2022-02-01","2022-02-16","1");
insert into saison values ("1","haute","2021-12-20","2022-01-28","2021-2022");
insert into saison values ("2","moyenne","2021-11-01","2021-12-19","2021-2022");
insert into habitation values ("1","5","montee des asphodeles","Ceillac","05600","la marmotte",35.12,"maison",2,32.12,3.00,2,"sud-est",0,0);
insert into habitation values ("2","12","rue des chamois","Ceillac","05600","le chamois",40.25,"appartement",3,35.10,5.15,1,"sud-ouest",0,0);
insert into habitation values ("3","1","rue des chamois","Ceillac","05600","le bouquetin",100.35,"maison",5,95.05,5.30,1,"nord-est",0,0);
insert into habitation values ("4","7","place du village","Ceillac","05600","la rouerie",75.22,"appartement",4,75.22,0.0,2,"nord-ouest",0,0);
insert into habitation values ("5","9","rue de l'ecole","Ceillac","05600","le saint-bernard",200.30,"maison",7,190.10,10.20,2,"sud-est",0,0);
insert into contrat_mandat_locatif values ("1","2021-01-01,","2023-01-01","actif","1","1","1");
insert into contrat_mandat_locatif values ("2","2021-01-01,","2025-01-01","actif","1","1","1");
insert into contrat_mandat_locatif values ("3","2021-01-01,","2023-01-01","actif","1","1","1");
insert into contrat_mandat_locatif values ("4","2021-01-01,","2024-01-01","actif","1","1","1");
insert into contrat_mandat_locatif values ("5","2021-01-01,","2025-01-01","actif","1","1","1");
insert into tarification values (1000.00,"1","1");
insert into tarification values (1750.00,"2","2");	
insert into tarification values (1822.00,"3","1");	
insert into tarification values (952.00,"4","1");	
insert into tarification values (5000.00,"5","1");	
insert into identifiants values ("1","root","root","1");
insert into identifiants values ("2","root","root","1");
insert into identifiants values ("3","root","root","1");
insert into identifiants values ("4","root","root","0");
insert into identifiants values ("5","root","root","0");
insert into identifiants values ("6","root","root","0");
insert into identifiants values ("7","root","root","0");
insert into identifiants values ("8","root","root","0");
insert into employes values ("1","Dupont","Maurice","1985-05-12","0198765432","12","rue des rosier","Paris","75020","2005-05-04",null);
insert into employes values ("2","Durand","Jean","1990-02-22","0198765433","14","rue des chenes","Marseille","65102","2008-09-01",null);
insert into employes values ("3","Fevrier","Alice","1970-08-07","0198765431","25","rue des platanes","Igny","10521","2005-10-22",null);
insert into client values ("1","Mars","Jacqueline","1995-12-04","0678451236","rue de la république","Asnieres","92600","j.marsgmail.com");
insert into client values ("2","Juin","Patrick","1999-09-12","0678451239","rue des arbres","Juvisy","80102","p.juin@gmail.com");
insert into client values ("3","Novembre","Marie","1970-06-08","0678451233","rue des pagaies","Orléan","77204","m.novembre@gmail.com");
insert into reservation values ("1",1,"2021-09-22","2021-12-10","2021-12-17",1,"1","1");
insert into reservation values ("2",2,"2021-07-21","2021-08-09","2021-08-16",1,"2","4");
insert into reservation values ("3",5,"2021-06-20","2021-07-02","2021-07-19",1,"3","5");
insert into contrat_location values ("1",7000.00,"1");
insert into contrat_location values ("2",9000.00,"2");
insert into contrat_location values ("3",12000.00,"3");
insert into equipement values ("1","Four a micro-ondes","bon etat",1,"1");
insert into equipement values ("2","Four a micro-ondes","neuf",1,"2");
insert into equipement values ("3","Four a micro-ondes","correct",1,"5");
insert into effectuer values ("1","1");
insert into effectuer values ("1","2");
insert into effectuer values ("1","3");
insert into engendrer values ("1","1");
insert into engendrer values ("2","2");
insert into engendrer values ("3","3");

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