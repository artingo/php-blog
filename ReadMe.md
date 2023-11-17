## PhP course

This project is meant to teach PhP fundamentals by creating a blog, step by step. It uses the [Bootstrap 5](https://getbootstrap.com/docs/5.2/getting-started/introduction/) framework and stores its data in JSON files.

Follow these steps to continuously build a server-side Blog web app with PhP.

1. Create the model classes in the `model` folder.
2. Write scripts in the `scripts` folder that generate test data in JSON format in the `data` folder.
3. Create controllers in the `controllers` folder that load and display the JSON data.
4. Create PHP/HTML views in the `views` folder. Write a `view` function that loads data from the corresponding JSON file and loads the proper view template to display it.
5. Chose a UI framework. We recommend:<br/>
    1. [Bootstrap](https://getbootstrap.com/) or [Material Design Lite](https://getmdl.io/started/index.html)
    2. Search for a demo layout page and copy its HTML code to the `views\posts.php` file.<br/>
       For example: [AdminLTE starter page](https://adminlte.io/themes/v3/starter.html)
   3. Open the `controllers\posts.php` page in your browser and check the result.
   4. Correct all the CSS, JS and image references using CDN links (for starters).
   5. Remove all unnecessary UI elements and place your own labels.
   
6. Create a `layout template`. To do so, follow these steps:
   1. Create a `views\partials` sub-directory. 
   2. Cut out the code of HTML `<head>`, top navigation, sidebar and footer and paste it into their corresponding PhP files.
   3. `require` all partials in the `loadView()` function.
   4. Create a `public` folder and `css`, `img`, `js` and `webfonts` sub-folders. Download the corresponding resources to these directories and modify the links to use the local copies.
   5. Tell the PhP server to use the `public` directory with these parameters:<br/>
   `php -S localhost:8080 -t public`
   
7. Implement a basic `router`. 
   1. Inside `public\index.php`, insert this code:<br/>
   ```
   $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
   $routes = [
     '/' => '../controllers/posts.php',
     '/posts' => '../controllers/posts.php',
     '/categories' => '../controllers/categories.php',
     '/users' => '../controllers/users.php'
   ];

   if(array_key_exists($uri, $routes)) {
     require $routes[$uri];
   } else {
     http_response_code(404);
     loadView("404");
   }
   ```
   2. Add an error page: `view\404.php`
   3. Add dynamic titles by adding a `$title` parameter to the `loadView($view, $title)` function. Pass a title in the corresponding controller. Example:
   `loadView("posts", "Memories of our travels");`<br/>
   Display that title in the view by using the `$title` variable: `<h1 class="m-0"><?= $title ?></h1>`
   4. Place the proper page links in the top-navbar and sidebar: `<a href="/posts" class="nav-link">Posts</a>`
   5. Highlight the current nav link in the sidebar by checking the `$view` variable: `<a href="/posts" class="nav-link <?= $view=='posts'? 'bg-indigo' : ''?>">`
   
8. Implement the `create post` feature. For this:
   1. Create the `controllers\posts` directory and move `controllers\posts.php` to `constrollers\posts\index.php`. Correct all necessary links.
   2. Create the `views\posts` directory and move `views\posts.php` to `views\posts\index.php`. Correct all necessary links.
   3. Create both `controllers\posts\create.php` and `views\posts\create.php`.
   4. Add `'/posts/create' => BASE_PATH . '/controllers/posts/create.php'` to the `$routes` in `public\index.php`.
   5. In `views\posts\create.php`, insert a HTML form with these fields:
      1. `title` as simple input field, 
      2. `categories[]` as multiple select box,
      3. and `body` as textarea. You may use a rich text editor like `TinyMCE`.
      4. You may add [jQuery Validation](https://jqueryvalidation.org/) to it.
      5. Add `method="post" action="/posts/save"` to the `<form>` tag.
      6. Add `'/posts/save' =>   BASE_PATH . '/controllers/posts/store.php'` to the `$routes`.
   6. In `functions.php`, write a `saveData($key, $newEntry)` function:
      1. load the corresponding JSON file with `loadData(key)`
      2. add the `$newEntry` to `$data[]`
      3. save the updated JSON file.
   7. Implement `controllers\posts\store.php`:
      1. create a new Post with the fields submitted in the form:<br/>
      `$newPost = new Post($_POST['title'], $_POST['body'], 1, $_POST['categories']);`
      2. save that post: `saveData('posts', $newPost);`
      3. redirect to the posts overview page: `header("location: /posts");`