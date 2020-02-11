<?php
namespace Recurly\Errors;

class ClientError extends \Recurly\RecurlyError {}

class ResponseError extends \Recurly\RecurlyError {}

# === 3xx Redirection
#
# Not an error, per se, but should result in one in the normal course of
# API interaction.
class Redirection extends ResponseError {}

# === 304 Not Modified
#
# Catchably raised when a request is made with an ETag.
class NotModified extends ResponseError {}

# === 4xx Client Error
#
# The superclass to all client errors (responses with status code 4xx).
class ClientError extends \Recurly\RecurlyError {}

# === 400 Bad Request
#
# The request was invalid or could not be understood by the server.
# Resubmitting the request will likely result in the same error.
class BadRequest extends ClientError {}

# === 401 Unauthorized
#
# The API key is missing or invalid for the given request.
class Unauthorized extends ClientError {}

# === 402 Payment Required
#
# Your Recurly account is in production mode but is not in good standing.
# Please pay any outstanding invoices.
class PaymentRequired extends ClientError {}

# === 403 Forbidden
#
# The login is attempting to perform an action it does not have privileges
# to access. The login credentials are correct.
class Forbidden extends ClientError {}

# === 404 Not Found
#
# The resource was not found. This may be returned if the given account
# code or subscription plan does not exist. The response body will explain
# which resource was not found.
class NotFound extends ClientError {}

# === 405 Method Not Allowed
#
# A method was attempted where it is not allowed.
#
# If this is raised, there may be a bug with the client library or with
# the server.
class MethodNotAllowed extends ClientError {}

# === 406 Not Acceptable
#
# The request content type was not acceptable.
#
# If this is raised, there may be a bug with the client library or with
# the server. Please contact support@recurly.com or
# {file a bug}[https://github.com/recurly/recurly-client-ruby/issues].
class NotAcceptable extends ClientError {}

# === 412 Precondition Failed
#
# The request was unsuccessful because a condition was not met. For
# example, this message may be returned if you attempt to cancel a
# subscription for an account that has no subscription.
class PreconditionFailed extends ClientError {}

# === 415 Unsupported Media Type
#
# The request body was not recognized as XML.
#
# If this is raised, there may be a bug with the client library or with
# the server.
class UnsupportedMediaType extends ClientError {}

# === 422 Unprocessable Entity
#
# Could not process a POST or PUT request because the request is invalid.
# See the response body for more details.
class Unprocessable extends ClientError {}

# === 5xx Server Error
#
# The superclass to all server errors (responses with status code 5xx).
class ServerError extends ResponseError {}

# === 500 Internal Server Error
#
# The server encountered an error while processing your request and failed.
class InternalServerError extends ServerError {}

# === 502 Gateway Error
#
# The load balancer or web server had trouble connecting to the Recurly.
# Please try the request again.
class GatewayError extends ServerError {}

# === 503 Service Unavailable
#
# The service is temporarily unavailable. Please try the request again.
class ServiceUnavailable extends ServerError {}

# === 504 Gateway Timeout
#
# The gateway was unable to reach the service in time. Please try the request again.
class GatewayTimeout extends ServerError {}

$status_mappings = array(
    304 => NotModified,
    400 => BadRequest,
    401 => Unauthorized,
    402 => PaymentRequired,
    403 => Forbidden,
    404 => NotFound,
    406 => NotAcceptable,
    412 => PreconditionFailed,
    415 => UnsupportedMediaType,
    422 => UnprocessableEntity,
    500 => InternalServerError,
    502 => GatewayError,
    503 => ServiceUnavailable
);

function getErrorClass(int $status_code) : \Recurly\RecurlyError
{
    if (array_key_exists($status_code, $status_mappings)) {
        return $status_mappings[$status_code];
    } else {
        if ($status_code >= 400 && $status_code < 500) {
            return ClientError;
        } else if ($status_code >= 500) {
            return ServerError;
        } else {
            return \Recurly\RecurlyError;
        }
    }
}