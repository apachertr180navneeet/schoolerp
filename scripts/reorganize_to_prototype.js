/**
 * Reorganize complete PHP prototype into prototype/ directory,
 * remove all .html files, and configure clean extensionless .php URLs.
 */
const fs = require('fs');
const path = require('path');

const ROOT_DIR = path.resolve(__dirname, '..');
const PROTOTYPE_DIR = path.join(ROOT_DIR, 'prototype');

console.log('--- STEP 1: Removing all .html files from prototype/ ---');
function removeHtmlFiles(dir) {
  let count = 0;
  if (!fs.existsSync(dir)) return count;
  const entries = fs.readdirSync(dir, { withFileTypes: true });
  for (const entry of entries) {
    const fullPath = path.join(dir, entry.name);
    if (entry.isDirectory()) {
      count += removeHtmlFiles(fullPath);
    } else if (entry.isFile() && entry.name.endsWith('.html')) {
      fs.unlinkSync(fullPath);
      count++;
    }
  }
  return count;
}
const removedCount = removeHtmlFiles(PROTOTYPE_DIR);
console.log(`Deleted ${removedCount} .html files from prototype/`);

console.log('--- STEP 2: Copying / Syncing PHP directories into prototype/ ---');
function copyDirRecursive(src, dest) {
  if (!fs.existsSync(dest)) fs.mkdirSync(dest, { recursive: true });
  const entries = fs.readdirSync(src, { withFileTypes: true });
  for (const entry of entries) {
    const srcPath = path.join(src, entry.name);
    const destPath = path.join(dest, entry.name);
    if (entry.isDirectory()) {
      copyDirRecursive(srcPath, destPath);
    } else {
      fs.copyFileSync(srcPath, destPath);
    }
  }
}

// 1. includes
copyDirRecursive(path.join(ROOT_DIR, 'includes'), path.join(PROTOTYPE_DIR, 'includes'));
console.log('Copied includes/ into prototype/includes/');

// 2. dashboards
copyDirRecursive(path.join(ROOT_DIR, 'dashboards'), path.join(PROTOTYPE_DIR, 'dashboards'));
console.log('Copied dashboards/ into prototype/dashboards/');

// 3. modules
copyDirRecursive(path.join(ROOT_DIR, 'modules'), path.join(PROTOTYPE_DIR, 'modules'));
console.log('Copied modules/ into prototype/modules/');

// 4. assets
copyDirRecursive(path.join(ROOT_DIR, 'assets'), path.join(PROTOTYPE_DIR, 'assets'));
console.log('Copied assets/ into prototype/assets/');

// 5. Root php files
const rootFiles = ['index.php', 'login.php', 'forgot-password.php', 'unauthorized.php'];
rootFiles.forEach(f => {
  const src = path.join(ROOT_DIR, f);
  const dest = path.join(PROTOTYPE_DIR, f);
  if (fs.existsSync(src)) {
    fs.copyFileSync(src, dest);
    console.log(`Copied ${f} into prototype/${f}`);
  }
});

console.log('Reorganization to prototype/ complete!');
