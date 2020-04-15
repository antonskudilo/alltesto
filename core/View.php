<?php
	namespace Core;
	
	use Twig_Environment;
    use Twig_Loader_Filesystem;

    class View
	{
		public function render(Page $page) {
			return $this->renderLayout($page, $this->renderView($page));
		}
		
		private function renderLayout(Page $page, $content) {
			$layoutPath = ROOT . "/project/layouts/{$page->layout}.php";
			
			if (file_exists($layoutPath)) {
				ob_start();
					$title = $page->title;
					include $layoutPath;
				return ob_get_clean();
			} else {
				echo "Не найден файл с лейаутом по пути $layoutPath"; die();
			}
		}
		
		private function renderView(Page $page) {

            $loader = new Twig_Loader_Filesystem(ROOT . '/project/views');

            $twig = new Twig_Environment($loader);

			if ($page->view) {
				$viewPath = ROOT . "/project/views/{$page->view}.php";
				
				if (file_exists($viewPath)) {
						$data = $page->data;
						extract($data);
                    return $twig->render("{$page->view}.php", $data);
				} else {
					echo "Не найден файл с представлением по пути $viewPath"; die();
				}
			}
		}
	}
