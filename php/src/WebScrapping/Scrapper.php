<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    $xpath = new \DOMXPath($dom);

    $papers = $xpath->query("//a[contains(@class, 'paper-card')]");

    $result = [];

    foreach ($papers as $paper) {
      $title = $paper->getElementsByTagName('h4')->item(0)->nodeValue;

      $authors = [];

      foreach ($paper->getElementsByTagName('div')[0]->getElementsByTagName('span') as $element)
      {
        # remove the last ; from the end of the string
        $author_name = substr($element->nodeValue, 0, -1);

        if (empty($author_name) || ctype_space($author_name)) {
          continue;
        }

        $institution_name = $element->getAttribute('title');

        $authors[] = new Person($author_name, $institution_name);
      }

      $type = $paper->getElementsByTagName('div')[2]->nodeValue;
      $id = (int)$paper->getElementsByTagName('div')[3]->nodeValue;

      $result[] = new Paper($id, $title, $type, $authors);
    }

    return $result;
  }
}
