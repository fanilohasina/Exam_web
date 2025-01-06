USE exam1224;

CREATE TABLE `exam1224_transaction` (
    `transaction_id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `transaction_user` int(11) DEFAULT NULL,
    `transaction_montant` double NOT NULL,
    `transaction_verif` int(11) DEFAULT 0
);

CREATE TABLE `exam1224_user` (
    `user_id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `user_name` varchar(50) NOT NULL,
    `user_password` varchar(60) NOT NULL
);

CREATE TABLE `exam1224_type` (
    `type_id` INT PRIMARY KEY AUTO_INCREMENT,
    `type_nom` VARCHAR(50) NOT NULL
);

INSERT INTO exam1224_type VALUES (DEFAULT, 'Garcon');
INSERT INTO exam1224_type VALUES (DEFAULT, 'Fille');

CREATE TABLE `exam1224_cadeau` (
    `cadeau_id` INT PRIMARY KEY AUTO_INCREMENT,
    `cadeau_name` VARCHAR(70) NOT NULL,
    `cadeau_description` TEXT DEFAULT NULL,
    `cadeau_image` VARCHAR(130) NOT NULL,
    `cadeau_prix` DOUBLE NOT NULL,
    `cadeau_type` INT NOT NULL REFERENCES `exam1224_type` (`type_id`)
);