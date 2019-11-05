<?php
//require_once("Dao.php");
// Question Generator
class QuestionGenerator {
    private $questionTypes = array(
        "closestToSun",
        "discoveredWhen",
        "farthestFromSun",
        "gravityComparedToEarth",
        "highestDensity",
        "highestTemp",
        "howManyMoons",
        "largestEscapeVelocity",
        "largestInclination",
        "largestMass",
        "largestMoon",
        "largestSize",
        "largestTilt",
        "leastEccentricOrbit",
        "longestDay",
        "longestYear",
        "lowestDensity",
        "lowestTemp",
        "missionTo",
        "moonOfWhich",
        "mostEccentricOrbit",
        "planetIndex",
        "shortestDay",
        "shortestYear",
        "strongestGravity",
        "weakestGravity",
    );
    
    private function calcEscapeVelocity($mass, $radius) {
        $G = 6.67E-11;
        $escapeVelocity = sqrt((2*$G*$mass)/$radius);
        return $escapeVelocity;
    }
    
    private function convertTime($time) {
        $secs = 0;
        $increments = explode(" ", $time);
        foreach($increments as $increment) {
            $length = strlen($increment);
            $value = floatval(substr($increment, 0, $length - 1));
            if(substr($increment, -1) == "y") {
                $secs += $value * 31536000;
            }
            else if(substr($increment, -1) == "d") {
                $secs += $value * 86400;
            }
            else if(substr($increment, -1) == "h") {
                $secs += $value * 3600;
            }
            else if(substr($increment, -1) == "m") {
                $secs += $value * 60;
            }
            else if(substr($increment, -1) == "s") {
                $secs += $value;
            }
            else {
                throw("INVALID TIME");
            }
        }
        return $secs;
    }
    
    public function generateQuestion() {
        $count = count($this->questionTypes);
        $num = rand(0, $count - 1);
        $type = $this->questionTypes[$num];
        
        //$type = "planetIndex";
        
        switch($type) {
            case "closestToSun":
                $question = $this->closestToSun();
                break;
            case "discoveredWhen":
                $question = $this->discoveredWhen();
                break;
            case "farthestFromSun":
                $question = $this->farthestFromSun();
                break;
            case "gravityComparedToEarth":
                $question = $this->gravityComparedToEarth();
                break;
            case "highestDensity":
                $question = $this->highestDensity();
                break;
            case "highestTemp":
                $question = $this->highestTemp();
                break;
            case "howManyMoons":
                $question = $this->howManyMoons();
                break;
            case "largestEscapeVelocity":
                $question = $this->largestEscapeVelocity();
                break;
            case "largestInclination":
                $question = $this->largestInclination();
                break;
            case "largestMass":
                $question = $this->largestMass();
                break;
            case "largestMoon":
                $question = $this->largestMoon();
                break;
            case "largestSize":
                $question = $this->largestSize();
                break;
            case "largestTilt":
                $question = $this->largestTilt();
                break;
            case "leastEccentricOrbit":
                $question = $this->leastEccentricOrbit();
                break;
            case "longestDay":
                $question = $this->longestDay();
                break;
            case "longestYear":
                $question = $this->longestYear();
                break;
            case "lowestDensity":
                $question = $this->lowestDensity();
                break;
            case "lowestTemp":
                $question = $this->lowestTemp();
                break;
            case "missionTo":
                $question = $this->missionTo();
                break;
            case "moonOfWhich":
                $question = $this->moonOfWhich();
                break;
            case "mostEccentricOrbit":
                $question = $this->mostEccentricOrbit();
                break;
            case "planetIndex":
                $question = $this->planetIndex();
                break;
            case "shortestDay":
                $question = $this->shortestDay();
                break;
            case "shortestYear":
                $question = $this->shortestYear();
                break;
            case "strongestGravity":
                $question = $this->strongestGravity();
                break;
            case "weakestGravity":
                $question = $this->weakestGravity();
                break;
            default:
                //echo "<pre>" . $type . "</pre>";
                break;
        }
        if(isset($question)) {
            //echo "<pre>" . print_r($question) . "</pre>";
            $question["userAnswer"] = "";
            return $question;
        }
    }
    
    private function closestToSun() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, indexFromSun");
        $closestIndex = INF;
        $closestPlanet = null;
        foreach($rows as $planet) {
            if($planet["indexFromSun"] < $closestIndex) {
                $closestIndex = $planet["indexFromSun"];
                $closestPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets is closest to the sun?";
        $question["answers"] = $answers;
        $question["correct"] = $closestPlanet;
        $question["points"] = 100;
        return $question;
    }
    
    private function discoveredWhen() {
        // TODO: Complete this question
        return $this->generateQuestion();
    }
    
    private function farthestFromSun() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, indexFromSun");
        $farthestIndex = 0;
        $farthestPlanet = null;
        foreach($rows as $planet) {
            if($planet["indexFromSun"] > $farthestIndex) {
                $farthestIndex = $planet["indexFromSun"];
                $farthestPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets is farthest from the sun?";
        $question["answers"] = $answers;
        $question["correct"] = $farthestPlanet;
        $question["points"] = 150;
        return $question;
    }
    
    private function gravityComparedToEarth() {
        // TODO: Complete this question
        return $this->generateQuestion();
    }
    
    private function highestDensity() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, density");
        $highestDensity = 0;
        $mostDensePlanet = null;
        foreach($rows as $planet) {
            if($planet["density"] > $highestDensity) {
                $highestDensity = $planet["density"];
                $mostDensePlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the highest average density?";
        $question["answers"] = $answers;
        $question["correct"] = $mostDensePlanet;
        $question["points"] = 300;
        return $question;
    }
    
    private function highestTemp() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, tempMax");
        $hottestTemp = 0;
        $hottestPlanet = null;
        foreach($rows as $planet) {
            if($planet["tempMax"] > $hottestTemp) {
                $hottestTemp = $planet["tempMax"];
                $hottestPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the highest recorded temperature?";
        $question["answers"] = $answers;
        $question["correct"] = $hottestPlanet;
        $question["points"] = 200;
        return $question;
    }
    
    private function howManyMoons() {
        // TODO: Complete this question
        // MAYBE Phobos and Deimos are moons of which planet?
        return $this->generateQuestion();
    }
    
    private function largestEscapeVelocity() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, mass, radius");
        $largestEV = 0;
        $largestEVPlanet = null;
        foreach($rows as $planet) {
            $mass = $planet["mass"];
            $radius = $planet["radius"];
            if($this->calcEscapeVelocity($mass, $radius) > $largestEV) {
                $largestEV = $this->calcEscapeVelocity($mass, $radius);
                $largestEVPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the highest escape velocity to break free of its gravity well?";
        $question["answers"] = $answers;
        $question["correct"] = $largestEVPlanet;
        $question["points"] = 200;
        return $question;
    }
    
    private function largestInclination() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, inclination");
        $largestIncline = 0;
        $mostInclinedPlanet = null;
        foreach($rows as $planet) {
            if($planet["inclination"] > $largestIncline) {
                $largestIncline = $planet["inclination"];
                $mostInclinedPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the most inclined orbit around the sun?";
        $question["answers"] = $answers;
        $question["correct"] = $mostInclinedPlanet;
        $question["points"] = 300;
        return $question;
    }
    
    private function largestMass() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, mass");
        $largestMass = 0;
        $mostMassivePlanet = null;
        foreach($rows as $planet) {
            if($planet["mass"] > $largestMass) {
                $largestMass = $planet["mass"];
                $mostMassivePlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the largest mass?";
        $question["answers"] = $answers;
        $question["correct"] = $mostMassivePlanet;
        $question["points"] = 150;
        return $question;
    }
    
    private function largestMoon() {
        // TODO: Complete this question
        return $this->generateQuestion();
        //$question["question"] = "_____ is the largest moon of which planet?";
    }
    
    private function largestSize() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        $rows = $dao->getPlanetaryData("name, radius");
        $largestRadius = 0;
        $largestPlanet = null;
        foreach($rows as $planet) {
            if($planet["radius"] > $largestRadius) {
                $largestRadius = $planet["radius"];
                $largestPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets is the largest in size?";
        $question["answers"] = $answers;
        $question["correct"] = $largestPlanet;
        $question["points"] = 150;
        return $question;
    }
    
    private function largestTilt() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        $rows = $dao->getPlanetaryData("name, axialTilt");
        $largestTilt = 0;
        $mostTiltedPlanet = null;
        foreach($rows as $planet) {
            if($planet["axialTilt"] > $largestTilt) {
                $largestTilt = $planet["axialTilt"];
                $mostTiltedPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the largest axial tilt?";
        $question["answers"] = $answers;
        $question["correct"] = $mostTiltedPlanet;
        $question["points"] = 250;
        return $question;
    }
    
    private function leastEccentricOrbit() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, eccentricity");
        $smallestEccentricity = INF;
        $leastEccentricPlanet = null;
        foreach($rows as $planet) {
            if($planet["eccentricity"] < $smallestEccentricity) {
                $smallestEccentricity = $planet["eccentricity"];
                $leastEccentricPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the least eccentric orbit?";
        $question["answers"] = $answers;
        $question["correct"] = $leastEccentricPlanet;
        $question["points"] = 400;
        return $question;
    }
    
    private function longestDay() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, dayLength");
        $longestDay = 0;
        $longestDayPlanet = null;
        foreach($rows as $planet) {
            if($this->convertTime($planet["dayLength"]) > $longestDay) {
                $longestDay = $this->convertTime($planet["dayLength"]);
                $longestDayPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the longest day?";
        $question["answers"] = $answers;
        $question["correct"] = $longestDayPlanet;
        $question["points"] = 250;
        return $question;
    }
    
    private function longestYear() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, yearLength");
        $longestYear = 0;
        $longestYearPlanet = null;
        foreach($rows as $planet) {
            if($this->convertTime($planet["yearLength"]) > $longestYear) {
                $longestYear = $this->convertTime($planet["yearLength"]);
                $longestYearPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following bodies takes the longest amount of time to complete an orbit around the sun?";
        $question["answers"] = $answers;
        $question["correct"] = $longestYearPlanet;
        $question["points"] = 100;
        return $question;
    }
    
    private function lowestDensity() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, density");
        $lowestDensity = INF;
        $leastDensePlanet = null;
        foreach($rows as $planet) {
            if($planet["density"] < $lowestDensity) {
                $lowestDensity = $planet["density"];
                $leastDensePlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the lowest average density?";
        $question["answers"] = $answers;
        $question["correct"] = $leastDensePlanet;
        $question["points"] = 150;
        return $question;
    }
    
    private function lowestTemp() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, tempMin");
        $coldestTemp = INF;
        $coldestPlanet = null;
        foreach($rows as $planet) {
            if($planet["tempMin"] < $coldestTemp) {
                $coldestTemp = $planet["tempMin"];
                $coldestPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following questions has the lowest recorded temperature?";
        $question["answers"] = $answers;
        $question["correct"] = $coldestPlanet;
        $question["points"] = 200;
        return $question;
    }
    
    private function missionTo() {
        // TODO: Complete this question
        return $this->generateQuestion();
        //$question["question"] = "The spacecraft ______ traveled to which celestial body?";
    }
    
    private function moonOfWhich() {
        // TODO: Complete this question
        return $this->generateQuestion();
        //$question["question"] = "____ is a moon of which planet?";
    }
    
    private function mostEccentricOrbit() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, eccentricity");
        $mostEccentric = 0;
        $mostEccentricPlanet = null;
        foreach($rows as $planet) {
            if($planet["eccentricity"] > $mostEccentric) {
                $mostEccentric = $planet["eccentricity"];
                $mostEccentricPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the most eccentric orbit?";
        $question["answers"] = $answers;
        $question["correct"] = $mostEccentricPlanet;
        $question["points"] = 400;
        return $question;
    }
    
    private function planetIndex() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        $rows = $dao->getPlanetaryData("name, indexFromSun");
        $selected = rand(1, 4);
        $selectedIndex = null;
        $cur = 1;
        foreach($rows as $planet) {
            if($cur == $selected) {
                $selectedIndex = $planet["indexFromSun"];
                $question["correct"] = $planet["name"];
            }
            array_push($answers, $planet["name"]);
            $cur++;
        }
        $index = $this->suffix($selectedIndex);
        $question["question"] = "Which of the following is the $index planet from the sun?";
        $question["answers"] = $answers;
        $question["points"] = 100;
        return $question;
    }
    
    private function shortestDay() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, dayLength");
        $shortestDay = INF;
        $shortestDayPlanet = null;
        foreach($rows as $planet) {
            if($this->convertTime($planet["dayLength"]) < $shortestDay) {
                $shortestDay = $this->convertTime($planet["dayLength"]);
                $shortestDayPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following planets has the shortest day?";
        $question["answers"] = $answers;
        $question["correct"] = $shortestDayPlanet;
        $question["points"] = 250;
        return $question;
    }
    
    private function shortestYear() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, yearLength");
        $shortestYear = INF;
        $shortestYearPlanet = null;
        foreach($rows as $planet) {
            if($this->convertTime($planet["yearLength"]) < $shortestYear) {
                $shortestYear = $this->convertTime($planet["yearLength"]);
                $shortestYearPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following bodies takes the least amount of time to complete an orbit around the sun?";
        $question["answers"] = $answers;
        $question["correct"] = $shortestYearPlanet;
        $question["points"] = 100;
        return $question;
    }
    
    private function strongestGravity() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, gravity");
        $strongestGravity = 0;
        $strongestGravityPlanet = null;
        foreach($rows as $planet) {
            if($planet["gravity"] > $strongestGravity) {
                $strongestGravity = $planet["gravity"];
                $strongestGravityPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following bodies exerts the strongest force of gravity?";
        $question["answers"] = $answers;
        $question["correct"] = $strongestGravityPlanet;
        $question["points"] = 200;
        return $question;
    }
    
    private function suffix($num) {
        if($num == 11 || $num == 12 || $num == 13) {
            return $num . "th";
        }
        if($num % 10 == 1) {
            return $num . "st";
        }
        else if($num % 10 == 2) {
            return $num . "nd";
        }
        else if($num % 10 == 3) {
            return $num . "rd";
        }
        return $num . "th";
    }
    
    private function weakestGravity() {
        $question = array();
        $answers = array();
        $dao = new DAO();
        
        $rows = $dao->getPlanetaryData("name, gravity");
        $weakestGravity = INF;
        $weakestGravityPlanet = null;
        foreach($rows as $planet) {
            if($planet["gravity"] < $weakestGravity) {
                $weakestGravity = $planet["gravity"];
                $weakestGravityPlanet = $planet["name"];
            }
            array_push($answers, $planet["name"]);
        }
        $question["question"] = "Which of the following bodies exerts the weakest force of gravity?";
        $question["answers"] = $answers;
        $question["correct"] = $weakestGravityPlanet;
        $question["points"] = 150;
        return $question;
    }
}