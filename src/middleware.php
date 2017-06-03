<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

//JWT Middleware

// $app->add(new \Slim\Middleware\JwtAuthentication([
//     "secret" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDs+wvaGIhruBC6\ngJB7tFci/jyDoZzu6V35gd4ieNyGAozF+JYgOn5A+dEVaA1O1ZcNWWePoAvLctP/\nbk5q1EghdKzpErwDktX6e436QzspdWXfdlf86ktbZYQ4z0IkkSkrPekNEvrfeXfB\nnKI2Ea5F3CDyUFl6Qx0WvQX04XDbMj5U9MQJCK0lqMc6hWFSAG5zQV4x/Z0k1q5A\nUMB778gXou9JKFoAhodpDp5A7dTlHFY/tpf+0A+2LWTYM7M1gUafqwQrL7D7gFmV\nTA9gYImGIhWwxn8RtiJyFVM3KZX+AMfJMBGyPvWTZdz1d6NjjhGecmW+gbWgNKe6\nOzEHZ3vHAgMBAAECggEAYRirTnzmyFvuXrv2dvj5CtloKfa5uhnb6zMOtMkYcb/x\ntduYhzPwLucsh7zOVxKkhU+wYuSMcJtnySyE7Lh1pV+MySJn7n7nNW4SSgvp3Z7A\nUsLGYlYM8jGx7yTcUOc5GwKOzlCMgavfKXDn9YdhBDahOSc6wiFldb+VBTSpbOVr\nRgj/SZeNLXFe9ig7lTn9plj+Hfb5HGsOazP4sqSxPmMHr9GsjWweqyqxepQGvQvE\nRZIRe+LwZviq+cGdr/EM6PjuFHzwBNM3Pnydqk4LIG92GE254jSbte5A273a/E/H\nCxZu9SQKD/NyF9coiqb9pUhlaL5ANWCd+gpX1SXFQQKBgQD8hHvwmJfE4MG8QU7X\nUYE2917VvpfUwpXQ8r/t7ferfmk6oRtdVXq9val3aMbJR/cqnt4yAnC5tQC5OKxF\npzNMMnA63HPCtqY6Nmui7eR3BJM+qKEDk+YNXGoJCSGKEyAua7UKdL+U0HOZ+O+N\nUGYv1WC8hRQO5gOi4xlT1RK6mQKBgQDwP7WGMPUYRYbJT0DRpMRxQVKRsHq6R5hu\n9P5Y10oaW3t3/qRq2UJbqC3GC7JW/xcMRMPkCpe8HJ8YSOF4S4rVYNs6q1XM7BTG\nARDkRw09CoOaqppiIeJBJPsKoMDv3h0p3o2oIryEExd2PyQ1Be1rEZUMZwp9xh6u\noUhczRFFXwKBgQDBROVXkHMYzK17WMDvLAKp/0smbWnn/caM1j7v7GLTbz07EnPP\nS81VzAQY0KjVBa+3f0CxJg0BFfgny6iO5xnsB+6+Hly7evBfPafEXC+wqF/KZWZX\nRqudLk45/DMfauQGo4k9J346eBECl/VBQ3fyxG313CUuAf5mfUq1Ty+2gQKBgEXo\nY+u+RzNe18+wLg5SwY6rEVmvXqbhumtfArvbOYbd49mQ0Ur+GR8OmvMr6CMEazJ4\nt/+dTXXBZlHssx8L7EQWwPQbcwYEFC9hlAa43hNLAex5hB7V+T43go0fJcUmfpn2\nVoX8RZqw63zO9rwvE1y6awKG4Tij872g1KucSFBFAoGBALgSiqGcUBnPTsPZrYaT\ngs1wZnGW9LP+jHlC9Ar1rGH34bnmZzoF4eRLZX+KRioZuAX99c4TJCyiZJ52zwSW\neIwtZn3jU8/cThguNMUcdFloRne1uItN9Gtm3DoM6Hwcs9qSBTyHj+2IWxxPaXkZ\nJ/ZwI8BPPYsmjbA8e2bch1Hi\n-----END PRIVATE KEY-----\n",
//     // "cookie" => "nekot",
//     "path" => ["/"],
//     "passthrough" => ["/auth/attempt", "/users/create", "/users/all", "/questions", "/scores"],
//     "secure" => false,
//     "callback" => function ($request, $response, $arguments) use ($container) {
//         $container["jwt"] = $arguments["decoded"];
//     },
//     "error" => function ($request, $response, $arguments) {
//         $data["status"] = "error";
//         $data["message"] = $arguments["message"];
//         return $response->withJson($data, 401);
//     }
// ]));
$app->add(new \Tuupola\Middleware\Cors([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PUT", "OPTIONS", "DELETE"],
    "headers.allow" => ["Content-Type", "Authorization", "X-Requested-With"],
    "headers.expose" => [],
    "credentials" => false,
    "cache" => 0,
]));
