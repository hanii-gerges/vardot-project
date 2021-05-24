SET time_zone = '+03:00';

DROP TABLE IF EXISTS users;
CREATE TABLE users
(
  id              smallint unsigned NOT NULL auto_increment,
  name            varchar(255) NOT NULL,
  email           varchar(255) NOT NULL UNIQUE,
  password        varchar(255) NOT NULL,
  role            enum('editor','admin'),
  created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY     (id)
);

DROP TABLE IF EXISTS events;
CREATE TABLE events
(
  id              bigint unsigned NOT NULL auto_increment,
  user_id         bigint unsigned NOT NULL,
  title           varchar(255) NOT NULL,
  body            text NOT NULL,
  start           TIME NOT NULL,
  end             TIME NOT NULL,
  location        varchar(255) NOT NULL,
  status          boolean NOT NULL,
  created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  updated_by      bigint unsigned NOT NULL,

  PRIMARY KEY     (id),
  FOREIGN KEY (user_id) REFERENCES users(id),
);

