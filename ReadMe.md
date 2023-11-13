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