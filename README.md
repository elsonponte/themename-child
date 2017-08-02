# themename-child, a WordPress Child Theme based on Roots Sage


themename-child is a child theme based on the frontend workflow provided by Sage 8.5.1. It uses gulp and Bower to speed up and organize your child theme development.

Want to develop a custom theme? Check out [Roots Sage](https://roots.io/sage/) (trust me, it's awesome).
* Source: [https://github.com/roots/sage]

To simplify the usage of themename-child I modified's sage's instructions and kept only the essentials (thank you roots team).

## Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| Node.js >= 4.5  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.8.10  | `gulp -v`    | `npm install -g gulp` |
| Bower >= 1.3.12 | `bower -v`   | `npm install -g bower` |

For more installation notes, refer to the [Install gulp and Bower](#install-gulp-and-bower) section in this document.

## Features

* [gulp](http://gulpjs.com/) build script that compiles both Sass and Less, checks for JavaScript errors, optimizes images, and concatenates and minifies files
* [BrowserSync](http://www.browsersync.io/) for keeping multiple browsers and devices synchronized while testing, along with injecting updated CSS and JS into your browser while you're developing
* [Bower](http://bower.io/) for front-end package management
* [asset-builder](https://github.com/austinpray/asset-builder) for the JSON file based asset pipeline

## Child theme installation

You can install themename-child by cloning this repo to your WordPress themes directory. You can do that by navigating to your wp-content/themes/ folder and executing the following command

```shell
# @ example.com/wp-content/themes/
$ git clone https://github.com/elsonponte/themename-child.git themename-child
```

Replace the folder name portion that contains `themename` with the same name as your parent theme's folder name, so we get a format like `parenttheme-child`.

For avada we would use something like this:

```shell
# @ example.com/wp-content/themes/
$ git clone https://github.com/elsonponte/themename-child.git avada-child
```

You can also download the zip package, extract it and paste the contents in the the themes folder.

### Before activating the theme

Edit the style.css and replace the sections acorrdingly (check this example - taking Avada as a base):

```css
...
/*
Theme Name:         Avada Child
Description:        My Avada child theme
Template:           Avada
Version:            1.0
Author:             Your name
Author URI:         https://yoururl.com
Text Domain:        Avada

License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/
...
```

## Theme development - Exactly the same as Roots Sage

The theme uses [gulp](http://gulpjs.com/) as its build system and [Bower](http://bower.io/) to manage front-end packages.

### Install gulp and Bower

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install [gulp](http://gulpjs.com) and [Bower](http://bower.io/) globally with `npm install -g gulp bower`
2. Navigate to the theme directory, then run `npm install`
3. Run `bower install`

You now have all the necessary dependencies to run the build process.

### Available gulp commands

* `gulp` — Compile and optimize the files in your assets directory
* `gulp watch` — Compile assets when file changes are made
* `gulp --production` — Compile assets for production (no source maps).

### Using BrowserSync

To use BrowserSync during `gulp watch` you need to update `devUrl` at the bottom of `assets/manifest.json` to reflect your local development hostname.

For example, if your local development URL is `http://project-name.dev` you would update the file to read:
```json
...
  "config": {
    "devUrl": "http://project-name.dev"
  }
...
```
If your local development URL looks like `http://localhost:8888/project-name/` you would update the file to read:
```json
...
  "config": {
    "devUrl": "http://localhost:8888/project-name/"
  }
...
```
If you take a look in the assets folder, you notice the following structure:
1. `fonts`: Where you can add extra font files (assuming you are not just using google fonts or typekit).
2. `images`: The right place to place your images. Images inside this folder will be compressed automatically.
3. `scripts`: The main focus right here is the `main.js`. This file contains a javascript router that allows you to run certain scripts on specific pages or the overall website, in an organized manner. To add extra javascript files you should use bower if they are in a package format or manually if you need a single file.
4. `styles`: This folder contains some demo `scss` that comes with Roots Sage. You can delete the files/folders as long as you keep main.scss (gulp will expecting this file to exist in order to compile scss to css).
5. `manifest.json`: This file allows you to add assets. [More info on this](https://discourse.roots.io/t/how-to-add-a-third-party-js-plugin-correctly/3059).

Take in consideration that after compiled, all these assets will be outputted to the `dist` folder insted of the assets. You should load them from there.

I hope this help improving your child theme development process and please contribute.