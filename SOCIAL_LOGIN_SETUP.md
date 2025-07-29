# Social Login Setup Guide

This guide will help you set up social login with Google, Facebook, and GitHub for your Laravel application.

## Prerequisites

- Laravel Socialite package (already installed)
- OAuth applications set up with each provider

## Environment Variables

Add the following variables to your `.env` file:

```env
# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

# Facebook OAuth
FACEBOOK_CLIENT_ID=your_facebook_client_id
FACEBOOK_CLIENT_SECRET=your_facebook_client_secret
FACEBOOK_REDIRECT_URI=http://localhost:8000/auth/facebook/callback

# GitHub OAuth
GITHUB_CLIENT_ID=your_github_client_id
GITHUB_CLIENT_SECRET=your_github_client_secret
GITHUB_REDIRECT_URI=http://localhost:8000/auth/github/callback
```

## Provider Setup Instructions

### Google OAuth Setup

1. Go to the [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Enable the Google+ API
4. Go to "Credentials" and create an OAuth 2.0 Client ID
5. Set the authorized redirect URI to: `http://localhost:8000/auth/google/callback`
6. Copy the Client ID and Client Secret to your `.env` file

### Facebook OAuth Setup

1. Go to [Facebook Developers](https://developers.facebook.com/)
2. Create a new app or select an existing one
3. Add the Facebook Login product to your app
4. Go to "Settings" > "Basic" and copy the App ID and App Secret
5. Go to "Facebook Login" > "Settings" and add the redirect URI: `http://localhost:8000/auth/facebook/callback`
6. Copy the App ID and App Secret to your `.env` file

### GitHub OAuth Setup

1. Go to [GitHub Settings](https://github.com/settings/developers)
2. Click "New OAuth App"
3. Fill in the application details:
   - Application name: Your app name
   - Homepage URL: `http://localhost:8000`
   - Authorization callback URL: `http://localhost:8000/auth/github/callback`
4. Click "Register application"
5. Copy the Client ID and Client Secret to your `.env` file

## Database Migration

The social login fields have been added to the users table:

- `provider`: The OAuth provider (google, facebook, github)
- `provider_id`: The unique ID from the provider
- `avatar`: The user's avatar URL from the provider

Run the migration if you haven't already:

```bash
php artisan migrate
```

## Features

### Social Login Buttons

The social login buttons are available on both the login and register pages:

- **Google**: Uses Google's official branding and colors
- **Facebook**: Uses Facebook's blue color scheme
- **GitHub**: Uses GitHub's dark theme with light mode support

### User Management

- Users can sign up or log in using any of the social providers
- If a user with the same email already exists, the account will be linked to the social provider
- Social login users are automatically email verified
- Users can still use traditional email/password authentication

### Security

- All OAuth flows use secure HTTPS redirects
- User data is validated and sanitized
- Random passwords are generated for social login users
- Proper error handling for failed OAuth attempts

## Usage

### Frontend Components

The social login buttons are implemented as Vue components in `resources/js/components/auth/`:

```vue
<template>
  <SocialLoginButtons
    :show-email-option="true"
    @email-click="handleEmailClick"
  />
</template>

<script setup>
import { SocialLoginButtons } from '@/components/auth';
</script>
```

### Backend Routes

The following routes are available:

- `GET /auth/google` - Redirect to Google OAuth
- `GET /auth/google/callback` - Handle Google OAuth callback
- `GET /auth/facebook` - Redirect to Facebook OAuth
- `GET /auth/facebook/callback` - Handle Facebook OAuth callback
- `GET /auth/github` - Redirect to GitHub OAuth
- `GET /auth/github/callback` - Handle GitHub OAuth callback

## Customization

### Styling

The social login buttons use Tailwind CSS classes and can be customized by modifying the `SocialLoginButtons.vue` component.

### Additional Providers

To add more social login providers:

1. Add the provider configuration to `config/services.php`
2. Add the environment variables to `.env`
3. Create the OAuth application with the provider
4. Add the routes to `routes/auth.php`
5. Add the controller methods to `SocialLoginController.php`
6. Update the `SocialLoginButtons.vue` component

## Troubleshooting

### Common Issues

1. **Redirect URI mismatch**: Ensure the redirect URI in your OAuth app matches exactly
2. **Missing environment variables**: Check that all required environment variables are set
3. **CORS issues**: Make sure your domain is allowed in the OAuth app settings
4. **Database errors**: Ensure the migration has been run successfully

### Debug Mode

Enable debug mode in your `.env` file to see detailed error messages:

```env
APP_DEBUG=true
```

## Security Notes

- Never commit your OAuth secrets to version control
- Use environment variables for all sensitive configuration
- Regularly rotate your OAuth client secrets
- Monitor OAuth usage for suspicious activity
- Implement rate limiting for OAuth endpoints in production
