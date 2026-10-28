const fs = require('fs');
const path = require('path');

const root = path.resolve(__dirname, '../..');
const files = [
  path.join(root, 'assets/js/app.js'),
  path.join(root, 'prototype/assets/js/app.js')
];

files.forEach(f => {
  if (fs.existsSync(f)) {
    let content = fs.readFileSync(f, 'utf8');
    const updated = content.replace(/\.html/g, '.php');
    fs.writeFileSync(f, updated, 'utf8');
    console.log(`Updated ${f}`);
  }
});

console.log('Successfully replaced .html with .php in app.js!');

