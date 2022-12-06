# Codeska Development Theme

This is a WordPress starter-theme which is based on [Underscores](http://underscores.me/); it includes two most popular Front-End frameworks: [Bootstrap](http://getbootstrap.com/) and [ZURB Foundation](http://foundation.zurb.com/). The purpose of this theme is to act as a small and handy toolbox that contains the essentials needed to build any design. It's meant to be a starting point, not the final product.

All project dependencies can be added with `npm` (Please, note that for SCSS you still need to use @import tag to include scss file, but thanks to Webpack, you can Prefix your imports with `~` to grab from node_modules/ @see https://github.com/webpack-contrib/sass-loader#imports)

## Requirements

This project uses [webpack module bundler](https://webpack.js.org/) that requires [Node.js](http://nodejs.org) v8.9.x installed on your machine.
PHP7.0+

## Quickstart

### 1. Clone the repository and prepare your theme

```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://gitlab.codeska.se/dmitriy.olhovsky/codeska-starter.git
$ rename codeska-theme folder (better with underscores or together like in 'twentyseventeen')
$ cd your_theme_name
```

### 1.2 Set up a framework

To enable one of the pre-installed frameworks, go to the theme folder, then open framework-specific folder and simply copy its contents to the root theme folder:

![Framework Setup](http://i.imgur.com/dqVv2T9.gif)

### 1.3 Rename files and strings according to the project name

```bash
$ in the beginning of functions.php find Text domain definition and replace 'wp_dev' with the text domain according to your theme name
$ find & replace 'codeska_' and 'codeska' in the whole theme with your theme name
$ check the top comment section in /style.css for the correct information about the theme
$ add screenshot.png of your future theme appearance (1200px wide by 900px)
```

### 1.4 Clean-up

Delete Bootstrap and Foundation folders from the theme

### 2. Install with npm:

```bash
$ npm install
```

or you can use Yarn

```bash
$ yarn
```

### 3. Set up your assets/config.json:

#### 3.1 Live reload

Add your local server URL, so LiveReload can refresh the browser as you are working on your code:

```javascript
  "publicPath": "/wp-content/themes/THEME_NAME",
  "devUrl": "http://DOMAIN.DEV/",
```

# If you have a local domain inside the folder i.e. http://localhost/project-name you should add your folder as prefix to `publicPath` "LOCALHOST_FOLDER/wp-content/themes/THEME_NAME"

_`assets/stylesheets/main.scss` — primary theme CSS, bare-bones partials are imported to help get your styling started
_`assets/scripts/main.js` — primary theme JS

Look at the entry in assets/config.json to see how they are built:

```javascript
"entry": {
  "main": [
    "./scripts/main.js",
    "./styles/main.scss"
  ],
  "customizer": [
    "./scripts/customizer.js"
  ]
}
```

To create additional CSS or JS files, you need to:
Create the files within the `assets/scripts/` or `assets/styles/` directories
Open `assets/config.json` and add the new files to entry in a new array.

### 4. Build commands

- `npm run start` — Compile assets when file changes are made, start Browsersync session
- `npm run build` — Compile and optimize the files in your assets directory
- `npm run build:production` — Compile assets for production
  or
- `yarn run start` — Compile assets when file changes are made, start Browsersync session
- `yarn run build` — Compile and optimize the files in your assets directory
- `yarn run build:production` — Compile assets for production

### 5. Git commit as 'Theme setup'

## Overview

### 1. Folder structure

```
codeska-theme/
├───assets
│   ├───build
│   │   ├───helpers
│   │   └───util
│   ├───fonts
│   ├───images
│   ├───scripts
│   │   └───autoload
│   └───styles
│       ├───autoload
│       ├───common
│       ├───components
│       └───layouts
├───dist
│   ├───scripts
│   ├───styles
│   └───vendor
├───languages
├───lib
├───page-templates
├───template-parts
└───vc_templates
```

dist folder will be created after build task.

### 2. Javascript

Write all your project's scripts in `assets\scripts\main.js`. Separate modules can be placed inside `assets\scripts\modules\` folder, and use ES import (https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/import)

### 3. SCSS

All SCSS files are split into four main subfolders:

# Please, keep in mind that relative path will use the complied file as a starting point.

```
│       └───scss
│           ├───components
│           ├───layouts
│           └───template-parts
```

The `components` folder contains secondary styles, such as core WordPress classes styling, forms, comments, etc. Add any small, reusable styles (buttons, etc) to `_parts.scss`.
The `layouts` folder is used for all your page/template-specific styles (header/footer, single, 404, etc). Try to avoid writing styles directly in `styles.scss`: its main purpose is to connect all your files for compilation via `@import`.
The `template-parts` folder should contain styles for reusable WordPress template parts.

## 3rd party packages

Example of how to add 3rd party packages and have them included in the theme:

## From the theme directory, run:

```
@ themes/your-theme-name/
$ npm install <package name>

Install Slick carousel:
$ npm install slick-carousel
```

or

```
@ themes/your-theme-name/
$ yarn add <package name>
Install Slick carousel:
$ yarn add slick-carousel
```

Open main.js and main.scss to add the entry points for the package. If you're using Slick Carousel, your theme JS and CSS would look like this:

```
/** import external dependencies */
import 'jquery';
import 'bootstrap';

// Import Slick
import 'slick-carousel';
```

---

```
/* assets/styles/main.scss */
@import "common/variables";

// Import npm dependencies
@import "~bootstrap/scss/bootstrap";
@import "~font-awesome/scss/font-awesome";
// Import Slick
@import "~slick-carousel/slick/slick.scss";
@import "~slick-carousel/slick/slick-theme.scss";
```

## Important

- After running yarn run build from the theme directory, your package will be built with your theme assets. The dist folder will contain a \_/node_modules/ directory that has any assets referenced from your packages. The compiled CSS and JS will reference these assets without having to manually edit paths.
- Running `npm run build:production` or `yarn run build:production` will fail if 3rd party package's relative paths are not configured before being imported. To load Slick Carousel's paths, add the following line in your common/\_variables.scss file:

```
/* assets/styles/common/_variables.scss */
// Slick Carousel font path
$slick-font-path: "~slick-carousel/slick/fonts/";
// Slick Carousel ajax-loader.gif path
$slick-loader-path: "~slick-carousel/slick/";
```

## Linters and prettier

In the theme, we use [stylelint](https://stylelint.io) and [Eslint](https://eslint.org/) along with [phpcs](https://github.com/squizlabs/PHP_CodeSniffer)

You can use all benefits of modern setup with prettier.
Install prettier as global dependency

```text
npm install --global prettier
```

#### Then you should configure your IDE

#### For VS Code

First, install the package `Prettier formatter for Visual Studio Code`
Move `.stylelintrc` and `.eslintrc.js` to the root of your project
Then add user settings

```text
  "editor.formatOnSave": true,
  "prettier.eslintIntegration": true,
  "prettier.stylelintIntegration": true,
```

#### For PhpStorm

Move `.stylelintrc` and `.eslintrc.js` to the root of your project
For PhpStorm you should create file watchers for js and scss

Download exported watchers [Link to file watchers](https://drive.google.com/file/d/1zRsyFSjv-kbdFm2hz0T4hoYNXFBC01Sa/view?usp=sharing)
Then import watchers to your project. `File -> Settings -> Tools -> File Watcher` (http://prntscr.com/kdvhye)

After `npm install` you should change the path to your cmd file in the watchers configuration

[for scss](https://i.imgur.com/atlez1c.png)
[and for js](https://i.imgur.com/BadLhrD.png). Additionally, change the scope for watchers to trigger the watchers only on your files (https://i.imgur.com/9dOPb6r.png)
After that, the watchers will autocorrect most of the mistakes.
You can read more about the rules on [stylelint.io](https://stylelint.io/user-guide/rules/) and [Eslint recomended](https://eslint.org/docs/rules/)

### 4. Images

Webpack will compress all images from `assets\images\` and add them to `dist\images`.

### 5. PHP and `\lib` folder

The `lib` folder contains php files connected with `functions.php`:

- `cleanup.php` - contains functions for cleaning up default WordPress styles, scripts, etc.
- `enqueue-scripts.php` - serves for registering your styles and scripts in WordPress
- `framework.php` - contains pre-configured menu walker, comment form and pagination with classes specific to the framework you are using. Each framework has its own `framework.php` file.
- `jetpack.php` - handles compatibility issues if Jetpack plugin is enabled.
- `menu-areas.php` - serves for registering menu areas.
- `template-tags.php` - contains pre-configured custom template tags.
- `theme-support.php` - serves for registering theme support for languages, menus, post-thumbnails, post-formats etc. Most of them are already enabled.
- `vc_shortcodes.php` - serves for registering VisualComposer modules.
- `widget-areas.php` - serves for registering widget areas (sidebars).
- `acf_field_groups_type.php` - ACF Field Groups Organizer.
- `acf_blocks_loader.php` - ACF Blocks Loader.
- `wp_dashboard_customizer.php` - WP Dashboard Customizer.

#### 5.1 PHP Code Sniffer

To use phpcs you need to install phpcs as global package `composer global require "squizlabs/php_codesniffer=*"`

In another (easier for developer) way, you can use local installation **directly from the theme directory** via the command line. Just run `composer install` command and use predefined scripts `composer lint` and `composer lint-fix`.

For PhpStorm you can use [this guide](https://confluence.jetbrains.com/display/PhpStorm/PHP+Code+Sniffer+in+PhpStorm)
For VS Code you can use `package PHP CS Fixer for Visual Studio Code`
and add [settings](https://i.imgur.com/z1b66q8.png)

You can also run code sniffer and fixer from the command line directly. Visit [github repository](https://github.com/squizlabs/PHP_CodeSniffer) for more details. 

Don't forget to use `.editorconfig` for the particular project.

### 6. Workflow features

#### 6.1 Helper Classes

The theme contains javascript library that detects user browser and OS, and displays their names as classes for `<body>` tag. This allows you to easily debug all device- or browser-specific issues.
If the sidebar is active, `<body>` will have class `has_sidebar`.

#### 6.2 Working with breakpoints

Use default Bootstrap or Foundation breakpoint mixins
[Bootstrap](https://getbootstrap.com/docs/4.0/layout/overview/)

```scss
@include media-breakpoint-up(xs) { ... }
@include media-breakpoint-up(sm) { ... }
@include media-breakpoint-up(md) { ... }
@include media-breakpoint-up(lg) { ... }
@include media-breakpoint-up(xl) { ... }

// Example:
@include media-breakpoint-up(sm) {
  .some-class {
    display: block;
  }
}
```

[Foundation](https://foundation.zurb.com/sites/docs/media-queries.html)

```scss
.element {
  // Only affects medium screens and smaller screens
  @include breakpoint(medium down) {
  }
  // Only affects medium screens exclusively (not small or large)
  @include breakpoint(medium only) {
  }
}
```

#### 6.3 Flexible Content Thumbnails

Just add a thumbnail file named as ACF Flexible Content Layout Block to `assets/flexible-content-thumbs`. More functional details can be found in the method `admin_enqueue_scripts()` of the `ACF_Field_Groups_Type` class.

#### 6.4 ACF Blocks loader

Just copy and rename `template-parts/block/sample/` block template directory into `template-parts/block/`. Don't forget to change file data of template file. More functional details can be found in the `ACF_Blocks_Loader` class.
(`template-parts/block/hero/` created as an example)

Block directory structure:
- `block.php` - template file.
- `style.css` - used as enqueued styles for both back and front office.
- `script.js` - used as enqueued script for both back and front office.

#### 6.5 Customize login and admin screen

- `assets/scripts/wp-dashboard/customizer.js`
- `assets/scripts/wp-dashboard/admin.js` - Add custom scripts for dashboard.
- `assets/styles/wp-dashboard/admin.scss` - Add custom styles for dashboard.
- `assets/styles/wp-dashboard/colors.scss` - Custom color scheme.
- `assets/styles/wp-dashboard/editor.scss` - Add custom styles for WYSIWYG and Gutenberg editor (not for blocks).
- `assets/styles/wp-dashboard/login.scss` - Styles for the login page.

More functional details can be found in the `WP_Dashboard_Customizer` class.

#### 6.6 Field Group Type for ACF

![Field Groups](https://image.prntscr.com/image/JbdxqeLbTa2A9RKAjfAYPg.png)

Use taxonomy terms for field group organization instead of prefixes. Here is the list of pre-installed terms: **Template, Option, Post Type, Flexible Content, Block, Taxonomy, User, Menu Item**. 

![Terms Metabox](https://image.prntscr.com/image/WTwDjTT2R2qlvtoRCfGUUg.png)

---

## Test your project

- [Dummy content generator wpfill.me](http://www.wpfill.me/)
- [Set of data to test all core WordPress features (post/content formats, multilevel menus, etc)](http://wptest.io/)
- https://codex.wordpress.org/Theme_Development#Theme_Testing_Process
- https://codex.wordpress.org/Theme_Unit_Test

## Visual Regression Testing

## [Reference](https://docs.google.com/presentation/d/1q_LB6f3aaX5u3gsNasapIaLG3Vi49FVPIN324750TGM/edit#slide=id.g3e03219314_0_79)

This part of theme has been forked from [10up/theme-scaffold](https://github.com/10up/theme-scaffold)

We use [BackstopJS](https://github.com/garris/BackstopJS) to run our visual regression tests. BackstopJS requires just a few settings to work: a `scenarios` array that tells it which URL's to screenshot, a `viewports` array that tells it what breakpoints to use, and a `config` object for global settings.

Begin by setting which URL's you'd like to test in the `testing.urls` object in `package.json`. You will see some default URL's (homepage, article, search results), but you can add as many as you like. These URL's are read by `tests/visual/scenarios.js` to automatically produce the `scenarios` array that BackstopJS will use to take screenshots.

You can also create custom scenarios in `tests/visual/custom-scenarios.js`. Custom scenarios allow us to add specific options for specific URL's, for situations like hovering over an element to screenshot its hover state, or clicking a modal button and waiting for the modal to become visible.

To create a custom scenario, simply set the `urlName` property to match the property name in the `testing.urls` object, and then create an `options` object with your desired settings. A couple examples are provided in `tests/visual/custom-scenarios.js` and you can see a list of all available options in the [advanced scenarios](https://github.com/garris/BackstopJS#advanced-scenarios) section on GitHub.

BackstopJS can take screenshots at various screen widths, so make sure to match the breakpoints in `tests/visual/viewports.js` with those in your theme.

Though generally not necessary, you can customize the BackstopJS configuration by changing the settings in `tests/visual/config.js`.

To begin running BackstopJS visual regression tests, initialize its required files. This only needs to be done once on your local machine:

`npm run test:visual-init`

Then create a set of screenshots that will become the base reference images to run future tests against:

`npm run test:visual-reference`

After you've made changes and want to test for visual regressions:

`npm run test:visual`

Finally, if the new screenshots fail but contain desired changes, approve them for use as the new base reference images:

`npm run test:visual-approve`

## Pull Requests

Pull requests are highly appreciated. Please follow these guidelines:

1. Solve a problem. Features are great, but cleaning-up and fixing found issues in the code is even better
2. Make sure that your code is bug-free and does not introduce new bugs
3. Create a [pull request](https://help.github.com/articles/creating-a-pull-request)
