<?php
//change the ADMIN_EMAIL fields with your email and rename the file 'dev.php'

//DATABASE
const HOST = "localhost";
const DB_NAME = 'blog';
const CHARSET = 'utf8';
const DB_HOST = 'mysql:host='.HOST.';dbname='.DB_NAME.';charset='.CHARSET;
const DB_USER = 'root';
const DB_PASS = '';

//PATH
const MODEL_PATH = "App\\src\\model\\";
const DAO_PATH = "App\\src\\DAO\\";
const TEMPLATES_PATH = "../\\templates\\";
const LAYOUT_PATH = "../\\templates\\layout.php";
const INDEX_PATH = "../public/index.php";
const SLUG = "?route=";
const IMG_PATH = "../public/img/portfolio/";
const POST_PICTURE = "../public/images/blog/";
const USER_PICTURE = "../public/images/team/";
const CONSTRAINT_PATH = "App\\src\\constraint\\";
const CV_PATH = "../public/cv/CV.pdf";
const USER_AVATAR = "../public/images/tmp/AVATAR.png";
const POST_EMPTY_PICTURE = "no_picture.png";

//ADMIN_EMAIL
const ADMIN_EMAIL_ADRESS = "admin@example.com";
const PASSWORD = "password";

//MESSAGES ERREURS
const ERROR_404 = 'Page non trouvée';
const ERROR_500 = 'Problème serveur';
