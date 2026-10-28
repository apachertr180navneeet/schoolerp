const fs = require('fs');
const path = require('path');

const root = path.resolve(__dirname, '../..');
const proto = path.join(root, 'prototype');

function copyRecursive(src, dest) {
  if (!fs.existsSync(dest)) fs.mkdirSync(dest, { recursive: true });
  for (const entry of fs.readdirSync(src, { withFileTypes: true })) {
    const srcPath = path.join(src, entry.name);
    const destPath = path.join(dest, entry.name);
    if (entry.isDirectory()) {
      copyRecursive(srcPath, destPath);
    } else {
      fs.copyFileSync(srcPath, destPath);
    }
  }
}

console.log('Copying core directories from prototype/ to root...');
['assets', 'dashboards', 'includes', 'modules'].forEach(dir => {
  const src = path.join(proto, dir);
  const dest = path.join(root, dir);
  if (fs.existsSync(src)) {
    console.log(`Copying ${dir}...`);
    copyRecursive(src, dest);
  }
});

console.log('Copying root PHP files...');
['index.php', 'login.php', 'forgot-password.php', 'unauthorized.php'].forEach(file => {
  const src = path.join(proto, file);
  const dest = path.join(root, file);
  if (fs.existsSync(src)) {
    console.log(`Copying ${file}...`);
    fs.copyFileSync(src, dest);
  }
});

console.log('Migration to root complete!');

