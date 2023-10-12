<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

/**
 * Exports the data to xlsx file.
 */

 class Exporter {

   /**
    * Receive the scrapped data and exports to xlsx file.
    */
   public function export(array $data, string $filepath): void {
    $writer = WriterEntityFactory::createXLSXWriter();

    $writer->openToFile($filepath);

    $cells = [
      'ID',
      'Title',
      'Type',
    ];

    $max_authors_count = 0;

    foreach ($data as $paper) {
      $max_authors_count = max($max_authors_count, count($paper->authors));
    }

    for ($i = 1; $i <= $max_authors_count; $i++) {
      $cells[] = "Author {$i}";
      $cells[] = "Author {$i} Institution";
    }

    $headerRow = WriterEntityFactory::createRowFromArray($cells);
    $writer->addRow($headerRow);

    foreach ($data as $paper) {
      $cells = [
        $paper->id,
        $paper->title,
        $paper->type,
      ];

      foreach ($paper->authors as $author) {
        $cells[] = $author->name;
        $cells[] = $author->institution;
      }

      $row = WriterEntityFactory::createRowFromArray($cells);
      $writer->addRow($row);
    }

    $writer->close();
   }
 }