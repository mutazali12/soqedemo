# Deployment Guide

## GitHub Pages Deployment

### Step 1: Prepare Repository

Ensure your repository settings have GitHub Pages enabled:

1. Go to Settings → Pages
2. Select "Deploy from a branch"
3. Choose "gh-pages" branch
4. Click Save

### Step 2: Configure Domain

If using a custom domain:

1. Add `CNAME` file to `public/` folder with your domain
2. Configure DNS settings with your registrar

### Step 3: Environment Variables

No environment variables are required for the demo. All content is static.

### Step 4: Deploy

The GitHub Actions workflow will automatically deploy when you push to main:

\`\`\`bash
git add .
git commit -m "Deploy StorePro demo"
git push origin main
\`\`\`

Check Actions tab to monitor the deployment.

## Vercel Deployment (Alternative)

To deploy to Vercel instead:

\`\`\`bash
npm install -g vercel
vercel
\`\`\`

Follow the prompts to deploy.

## Local Testing

To test the static export locally:

\`\`\`bash
npm run build
npx serve out
\`\`\`

Visit `http://localhost:3000` to preview the deployed version.

## Troubleshooting

### Images not showing
- Ensure images are in `public/` folder
- Check image paths in components

### Styles not applying
- Clear browser cache (Ctrl+Shift+Delete)
- Rebuild project: `npm run build`

### 404 errors on subpages
- This is expected for static export
- All content should be on the main page

---

For more help, visit [Next.js Deployment Docs](https://nextjs.org/docs/app/building-your-application/deploying)
