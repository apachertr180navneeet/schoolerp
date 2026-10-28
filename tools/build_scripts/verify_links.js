const fs = require('fs');
const path = require('path');

let errors = 0;
let checkedLinks = 0;

function scanDir(dir) {
  const files = fs.readdirSync(dir);
  for (const f of files) {
    const full = path.join(dir, f);
    if (fs.statSync(full).isDirectory()) {
      scanDir(full);
    } else if (f.endsWith('.html')) {
      validateHtmlFile(full);
    }
  }
}

function validateHtmlFile(filePath) {
  const content = fs.readFileSync(filePath, 'utf8');
  const regex = /(?:href|src)="([^"#:]+?)(?:#[^"]*)?"/g;
  let match;
  const fileDir = path.dirname(filePath);

  while ((match = regex.exec(content)) !== null) {
    const target = match[1];
    if (target.startsWith('http') || target.startsWith('mailto:') || target.startsWith('tel:') || target.startsWith('javascript:') || target === '') {
      continue;
    }
    checkedLinks++;
    const resolvedPath = path.resolve(fileDir, target);
    if (!fs.existsSync(resolvedPath)) {
      console.error(`Broken link in ${filePath} -> ${target} (resolved: ${resolvedPath})`);
      errors++;
      if (errors > 10) {
        console.error('Too many errors, aborting...');
        process.exit(1);
      }
    }
  }
}

scanDir('prototype');
console.log(`Successfully checked ${checkedLinks} local links across all prototype HTML files. Errors found: ${errors}`);
