# StorePro - Modern E-commerce Platform Demo

Welcome to StorePro, the next-generation e-commerce platform designed for ambitious businesses.

## Features

- **Lightning Fast Performance** - Optimized for speed with sub-100ms load times
- **Multilingual Support** - Built-in Arabic, English, and 20+ language support
- **Enterprise Security** - Bank-level encryption and PCI compliance
- **Real-time Analytics** - Dashboard with instant insights into sales and inventory
- **Mobile Optimized** - Fully responsive design for all devices
- **Smart Inventory Management** - Automated stock tracking and reordering

## Demo

This is a demo version showcasing the StorePro platform capabilities. Visit the live demo at: **[GitHub Pages Link](https://yourusername.github.io/storepro-demo/)**

## Getting Started

### Local Development

\`\`\`bash
# Install dependencies
npm install

# Run development server
npm run dev
\`\`\`

Open [http://localhost:3000](http://localhost:3000) in your browser.

### Deployment to GitHub Pages

1. Update `next.config.mjs` with your repository name:
\`\`\`javascript
basePath: '/your-repo-name'
\`\`\`

2. Update `.github/workflows/deploy.yml` with your custom domain (optional)

3. Push to main branch:
\`\`\`bash
git push origin main
\`\`\`

The site will automatically deploy to GitHub Pages.

## Project Structure

\`\`\`
├── app/
│   ├── layout.tsx          # Root layout
│   ├── page.tsx            # Landing page
│   └── globals.css         # Global styles
├── components/
│   ├── ui/                 # UI components
│   └── sections/           # Landing page sections
│       ├── hero.tsx
│       ├── features.tsx
│       ├── product-showcase.tsx
│       ├── pricing.tsx
│       ├── cta.tsx
│       └── footer.tsx
├── public/                 # Static assets
└── next.config.mjs        # Next.js configuration
\`\`\`

## Tech Stack

- **Framework**: Next.js 16
- **UI Components**: shadcn/ui with Radix UI
- **Styling**: Tailwind CSS v4
- **Icons**: Lucide React
- **Forms**: React Hook Form

## Customization

### Update Brand Name
Search and replace "StorePro" throughout the project with your brand name.

### Update Colors
Edit the theme variables in `app/globals.css`:
- Update `--primary` for main brand color
- Update `--accent` for accent color
- Adjust other colors as needed

### Update Content
Edit the copy in each section component:
- `components/sections/hero.tsx` - Hero section text
- `components/sections/features.tsx` - Features list
- `components/sections/pricing.tsx` - Pricing plans
- `components/sections/product-showcase.tsx` - Product examples

## Performance

- ⚡ Optimized for Lighthouse
- 📱 Mobile-first responsive design
- 🚀 Static site generation for fast loading
- 🎨 CSS-in-JS with Tailwind optimization

## License

This demo is available for purchase. Contact sales for licensing information.

## Support

For questions or support, please contact: support@storepro.com

---

**Ready to launch your store?** [Start your free trial today](https://storepro.com/trial)
