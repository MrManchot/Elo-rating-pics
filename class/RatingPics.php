<?php

class RatingPics
{

    const SCORES_FILE = 'scores.json';
    const DEFAULT_SCORE = 1000;
    public $dir;
    public $scores;

    public function __construct($dir)
    {
        $this->dir = $dir;
        $this->scores = $this->readScores();
    }

    public function picKPics()
    {
        $files = glob($this->dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        if (!count($files))
            die('No pics found');

        $max_index = count($files) - 1;
        $first = rand(0, $max_index);

        do
        $second = rand(0, $max_index);
        while ($first == $second);

        return array($files[$first], $files[$second]);
    }

    public function readScores()
    {
        if (!file_exists(self::SCORES_FILE)) {
            $data = array();
            file_put_contents(self::SCORES_FILE, json_encode($data));
        } else {
            $json = file_get_contents(self::SCORES_FILE);
            $data = json_decode($json, true);
        }
        arsort($data);
        return $data;
    }

    public function writeScores()
    {
        file_put_contents(self::SCORES_FILE, json_encode($this->scores));
    }

    public function play($win, $loose)
    {
        $win = str_replace($this->dir, '', base64_decode($win));
        $loose = str_replace($this->dir, '', base64_decode($loose));
        $win_score = isset($this->scores[$win]) ? $this->scores[$win] : self::DEFAULT_SCORE;
        $loose_score = isset($this->scores[$loose]) ? $this->scores[$loose] : self::DEFAULT_SCORE;

        $rating = new Rating\Rating($win_score, $loose_score, 0, 1);
        $results = $rating->getNewRatings();
        $this->scores[$win] = $results['a'];
        $this->scores[$loose] = $results['b'];

        $this->writeScores();
    }

}