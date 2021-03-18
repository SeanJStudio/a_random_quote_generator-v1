<?php

/**
 * functions.php
 * @author Sean Johnson
 * 
 * Collection of functions to display random quotes to an HTML page as part of
 * the Teamtreehouse PHP techdegree unit 1 project
 */

// initialize the quotes array of associative arrays
$quotes = array(
    [
        "quote" => "If you can't explain it to a six year old, you don't understand it yourself.",
        "source" => "Albert Einstein",
        "tags" => ["inspirational", "funny"]
    ],
    [
        "quote" => "Cowabunga",
        "source" => "Bart Simpson",
        "citation" => "The Simpsons: The Telltale Head",
        "year" => "1990",
        "tags" => ["funny", "tv"]
    ],
    [
        "quote" => "The greatest glory in living lies not in never falling, but in rising every time we fall.",
        "source" => "Nelson Mandela",
        "tags" => ["inspirational", "history"]
    ],
    [
        "quote" => "The way to get started is to quit talking and begin doing.",
        "source" => "Walt Disney",
    ],
    [
        "quote" => "When something is important enough, you do it even if the odds are not in your favor.",
        "source" => "Elon Musk",
        "citation" => "60 minutes",
        "year" => "March 30, 2014",
    ]
);

/**
 * Takes a multi-dimensional array of quotes as a parameter and
 * returns 1 random quote from it as an associative array
 */
function getRandomQuote($array){
    return $array[array_rand($array)];
}

/**
 * Takes a multi-dimensional array of quotes as a parameter and
 * echos 1 random quote and related meta data from it as an HTML formatted String
 */
function printQuote($array){
    $output = "";
    $randomQuote = getRandomQuote($array);

    foreach($randomQuote as $item => $value){
        switch($item){
            case "quote":
            case "source":
                $output .= "<p class='$item'>$value" . ($item === "quote" ? "</p>" : "");
                break;
            case "citation":
            case "year":
                $output .= "<span class='$item'>$value</span>";
                break;
            case "tags":
                $output .= "<br />";
                foreach($randomQuote[$item] as $tag)
                    $output .= "<span class='$item'>$tag</span>";
                break;
            default:
                break;
        }
    }

    echo($output . "</p>");

    refreshPage();
    printRandomColor();
}

// Echos a random RGB background-color as an inline-styled HTML body tag
function printRandomColor(){
    $randomColor = "rgb(" . rand(0,255) . "," . rand(0,255) . "," . rand(0,255) . ");";
    echo("<body style='background-color:$randomColor'>");
}

// Refreshes the page every 8 seconds
function refreshPage(){
    $seconds = 8;
    header("refresh:$seconds");
}

?>