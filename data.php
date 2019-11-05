<?php

$gravitationalConstant = 6.67E-11;

$bodies = array(
    "sun" => array(
        "mass" => 1.9885E+30,
    ),
    "mercury" => array(
        "aphelion" => 69816900, //km
        "axialTilt" => 2.04, //deg
        "axialTiltVariance" => 0.08, //deg
        "category" => "planet",
        "class" => "terrestrial",
        "density" => 5.427, //g/cm
        "discovered" => 0,
        "day" => "58d 15h 30m",
        "eccentricity" => 0.205630,
        "god" => "messenger",
        "gravity" => 3.7, //m/s^2
        "inclination" => 7.005, //deg
        "mass" => 3.3011E+23, //kg
        "missions" => array(
            "Mariner 10",
            "MESSENGER",
            "BepiColombo",
        ),
        "orbitalSpeed" => 47.362, //km/s
        "perihelion" => 46001200, //km
        "radius" => 2439.7, //km
        "surfaceArea" => 7.48E+7, // km^2
        "tempMax" => 700, //k
        "tempMin" => 80, //k
        "volume" => 6.083E+10, //km^3
        "year" => "87.969d",
    ),
    "venus" => array(
        "aphelion" => 108939000, //km
        "axialTilt" => 177.36, //deg
        "category" => "planet",
        "class" => "terrestrial",
        "density" => 5.243, //g/cm
        "discovered" => 0,
        "day" => "116d 18h 0m",
        "eccentricity" => 0.006772,
        "god" => "love",
        "gravity" => 8.87, //m/s^2
        "inclination" => 3.39458, //deg
        "mass" => 4.8675E+24, //kg
        "missions" => array(
            "Mariner 2",
            "Venera 4",
            "Mariner 5",
            "Venera 5",
            "Venera 6",
            "Venera 7",
            "Venera 8",
            "Mariner 10",
            "Venera 9",
            "Venera 10",
            "Venera 11",
            "Venera 12",
            "Pioneer Venus 1",
            "Pioneer Venus 2",
            "Venera 13",
            "Venera 14",
            "Venera 15",
            "Venera 16",
            "Vega 1",
            "Vega 2",
            "Magellan",
            "Venus Express",
            "Akatsuki",
            "IKAROS",
        ),
        "orbitalSpeed" => 35.02, //km/s
        "perihelion" => 107477000, //km
        "radius" => 6051.8, //km
        "surfaceArea" => 4.6023E+8, // km^2
        "tempMean" => 737, //k
        "volume" => 9.2843E+11, //km^3
        "year" => "224.701d",
    ),
    "earth" => array(
        "aphelion" => 152100000, //km
        "axialTilt" => 23.4392811, //deg
        "category" => "planet",
        "class" => "terrestrial",
        "density" => 5.514, //g/cm
        "discovered" => 0,
        "day" => "23h 56m 4.1s",
        "eccentricity" => 0.0167086,
        "gravity" => 9.807, //m/s^2
        "inclination" => 0.00005, //deg
        "mass" => 5.97237E+24, //kg
        "orbitalSpeed" => 29.78, //km/s
        "perihelion" => 147095000, //km
        "radius" => 6371.0, //km
        "surfaceArea" => 510072000, // km^2
        "tempMax" => 700, //k
        "tempMin" => 80, //k
    ),
);

$planets = array(
    "mercury",
    "venus",
    "earth",
    "mars",
    "jupiter",
    "saturn",
    "uranus",
    "neptune",
);

$questionTypes = array(
    "closestToSun",
    "discoveredWhen",
    "farthestFromSun",
    "gravityComparedToEarth",
    "highestDensity",
    "highestTemp",
    "largestEscapeVelocity",
    "largestInclination",
    "largestMoon",
    "largestMass",
    "largestSize",
    "largestTilt",
    "leastEccentricOrbit",
    "longestDay",
    "longestYear",
    "lowestDensity",
    "lowestTemp",
    "hasMoons",
    "hasRings",
    "howManyMoons",
    "missionTo",
    "moonOfWhich",
    "mostEccentricOrbit",
    "planetIndex",
    "shortestDay",
    "shortestYear",
    "strongestGravity",
    "weakestGravity",
);

$missions = array(
    
);

function calculateEscapeVelocity() {
    
}

$test = array_keys($bodies);

echo "<pre>";
print_r($bodies);
echo "</pre>";

echo "<pre>";
print_r($planets);
echo "</pre>";

echo "<pre>";
print_r($questionTypes);
echo "</pre>";