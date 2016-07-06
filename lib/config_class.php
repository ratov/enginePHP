<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 04.07.2016
 * Time: 15:38
 */
abstract class Config
{
    const SITENAME = "MyRusakov.ru";
    const SECRET = "DGLJDG5";
    const ADDRESS = "http://lesson.local";
    const ADM_NAME = "Ратов Кирилл";
    const ADM_EMAIL = "admin@myrusakov.ru";

    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "lesson";
    const DB_PREFIX = "xyz_";
    const DB_SYM_QUERY = "?";

    const DIR_IMG = "/images/";
    const DIR_IMG_ARTICLES = "/images/articles/";
    const DIR_TMPL = "ratovengine.local/www/tmpl/";
    const DIR_EMAILS = "ratovengine.local/www/tmpl/emails";

    const FILE_MESSAGES = "ratovengine.local/www/text/messages.ini";

    const COUNT_ARTICLES_ON_PAGE = 3;
    const COUNT_SHOW_PAGES = 10;

    const MIN_SEARCH_LEN = 3;
    const LEN_SEARCH_RES = 255;

    const DEFAULT_AVATAR = "default.png";
    const MAX_SIZE_AVATAR = 51200;
}