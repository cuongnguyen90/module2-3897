<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    const LOVE_ALL = 0;
    const FIFTEEN_ALL = 1;
    const THIRTY_ALL = 2;
    const FORTY_ALL = 3;

    const LOVE = 0;
    const TWENTY = 1;
    const THIRTY = 2;
    const FORTY = 3;


    public $score = '';

    public function getScore($player1Name, $player2Name, $m_score1, $m_score2)
    {
        $tempScore=0;

        if ($m_score1==$m_score2) {
            switch ($m_score1)
            {
                case self::LOVE_ALL:
                    $this->score = "Love-All";
                    break;
                case self::FIFTEEN_ALL:
                    $this->score = "Fifteen-All";
                    break;
                case self::THIRTY_ALL:
                    $this->score = "Thirty-All";
                    break;
                case self::FORTY_ALL:
                    $this->score = "Forty-All";
                    break;
                default:
                    $this->score = "Deuce";
                    break;

            }
        }
        else if ($m_score1>=4 || $m_score2>=4)
        {
            $minusResult = $m_score1-$m_score2;
            if ($minusResult==1) $this->score ="Advantage player1";
            else if ($minusResult ==-1) $this->score ="Advantage player2";
            else if ($minusResult>=2) $this->score = "Win for player1";
            else $this->score ="Win for player2";
        }
        else
        {
            for ($i=1; $i<3; $i++)
            {
                if ($i==1) $tempScore = $m_score1;
                else { $this->score.="-"; $tempScore = $m_score2;}
                switch($tempScore)
                {
                    case self::LOVE:
                        $this->score.="Love";
                        break;
                    case self::TWENTY:
                        $this->score.="Twenty";
                        break;
                    case self::THIRTY:
                        $this->score.="Thirty";
                        break;
                    case self::FORTY:
                        $this->score.="Forty";
                        break;
                }
            }
        }
    }

    public function __toString()
    {
        return $this->score;
    }
}