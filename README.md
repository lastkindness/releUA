BUILD INSTRUCTIONS

It is expected that the build is performed in the local development environment and the results of the build are further manually deployed/committed to Pantheon.

PREREQUISITES

The build process requires that Node.js and Composer should be installed.

They may be obtained from there: BUILD - node 16.17.0 (https://nodejs.org/en/download/releases/) - composer (latest version https://getcomposer.org/download/)
Please follow appropriate instructions for them to complete the installation.
BUILD PREPARATION - DEPENDENCIES

Before the actual build, it is necessary to install all necessary dependencies.

The commands should be executed once in the command line (assuming that all tools are already installed): 1. 'composer install`- install needed PHP dependencies. The list of dependencies is described in the appropriate composer project which is part of source code (composer.lock) ;
		2.`npm install` - install Node.JS modules needed for the build. Configuration of dependencies is described in a file (package.json);

SOURCE CODE LOCATION
It is expected that source files for the build process (like original JS and SCSS) are located in the project assets/src directory.

BUILD RESULT
Results of the build process are located in the assets/dist directory.

BUILD DURING DEVELOPMENT
To enable tracking changes in styles and scripts during the development process, start the watcher using the following command:
`npm run watch`

After the start of the watcher, all changes of styles and script files are updated automatically - that simplifies the development process on the local development environment. Results of the build are located in assets/dist.

COMPLETE BUILD
In order to perform a full rebuild (before committing changes to Git), execute the following command:

`npm run production`

As a result of this command execution, all original stylesheets and script files in assets\src are compiled. Results of the build are stored in assets\dist and they are minified and all comments in the code are removed.

The content of the assets/dist directory is ready for committing into the version control.
