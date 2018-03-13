## Laravel Swagger

## 

- [x] Swagger で http ルートが生成出来る
- [ ] Swagger で http テストが記述出来る
- [ ] Swagger で Axios クライアントが生成出来る
- [ ] Swagger で mocha テストが記述出来る
- [ ] example を返すだけのモックサーバの構築

## Guzzle Client 

````
$routes = new RouteCollection($path)

$route = $routes->find("AttendanceResource@get");
$route = $routes->find("get","/me/hoge");

$client = $route->client();

$Factory = new Factory();
$response = $clientFactory->byRoute($route);
$client

$client->setRequestBody();
$response = $client->send();

$assertion = new Assertion();

$assertion->assertStatusCode("200",$route,$response)
$assertion->assertBodyBySchema("200",$route,$response)

$response = $response->assert("200")

$client = new Client();
$request = $client->route("get","/me/hoge")
$request = $client->route();
````