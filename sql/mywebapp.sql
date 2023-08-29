CREATE DATABASE IF NOT EXISTS mywebapp;
USE mywebapp;
create table images(
	image_id int primary key auto_increment not null,
    file_name varchar(255) not null,
    time_upload datetime ,
    status tinyint(1) not null default 1
) ;
CREATE TABLE IF NOT EXISTS users (
    userId INT PRIMARY KEY AUTO_INCREMENT,
    image_id INT,
    Full_Name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_Number VARCHAR(20) NOT NULL,
    User_Name VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    UserType ENUM('Super_User', 'Administrator', 'Author') NOT NULL,
    AccessTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	file_name varchar(255) not null,
    Address TEXT,
	FOREIGN KEY (image_id) REFERENCES images(image_id) 
);

CREATE TABLE IF NOT EXISTS articles (
    articleOrder INT PRIMARY KEY AUTO_INCREMENT,
    authorId INT,
    article_title VARCHAR(255) NOT NULL,
    article_full_text TEXT NOT NULL,
    article_created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    article_last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    article_display ENUM('yes', 'no') NOT NULL DEFAULT 'yes',
    FOREIGN KEY (authorId) REFERENCES users(userId) 
);
ALTER TABLE articles
ADD CONSTRAINT fk_articles_users FOREIGN KEY (authorId) REFERENCES users(userId);


drop database mywebapp;




