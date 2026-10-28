const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

const phpPath = 'C:\\laragon\\bin\\php\\php-8.3.33-Win32-vs16-x64\\php.exe';
let count = 0;
let errors = 0;

function lintDir(dir) {
  if (!fs.existsSync(dir)) return;
  for (const item of fs.readdirSync(dir)) {
    const full = path.join(dir, item);
    if (fs.statSync(full).isDirectory()) {
      lintDir(full);
    } else if (item.endsWith('.php')) {
      try {
        execSync(`"${phpPath}" -l "${full}"`, { stdio: 'pipe' });
        count++;
      } catch (err) {
        console.error(`Syntax error in ${full}:`, err.message);
        errors++;
      }
    }
  }
}

lintDir('dashboards');
lintDir('modules');
lintDir('includes');
lintDir('.');

console.log(`Successfully verified ${count} PHP files. Syntax errors: ${errors}`);
