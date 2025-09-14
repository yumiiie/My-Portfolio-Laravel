# Personal Portfolio Website

A modern, responsive personal portfolio website built with HTML, CSS, and JavaScript. Features dark mode, smooth animations, and a contact form with PHP backend.

## 🚀 Features

- **Responsive Design**: Mobile-first approach with clean, modern layout
- **Dark Mode**: Toggle between light and dark themes with persistent preference
- **Smooth Animations**: Scroll-triggered animations and hover effects
- **Interactive Carousel**: Certificates showcase with touch/swipe support
- **Contact Form**: PHP backend for email handling with validation
- **Fast Loading**: Optimized assets and performance
- **SEO Friendly**: Semantic HTML and meta tags
- **Accessibility**: ARIA labels and keyboard navigation support

## 📁 Project Structure

```
portfolio/
├── index.html              # Main HTML file
├── css/
│   └── style.css          # Main stylesheet with CSS variables
├── js/
│   └── script.js          # JavaScript functionality
├── assets/                # Images and media files
│   ├── profile.jpg        # Profile picture
│   ├── project1.jpg       # Project screenshots
│   ├── project2.jpg
│   ├── project3.jpg
│   ├── project4.jpg
│   ├── cert1.jpg          # Certificate images
│   ├── cert2.jpg
│   ├── cert3.jpg
│   ├── cert4.jpg
│   └── resume.pdf         # Resume file
├── contact.php            # PHP contact form handler
├── netlify.toml          # Netlify deployment config
├── vercel.json           # Vercel deployment config
├── .htaccess             # Apache server config
└── README.md             # This file
```

## 🛠️ Setup Instructions

### 1. Customize Content

1. **Personal Information**: Update the following in `index.html`:
   - Replace "Your Name" with your actual name
   - Update email, phone, and location in contact section
   - Add your social media links (GitHub, LinkedIn, etc.)

2. **Projects**: Update the projects section with your actual projects:
   - Replace project titles and descriptions
   - Update technology tags
   - Add your GitHub and demo links
   - Replace project images in the `assets/` folder

3. **Certificates**: Update the certificates carousel:
   - Replace certificate images in the `assets/` folder
   - Update certificate names and issuing organizations
   - Modify dates as needed

4. **Skills**: Update the skills section with your technologies:
   - Add/remove programming languages
   - Update frameworks and tools
   - Modify skill categories as needed

5. **Resume**: Replace `assets/resume.pdf` with your actual resume

6. **Profile Picture**: Replace `assets/profile.jpg` with your photo

### 2. Configure Contact Form

1. **Email Settings**: Update `contact.php`:
   ```php
   $config = [
       'to_email' => 'your.email@example.com', // Your email
       'from_email' => 'noreply@yourdomain.com', // Your domain email
       // ... other settings
   ];
   ```

2. **Server Requirements**: Ensure your hosting supports:
   - PHP 7.4 or higher
   - Mail function enabled
   - File write permissions for logging

### 3. Assets Preparation

Create the following images in the `assets/` folder:

- **profile.jpg**: Your professional photo (300x300px recommended)
- **project1.jpg to project4.jpg**: Project screenshots (400x300px recommended)
- **cert1.jpg to cert4.jpg**: Certificate images (400x300px recommended)
- **resume.pdf**: Your resume in PDF format

## 🚀 Deployment Options

### Option 1: Netlify (Recommended for Static Hosting)

1. **Connect Repository**:
   - Push your code to GitHub/GitLab
   - Connect your repository to Netlify
   - Netlify will automatically deploy using `netlify.toml`

2. **Custom Domain** (Optional):
   - Add your custom domain in Netlify dashboard
   - Update DNS settings as instructed

3. **Environment Variables** (if using contact form):
   - Add environment variables in Netlify dashboard
   - Note: Netlify doesn't support PHP, so contact form won't work

### Option 2: Vercel

1. **Deploy**:
   - Install Vercel CLI: `npm i -g vercel`
   - Run `vercel` in your project directory
   - Follow the prompts

2. **Custom Domain**:
   - Add domain in Vercel dashboard
   - Update DNS settings

### Option 3: Shared Hosting with PHP Support

1. **Upload Files**:
   - Upload all files to your web server
   - Ensure PHP is enabled

2. **Configure Email**:
   - Update email settings in `contact.php`
   - Test the contact form

3. **SSL Certificate**:
   - Enable HTTPS in your hosting control panel
   - Uncomment HTTPS redirect in `.htaccess`

### Option 4: GitHub Pages (Static Only)

1. **Repository Setup**:
   - Create a GitHub repository
   - Enable GitHub Pages in repository settings

2. **Deploy**:
   - Push your code to the repository
   - GitHub Pages will automatically deploy

## 🎨 Customization

### Colors and Theme

The website uses CSS variables for easy customization. Update these in `css/style.css`:

```css
:root {
  --primary-color: #6366f1;    /* Main brand color */
  --secondary-color: #10b981;  /* Accent color */
  --accent-color: #f59e0b;     /* Highlight color */
  /* ... other variables */
}
```

### Fonts

The website uses Inter font from Google Fonts. To change:

1. Update the font link in `index.html`
2. Update `--font-family` variable in CSS

### Animations

Customize animations by modifying:
- CSS transitions in `style.css`
- JavaScript animation functions in `script.js`

## 📱 Browser Support

- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🔧 Performance Optimization

The website is optimized for performance with:

- **Minified CSS and JS** (for production)
- **Image optimization** (WebP format recommended)
- **Lazy loading** for images
- **Caching headers** for static assets
- **Compression** enabled

## 🛡️ Security Features

- **Input validation** in contact form
- **XSS protection** headers
- **CSRF protection** (implement as needed)
- **File upload restrictions**
- **Error logging** for debugging

## 📞 Support

If you need help customizing or deploying your portfolio:

1. Check the browser console for errors
2. Verify all file paths are correct
3. Test the contact form with a simple email
4. Ensure all images are properly optimized

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🙏 Credits

- **Icons**: Font Awesome
- **Fonts**: Google Fonts (Inter)
- **Design Inspiration**: Modern web design trends
- **Code**: Custom built with best practices

---

**Happy coding!** 🚀
