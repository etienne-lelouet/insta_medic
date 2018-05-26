drop database if exists paris;
create database paris;
use paris;

create table candidat (
	idcandidat int(3) not null auto_increment,
    email varchar(30),
    mdp varchar(30),
    nom varchar(30),
    prenom varchar(30),
    primary key (idcandidat)
);

create table evenement (
	idevenement int(3) not null auto_increment,
    description varchar(100),
    dateevent date,
    heureevent time,
    primary key (idevenement)
);

create table inscrire (
	idinscrire int(3) not null auto_increment,
    confirmation enum ('oui', 'non'),
    dateconfirmation date,
    idcandidat int(3) not null,
    idevenement int(3) not null,
    primary key (idinscrire),
    foreign key (idcandidat) references candidat(idcandidat),
    foreign key (idevenement) references evenement(idevenement)
);

insert into candidat values (null, 'a@gmail.com', '123', 'Alicia', 'Minet');
insert into evenement values (null, 'Séance ouverture', '2024-03-13', '10:30'), 
							 (null, 'Remise médailles', '2024-04-10', '18:30'),
							 (null, 'Cérémonie Cloture', '2024-05-07', '17:30');
insert into inscrire values (null, 'oui', now(), 1, 1),
							(null, 'non', now(), 1, 1);

create view lesinscriptions as (
    SELECT c.nom as nomcandidat, c.prenom as prenomcandidat, c.email as emailcandidat,
    e.description, e.dateevent, e.heureevent, i.confirmation, i.idinscrire, i.dateconfirmation
    from candidat c, evenement e, inscrire i
    WHERE c.idcandidat = i.idcandidat
    and e.idevenement = i.idevenement
    order by e.dateevent, e.heureevent
);