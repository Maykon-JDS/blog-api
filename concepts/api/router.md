Building a basic router in PHP involves creating a system that maps URLs to specific handlers (like controllers or functions). Below is a step-by-step guide:

---

### **1. Create an Entry Point**
Make an `index.php` file that serves as the entry point for your application. All requests should be routed to this file using `.htaccess` or a web server configuration.

#### Example `.htaccess` for Apache:
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

---

### **2. Define Routes**
A route is typically a combination of an HTTP method (GET, POST, etc.) and a path (e.g., `/users`). You can use an associative array to store the routes.

---

### **3. Build the Router**
The router will:
1. Parse the current request.
2. Match the request to a defined route.
3. Call the associated callback or controller.

#### Example Basic Router:
```php
<?php
class Router {
    private $routes = [];

    // Add a route
    public function add($method, $path, $callback) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'callback' => $callback,
        ];
    }

    // Dispatch the request
    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($requestMethod === $route['method'] && $this->match($route['path'], $requestUri)) {
                return call_user_func($route['callback'], $this->getParams($route['path'], $requestUri));
            }
        }

        // If no route matches, return 404
        http_response_code(404);
        echo "404 Not Found";
    }

    // Check if the route matches the request
    private function match($routePath, $requestUri) {
        $routeRegex = preg_replace('/\{[^\/]+\}/', '([^/]+)', $routePath);
        return preg_match("#^{$routeRegex}$#", $requestUri);
    }

    // Extract parameters from the URI
    private function getParams($routePath, $requestUri) {
        $routeParts = explode('/', trim($routePath, '/'));
        $uriParts = explode('/', trim($requestUri, '/'));
        $params = [];

        foreach ($routeParts as $key => $part) {
            if (preg_match('/\{(.+)\}/', $part, $matches)) {
                $params[$matches[1]] = $uriParts[$key] ?? null;
            }
        }

        return $params;
    }
}

// Example Usage
$router = new Router();

$router->add('GET', '/', function() {
    echo "Welcome to the homepage!";
});

$router->add('GET', '/users/{id}', function($params) {
    echo "User ID: " . $params['id'];
});

$router->add('POST', '/submit', function() {
    echo "Form submitted!";
});

// Dispatch the request
$router->dispatch();
```

---

### **4. Test the Router**
Run a local server using PHP's built-in server for testing:

```bash
php -S localhost:8000
```

Visit the following URLs in your browser to test:
- `http://localhost:8000/` → "Welcome to the homepage!"
- `http://localhost:8000/users/42` → "User ID: 42"
- `http://localhost:8000/submit` → "Form submitted!" (if accessed via POST).

---

### **5. (Optional) Add Middleware**
Middleware can be added to handle tasks like authentication, logging, or request preprocessing before hitting the route handler.

```php
$router->add('GET', '/secure', function() {
    echo "Welcome to the secure area!";
}, function() {
    if (!isset($_SESSION['user'])) {
        http_response_code(403);
        echo "Forbidden";
        exit;
    }
});
```

---

### **6. Refine the Router**
For larger applications, consider:
- Separating route definitions into a dedicated file.
- Using controllers instead of inline callbacks.
- Implementing a Dependency Injection Container.

---

This basic router is a starting point. For production-level applications, frameworks like Laravel or Symfony provide robust routing systems.