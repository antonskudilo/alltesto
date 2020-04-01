<?php
	use \Core\Route;
	
	return [
	    new Route('', 'site', 'select'),
        new Route('/testing', 'site', 'testing'),
        new Route('/result', 'site', 'result'),

        new Route('/register', 'user', 'register'),
        new Route('/login', 'user', 'login'),
        new Route('/logout', 'user', 'logout'),

        new Route('/cabinet', 'cabinet', 'index'),
        new Route('/cabinet/edit', 'cabinet', 'userEdit'),

//        new Route('/contacts', 'site', 'actionContact'),

    ];
	
