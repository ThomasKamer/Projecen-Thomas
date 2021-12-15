Create Database if not exists bestevaer;

USE bestevaer;

DROP TABLE IF EXISTS schepen;

Create TABLE schepen (
    id INT AUTO_INCREMENT,
    naam VARCHAR(30),
    maxgewicht INT(11),
    volume INT(11),
    PRIMARY KEY (id)
);

INSERT INTO schepen
    (naam, maxgewicht, volume)
VALUES
    ('HERMES', 3806, 68428),
    ('Lucky Star', 4178, 7731),
    ('NS ANGELA', 3806, 6842),
    ('SABRINA', 6278, 12416),
    ('TRIUMPH IV', 4039, 8189);

SELECT * FROM schepen;

