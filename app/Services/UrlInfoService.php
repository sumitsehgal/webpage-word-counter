<?php
namespace App\Services;

use Goutte\Client;

class UrlInfoService
{
    public function fetchInfo($url)
    {
        try {
            $client = new Client();
            $crawler = $client->request('GET', $url);

            print($crawler->text());

            $totalWords = str_word_count(strip_tags($crawler->text()));
            $pageTitle = $crawler->filter('title')->text();
            $uniqueWords = $this->countUniqueWords($crawler->text());

            return [
                'url' => $url,
                'totalWords' => $totalWords,
                'pageTitle' => $pageTitle,
                'uniqueWords' => $uniqueWords,
            ];
        } catch (\Exception $e) {
            // Handle the exception (e.g., URL not accessible)
            throw new \Exception("Error fetching information: {$e->getMessage()}");
        }
    }

    protected function countUniqueWords($text)
    {
        $words = str_word_count($text, 1);
        $uniqueWords = array_count_values($words);

        return count($uniqueWords);
    }
}

?>
