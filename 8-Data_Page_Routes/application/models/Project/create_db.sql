DROP TABLE IF EXISTS projects;

CREATE TABLE IF NOT EXISTS projects (
    id int(15) NOT NULL AUTO_INCREMENT,
    title varchar(150) NOT NULL,
    category varchar(100) NOT NULL,
    short_description varchar(200) NOT NULL,
    description longtext NOT NULL,
    image_url varchar(200) NOT NULL,
    created_at datetime NOT NULL DEFAULT now(),
    modified_at datetime NOT NULL DEFAULT now() ON UPDATE now(),
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

