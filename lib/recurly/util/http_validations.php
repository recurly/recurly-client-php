<?php

trait Recurly_HTTPValidations
{
  public function validateStatusCode($statusCode, $error = null)
  {
    // Successful response code
    if ($statusCode >= 200 && $statusCode < 400)
      return;

    // Do not fail here if the response is not valid XML
    $recurlyCode = (is_null($error) ? null : $error->symbol);

    switch ($statusCode) {
      case 0:
        throw new Recurly_ConnectionError('An error occurred while connecting to Recurly.');
      case 400:
        $message = (is_null($error) ? 'Bad API Request' : (string) $error);
        throw new Recurly_Error($message, 0, null, $recurlyCode);
      case 401:
        throw new Recurly_UnauthorizedError('Your API Key is not authorized to connect to Recurly.');
      case 403:
        throw new Recurly_UnauthorizedError('Please use an API key to connect to Recurly.');
      case 404:
        $message = (is_null($error) ? 'Object not found' : $error->description);
        throw new Recurly_NotFoundError($message, 0, null, $recurlyCode);
      case 422:
        // Handled in assertSuccessResponse()
        return;
      case 429:
        throw new Recurly_ApiRateLimitError('You have made too many API requests in the last 5 minutes. Future API requests may be ignored until your rate limit resets in 5 minutes. Please visit: https://dev.recurly.com/docs/rate-limits');
      case 500:
        $message = (is_null($error) ? 'An error occurred while connecting to Recurly' :
                   'An error occurred while connecting to Recurly: ' . $error->description);
        throw new Recurly_ServerError($message);
      case 502:
      case 503:
      case 504:
        throw new Recurly_ConnectionError('An error occurred while connecting to Recurly.');
    }

    // Catch future 400-499 errors as request errors
    if ($statusCode >= 400 && $statusCode < 500)
      throw new Recurly_RequestError("Invalid request, status code: {$statusCode}");

    // Catch future 500-599 errors as server errors
    if ($statusCode >= 500 && $statusCode < 600) {
      $message = (is_null($error) ? 'An error occurred while connecting to Recurly' :
                 'An error occurred while connecting to Recurly: ' . $error->description);
      throw new Recurly_ServerError($message);
    }
  }
}