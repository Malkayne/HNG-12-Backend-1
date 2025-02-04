<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if (!isset($_GET['number']) || !is_numeric($_GET['number'])) {
    echo json_encode([
        "number" => $_GET['number'] ?? null,
        "error" => true
    ]);
    http_response_code(400); // Bad Request
    exit;
}

$number = intval($_GET['number']);
$response = [
    "number" => $number,
    "is_prime" => isPrime($number),
    "is_perfect" => isPerfect($number),
    "properties" => getProperties($number),
    "digit_sum" => digitSum($number),
    "fun_fact" => getFunFact($number)
];

// Send JSON response
echo json_encode($response);
http_response_code(200); // OK

// Function to check if a number is prime
function isPrime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

// Function to check if a number is perfect
function isPerfect($num) {
    if ($num <= 1) return false;
    $sum = 1;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) {
            $sum += $i;
            if ($i != $num / $i) $sum += $num / $i;
        }
    }
    return $sum == $num;
}

// Function to get number properties (Armstrong, Even/Odd)
function getProperties($num) {
    $properties = [];
    if (isArmstrong($num)) $properties[] = "armstrong";
    $properties[] = ($num % 2 == 0) ? "even" : "odd";
    return $properties;
}

// Function to check if a number is an Armstrong number
function isArmstrong($num) {
    $sum = 0;
    $digits = str_split((string)$num);
    $power = count($digits);
    foreach ($digits as $digit) {
        $sum += pow((int)$digit, $power);
    }
    return $sum === $num;
}

// Function to compute digit sum
function digitSum($num) {
    return array_sum(str_split((string) abs($num)));
}

// Function to fetch a fun fact from Numbers API
function getFunFact($num) {
    $api_url = "http://numbersapi.com/$num/math";
    $fact = @file_get_contents($api_url);
    return $fact ?: "No fun fact available.";
}
?>
