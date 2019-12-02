# Kartik Patel

## Overview

Basic silverstripe project that is keep up to date with latest version to the best ability. Follow the guide below to setup for your project and get going.

## Requirements
- PHP 7.0+

## Installation

```
git clone https://github.com/kartikpatel95/ss-project-setup.git
```
In the root of the project run ```composer install``` to install the dependent packages

#### Following Sections in the project will need to be changed to user preference

- Change theme name to what you want it to be: ``` app/_config/theme.yml ```
- Rename the root folder in the theme to the name you gave in theme.yml: ```themes/mytheme```
- Change composer.json to expose the correct path assets ```"expose": ["themes/mytheme/assets/"]```

## .env
You will need to create a .env file in the root of your project for your environment configurations.
