<?php

function loadFixture($filename)
{
  $statusCode = 200;
  $headers = array();
  $body = null;
  
  $fixture = file($filename, FILE_IGNORE_NEW_LINES);

  $matches = null;
  preg_match('/HTTP\/1\.1 ([0-9]{3})/', $fixture[0], $matches);
  $statusCode = intval($matches[1]);

  $bodyLineNumber = 0;
  for ($i = 1; $i < sizeof($fixture); $i++) {
    if (strlen($fixture[$i]) < 5) {
      $bodyLineNumber = $i + 1;
      break;
    }
    preg_match('/([^:]+): (.*)/', $fixture[$i], $matches);
    if (sizeof($matches) > 2)
      $headers[$matches[1]] = $matches[2];
  }

  if ($bodyLineNumber < sizeof($fixture))
    $body = implode(array_slice($fixture, $bodyLineNumber), "\n");

  return new Recurly_ClientResponse($statusCode, $headers, $body);
}
