const fs = require('fs');
const fs_extra = require('fs-extra');
const destinationDirectory = './acf-blocks/'+process.argv[2];
const sourceDirectory = './src/blockBlank/new-block';

console.log(process)

fs.mkdir(destinationDirectory, err => {
    if(err) throw err;
    console.log('Folder created successfully');
});

fs_extra.copy(sourceDirectory, destinationDirectory, (err) => {
    if (err) {
        console.error(`Error copying folder: ${err}`);
    } else {
        console.log('Folder copied successfully.');
    }
});
