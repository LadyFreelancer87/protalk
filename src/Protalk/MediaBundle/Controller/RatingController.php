<?php

namespace Protalk\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RatingController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction($rating)
    {

        //initialise partialStar variable to false
        $partialStar = 0;

        //round rating down nearest whole number
        $fullStars = floor($rating);

        //determine whether a partial star is required
        if ($rating - $fullStars > 0) $partialStar = 1;

        //calculate number of empty stars required to display
        $emptyStars = 5 - $fullStars - $partialStar;

        return array("fullStars"   => $fullStars,
                     "emptyStars"  => $emptyStars,
                     "partialStar" => $partialStar,
                     "rating"      => $rating);
    }
}
