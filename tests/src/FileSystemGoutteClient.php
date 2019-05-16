<?php

namespace MinkPageObjects\Tests;

use Goutte\Client;
use Symfony\Component\BrowserKit\Response;

/**
 * A client class that does not require a web server.
 */
class FileSystemGoutteClient extends Client {

  /**
   * The web root.
   */
  const WEBROOT = __DIR__ . '/../fixtures';

  /**
   * {@inheritdoc}
   */
  protected function doRequest($request) {
    $page_contents = file_get_contents(static::WEBROOT . parse_url($request->getUri())['path']);
    return new Response($page_contents, 200, []);
  }

}
