# Deployment Guide

## Quick Start

1. **Customize Content**: Update personal info in `index.html`
2. **Add Images**: Place your images in the `assets/` folder
3. **Configure Email**: Update `contact.php` with your email settings
4. **Deploy**: Choose one of the deployment options below

## Deployment Options

### 🚀 Netlify (Recommended)
```bash
# Connect your GitHub repo to Netlify
# Netlify will auto-deploy using netlify.toml
```

### ⚡ Vercel
```bash
npm install -g vercel
vercel --prod
```

### 🌐 Shared Hosting (PHP Support)
1. Upload all files via FTP/cPanel
2. Update email settings in `contact.php`
3. Test contact form

### 📱 GitHub Pages
1. Push to GitHub repository
2. Enable Pages in repository settings
3. Select source branch

## Custom Domain Setup

1. **DNS Configuration**:
   - Add A record pointing to hosting IP
   - Add CNAME for www subdomain

2. **SSL Certificate**:
   - Enable HTTPS in hosting control panel
   - Update `.htaccess` for HTTPS redirect

## Performance Checklist

- [ ] Optimize images (WebP format)
- [ ] Enable compression
- [ ] Set cache headers
- [ ] Test on mobile devices
- [ ] Validate HTML/CSS
- [ ] Test contact form

## Troubleshooting

**Contact form not working?**
- Check PHP mail function is enabled
- Verify email settings in `contact.php`
- Check server error logs

**Images not loading?**
- Verify file paths in HTML
- Check file permissions
- Ensure images are optimized

**Dark mode not persisting?**
- Check browser localStorage support
- Verify JavaScript is enabled
