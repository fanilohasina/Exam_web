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

-- Insert 25 gifts for 'Garcon'
INSERT INTO `exam1224_cadeau` (`cadeau_name`, `cadeau_description`, `cadeau_image`, `cadeau_prix`, `cadeau_type`)
VALUES 
('Football', 'A high-quality football for sports enthusiasts.', 'images/football.jpg', 19.99, 1),
('Basketball', 'A durable basketball for outdoor use.', 'images/basketball.jpg', 22.50, 1),
('Action Figure', 'A collectible action figure of a popular hero.', 'images/action_figure.jpg', 14.75, 1),
('Toy Car', 'A remote-controlled car for endless fun.', 'images/toy_car.jpg', 29.99, 1),
('Building Blocks', 'A set of creative building blocks.', 'images/building_blocks.jpg', 24.50, 1),
('Drone', 'A small drone with camera for kids.', 'images/drone.jpg', 99.99, 1),
('Soccer Jersey', 'A soccer jersey of a famous team.', 'images/soccer_jersey.jpg', 39.99, 1),
('Skateboard', 'A cool skateboard with a unique design.', 'images/skateboard.jpg', 45.00, 1),
('RC Helicopter', 'Remote-controlled helicopter.', 'images/rc_helicopter.jpg', 89.99, 1),
('Gaming Console', 'A portable gaming console.', 'images/gaming_console.jpg', 199.99, 1),
('Puzzle Game', 'A challenging puzzle game for kids.', 'images/puzzle_game.jpg', 12.50, 1),
('Wristwatch', 'A stylish digital wristwatch.', 'images/wristwatch.jpg', 49.99, 1),
('Baseball Glove', 'A premium baseball glove for kids.', 'images/baseball_glove.jpg', 34.99, 1),
('Bike', 'A mountain bike for adventure.', 'images/bike.jpg', 120.00, 1),
('Binoculars', 'Kid-friendly binoculars.', 'images/binoculars.jpg', 17.75, 1),
('RC Boat', 'Remote-controlled speedboat.', 'images/rc_boat.jpg', 79.99, 1),
('Art Kit', 'A complete art kit with paints and brushes.', 'images/art_kit.jpg', 18.99, 1),
('Science Kit', 'An engaging science experiment kit.', 'images/science_kit.jpg', 27.99, 1),
('Board Game', 'A strategy board game for kids.', 'images/board_game.jpg', 25.50, 1),
('Headphones', 'Wireless headphones for kids.', 'images/headphones.jpg', 39.99, 1),
('Walkie-Talkie', 'A pair of walkie-talkies.', 'images/walkie_talkie.jpg', 30.00, 1),
('Telescope', 'A beginner telescope.', 'images/telescope.jpg', 45.50, 1),
('Mini Robot', 'A programmable mini robot.', 'images/mini_robot.jpg', 55.99, 1),
('Tool Kit', 'A small tool kit for kids.', 'images/tool_kit.jpg', 22.99, 1),
('LED Lamp', 'A fun LED desk lamp.', 'images/led_lamp.jpg', 15.99, 1);

-- Insert 25 gifts for 'Fille'
INSERT INTO `exam1224_cadeau` (`cadeau_name`, `cadeau_description`, `cadeau_image`, `cadeau_prix`, `cadeau_type`)
VALUES 
('Doll', 'A beautiful doll with accessories.', 'images/doll.jpg', 19.99, 2),
('Plush Toy', 'A soft and cuddly plush toy.', 'images/plush_toy.jpg', 14.50, 2),
('Drawing Pad', 'A colorful drawing pad for creativity.', 'images/drawing_pad.jpg', 9.99, 2),
('Jewelry Set', 'A costume jewelry set for kids.', 'images/jewelry_set.jpg', 12.50, 2),
('Tea Set', 'A mini tea set for playtime.', 'images/tea_set.jpg', 24.99, 2),
('Hair Accessories', 'A set of stylish hair accessories.', 'images/hair_accessories.jpg', 7.99, 2),
('Princess Costume', 'A princess dress-up costume.', 'images/princess_costume.jpg', 39.99, 2),
('Craft Kit', 'A creative craft kit for DIY projects.', 'images/craft_kit.jpg', 22.50, 2),
('Mermaid Tail', 'A fun mermaid tail blanket.', 'images/mermaid_tail.jpg', 18.75, 2),
('Scooter', 'A lightweight scooter for kids.', 'images/scooter.jpg', 59.99, 2),
('Makeup Set', 'A kid-friendly makeup set.', 'images/makeup_set.jpg', 15.50, 2),
('Storybook', 'An engaging storybook for kids.', 'images/storybook.jpg', 8.99, 2),
('Bracelet Maker', 'A bracelet-making kit.', 'images/bracelet_maker.jpg', 11.75, 2),
('Backpack', 'A colorful school backpack.', 'images/backpack.jpg', 27.99, 2),
('Headband Set', 'A set of pretty headbands.', 'images/headband_set.jpg', 5.99, 2),
('Bubble Machine', 'A fun bubble machine.', 'images/bubble_machine.jpg', 19.50, 2),
('Sewing Kit', 'A beginner sewing kit.', 'images/sewing_kit.jpg', 21.99, 2),
('Musical Toy', 'A toy keyboard with sounds.', 'images/musical_toy.jpg', 34.99, 2),
('Ballet Shoes', 'Soft ballet shoes for kids.', 'images/ballet_shoes.jpg', 16.99, 2),
('Puzzle Game', 'A colorful puzzle game.', 'images/puzzle_game_f.jpg', 12.99, 2),
('Fairy Lights', 'LED fairy lights for decoration.', 'images/fairy_lights.jpg', 10.99, 2),
('Play Kitchen', 'A mini play kitchen set.', 'images/play_kitchen.jpg', 49.99, 2),
('Unicorn Lamp', 'A cute unicorn-shaped lamp.', 'images/unicorn_lamp.jpg', 22.50, 2),
('Diary', 'A diary with a lock for kids.', 'images/diary.jpg', 9.50, 2),
('Dance Mat', 'An interactive dance mat.', 'images/dance_mat.jpg', 39.99, 2);
