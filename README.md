Yii 2 Simple Blog
============================
Installation

1. Copy to root.
2. Setup config test\dev\prod environment.
2.1 Edit `/config/*env*/main_console.php` file, change your `baseUrl` and `scriptUrl` so console commands could be executed.
3. Run `php yii migration/up` (read console)
4. Run `php yii rbac/init`
5. Run `php yii test/generate-categories`
6. Run `php yii test/generate-posts` (will not create images)
7. Check index, have fun! ;)

Yii 2 Json Console Import
============================
Example of .json file is located in /web/data.json

To execute import you should call this one `php yii import/by-url http://localhost/data.json`, you can apply any url you need. 



