<?php
require_once('vendor/autoload.php');
// Chromedriver (if started using --port=4444 as above)
$serverUrl = 'http://localhost:4444';
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

$driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());

$site = $driver->get('http://fiverr.com');
/*
$html = $site->getPageSource();

$start = strpos($html, 'Press & Hold');
$sub = substr($html, $start-200, 400);
print_r($sub);die;
$split = str_split($sub, 'Human Challenge');*/


//$str = stristr($html,  'Human Challenge');


//print_r($split);die;

$driver->getMouse()->click();

sleep(4);

$driver->manage()->window()->setPosition(new \Facebook\WebDriver\WebDriverPoint('100', '200'));

$mouse = $driver->getMouse();
$exec = new \Facebook\WebDriver\Remote\RemoteExecuteMethod($driver);
$m = new \Facebook\WebDriver\Remote\RemoteMouse($exec);
sleep(5);
$mouse->mouseMove(null, 500, 500);
//$move = $driver->getMouse()->mouseMove()
$driver->wait(5);
$driver->action()->clickAndHold()->perform();
$driver->wait(5);
/*$ac->moveByOffset('50%', '50%');
$ac->click()->perform();*/
// Read text of the element and print it to output
echo 'About to click to a button with text: ' . $okayButton->getText();

$action = new \Facebook\WebDriver\Interactions\Internal\WebDriverClickAndHoldAction($mouse, $okayButton);
// Click the element to navigate to revision history page
$action->perform();

// Make sure to always call quit() at the end to terminate the browser session
$driver->quit();

