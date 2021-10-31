# создание таблиц

CREATE TABLE language
(
	ID int not null auto_increment,
	NAME varchar(2) not null,

	PRIMARY KEY (ID)
);

CREATE TABLE movie_title
(
	MOVIE_ID int not null,
	LANGUAGE_ID int not null default 1,
	TITLE varchar(128) default '',

	PRIMARY KEY (MOVIE_ID, LANGUAGE_ID),
	FOREIGN KEY FK_MT_MOVIE (MOVIE_ID)
		REFERENCES movie(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	FOREIGN KEY FK_MT_LANGUAGE (LANGUAGE_ID)
		REFERENCES language(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
);


# заполнение таблиц данными

INSERT INTO language (NAME) VALUES ('ru'), ('en'), ('de');

INSERT INTO movie_title(MOVIE_ID, TITLE) SELECT ID, TITLE FROM movie;

ALTER TABLE movie DROP COLUMN TITLE;