<?php
	use \Core\Route;
	
	return [
        new Route('', 'site', 'index'),

	    new Route('/select', 'test', 'select'),
        new Route('/testing', 'test', 'testing'),
        new Route('/result', 'test', 'result'),

        new Route('/register', 'user', 'register'),
        new Route('/login', 'user', 'login'),
        new Route('/logout', 'user', 'logout'),

        new Route('/cabinet', 'cabinet', 'index'),
        new Route('/cabinet/edit', 'cabinet', 'userEdit'),

        new Route('/blog', 'blog', 'index'),
        new Route('/blog/:id', 'blog', 'showArticle'),
//        new Route('/contacts', 'test', 'actionContact'),

    ];
	
