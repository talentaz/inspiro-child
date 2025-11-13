# WooCommerce Custom Email Template Setup

## Overview
Custom email template for "Order Processing" emails with Unique Wood Floors branding.

## Files Modified
1. `woocommerce/emails/email-header.php` - Custom header with hero image and logo
2. `woocommerce/emails/email-footer.php` - Custom footer with logo, social icons, and contact info
3. `woocommerce/emails/customer-processing-order.php` - Custom order processing email content
4. `woocommerce/emails/email-styles.php` - Custom colors and typography

## Required Images
You need to add the following images to your theme's `images` folder:

### Create folder structure:
```
inspiro-child/
  └── images/
      ├── email-hero.jpg
      ├── unique-logo.png
      ├── unique-logo-footer.png
      ├── icon-facebook.png
      ├── icon-instagram.png
      └── icon-linkedin.png
```

### Image Specifications:

1. **email-hero.jpg**
   - Dimensions: 600px width (height flexible, recommend 200-300px)
   - The hero image at the top of the email (wood floor interior photo)

2. **unique-logo.png**
   - Dimensions: ~300px width (transparent background)
   - Main logo displayed below hero image

3. **unique-logo-footer.png**
   - Dimensions: ~240px width (transparent background)
   - Logo in footer section

4. **icon-facebook.png**
   - Dimensions: 40x40px (transparent background)
   - Facebook social icon

5. **icon-instagram.png**
   - Dimensions: 40x40px (transparent background)
   - Instagram social icon

6. **icon-linkedin.png**
   - Dimensions: 40x40px (transparent background)
   - LinkedIn social icon

## Color Scheme
- Background: #EDE8E3 (Beige)
- Body: #FFFFFF (White)
- Primary: #2C3E2E (Dark Green)
- Text: #4A4A4A (Dark Gray)
- Accent: #8B9D6F (Light Green)

## Social Media Links
Update the social media URLs in `woocommerce/emails/email-footer.php`:
- Line 30: Facebook URL
- Line 35: Instagram URL
- Line 40: LinkedIn URL

## Email Contact
Update the email address in `woocommerce/emails/email-footer.php`:
- Line 48: sales@uniquewoodfloor.com

## Testing
1. Go to WooCommerce > Settings > Emails
2. Click on "Processing order" email
3. Scroll down and click "Send test email"
4. Check your inbox to preview the email

## Customization
To customize other email types (completed order, invoice, etc.), copy the same structure from `customer-processing-order.php` to other email templates.

## Notes
- All styles are inline for maximum email client compatibility
- Template uses table-based layout for better email rendering
- Responsive design with max-width constraints
- Images should be optimized for email (keep file sizes small)

