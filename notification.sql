alter table missions
    add kilometrage int null;

create table vidanges
(
    id          int auto_increment,
    id_vehicule int                                 not null,
    created_at  timestamp default current_timestamp null,
    updated_at  timestamp                           null,
    description text                                null,
    constraint vidanges_pk
        primary key (id)
);
alter table vehicules
    add date_vidange date null;

alter table vidanges
    add date date null;

alter table vidanges
    add kilometrage_vidange int null;
