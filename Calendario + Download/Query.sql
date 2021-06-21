CREATE TABLE events (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL,
  start date NOT NULL,
  end date NOT NULL,
  PRIMARY KEY (id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;