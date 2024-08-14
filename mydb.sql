CREATE DATABASE IF NOT EXISTS WebDevProject;
USE WebDevProject;

CREATE TABLE users (
    email_id VARCHAR(264),
    pwd VARCHAR(264)
);

CREATE TABLE audience (
    audiencename VARCHAR(264),
    email_id VARCHAR(264),
    comments VARCHAR(264)
);

CREATE TABLE orders (
    email_id VARCHAR(264),
    product_title VARCHAR(264),
    product_price VARCHAR(264)
);

CREATE TABLE checkout (
    fullname VARCHAR(264),
    email VARCHAR(264),
    tel VARCHAR(264),
    address VARCHAR(264),
    upi_id VARCHAR(264)
);
