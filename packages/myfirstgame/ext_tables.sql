CREATE TABLE fe_users (
	nickname varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_myfirstgame_domain_model_highscore (
	points varchar(255) NOT NULL DEFAULT '',
	player int(11) unsigned DEFAULT '0'
);
