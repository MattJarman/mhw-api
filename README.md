# Monster Hunter: World API

An API for data relating to the video game Monster Hunter: World.

The data used for this project is provided by [MHWorldData](https://github.com/gatheringhallstudios/MHWorldData).

## Development

To run this project, you'll need the following:

* [Git](https://git-scm.com/downloads)
* [Docker Compose](https://docs.docker.com/compose/)

To set up the project, you can run `install.sh` located in the `scripts` directory.

```
$ ./scripts/install.sh
```

This script will initialise the .env file, install dependencies, and generate an app key if this is your first time
installing the project.

### Helper Script

In the root of the project, you will find a file called `api`. The aim of this script is to make running certain
commands inside the containers a little easier. To use it, simply run the script with the command you would like to run
and any arguments along with it.

#### Example
```
$ ./api up
```

#### Available Commands

| Command   | Description                                                               | Extra Arguments    |                                                                          
|:----------|:--------------------------------------------------------------------------|--------------------|
| `up`      | Brings all containers for the project up, starting the API.               | :x:                |
| `down`    | Stops all currently running containers for the project, stopping the API. | :x:                |
| `phpcs`   | Runs PHP_CodeSniffer.                                                     | :heavy_check_mark: |
| `phpcbf`  | Runs PHP Code Beautifier and Fixer.                                       | :heavy_check_mark: |
| `phpstan` | Runs PHPStan.                                                             | :heavy_check_mark: |
| `tests`   | Runs PHPUnit tests.                                                       | :heavy_check_mark: |
| `tinker`  | Runs Laravel tinker.                                                      | :heavy_check_mark: |

As well as the above commands, you can run any other command you would expect to be able to run within the PHP 
container, such as `./api composer require` to install a new package, or 
`./api php artisan make:controller ExampleController` to create a new controller.
