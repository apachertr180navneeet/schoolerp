const fs = require('fs');
const path = require('path');

const root = path.resolve(__dirname, '../..');
const dir = path.join(root, 'prototype/dashboards');

if (fs.existsSync(dir)) {
  fs.readdirSync(dir).forEach(file => {
    if (file.endsWith('.php')) {
      const content = `<?php\nheader("Location: ../../dashboards/${file}", true, 302);\nexit;\n`;
      fs.writeFileSync(path.join(dir, file), content, 'utf8');
    }
  });
  console.log('Updated prototype/dashboards with clean 302 redirects to root dashboards!');
}

