<?php

/**
 * Controls page routes
 *
 * @author  Laurence Roberts <info@gelatindesign.co.uk>
 */
class PageFront extends Ares\FrontController {

	function GET_index($slug=null) {

		// Default the slug to 'home'
		$slug = ($slug === null) ? 'home' : (string) $slug;

		// If the slug is still empty (i.e. not a string) return a 404
		if ($slug == '') return Ares\Router::HTTP_404;

		// Find the page
		$page = Page::find()->where('slug = ?', $slug)->get(0);

		// If no page is found, return a 404
		if ($page === false) return Ares\Router::HTTP_404;

		// Set the view
		View::$view = 'view';

		// Render the view with the page
		View::render($page);
	}

}