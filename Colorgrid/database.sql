CREATE DATABASE IF NOT EXISTS colors;

USE colors;

DROP TABLE IF EXISTS colors;

CREATE TABLE colors(
    hex VARCHAR(20)
);

INSERT INTO colors (hex)
VALUES
    ('#641E16'),
    ('#78281F'),
    ('#512E5F'),
    ('#4A235A'),
    ('#154360'),
    ('#1B4F72'),
    ('#0E6251'),
    ('#0B5345'),
    ('#145A32'),
    ('#186A3B'),
    ('#7D6608'),
    ('#7E5109'),
    ('#784212'),
    ('#6E2C00'),
    ('#7B7D7D'),
    ('#626567'),
    ('#4D5656'),
    ('#424949'),
    ('#1B2631'),
    ('#17202A');

SELECT * FROM colors;

