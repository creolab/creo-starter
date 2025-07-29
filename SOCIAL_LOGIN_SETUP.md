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

- `facebook_id`: The unique Facebook ID (nullable, indexed)
- `google_id`: The unique Google ID (nullable, indexed)
- `github_id`: The unique GitHub ID (nullable, indexed)

Run the migration if you haven't already:

```bash
php artisan migrate
```

## User Structure

### Name Fields
The application uses separate `first_name` and `last_name` fields:

```php
// User model
protected $fillable = [
    'first_name', 'last_name', 'email', 'password',
    'facebook_id', 'google_id', 'github_id'
];
```

### Registration Form
The registration form collects first and last names separately:

```vue
<div class="grid gap-2 sm:grid-cols-2 sm:gap-4">
    <Input v-model="form.first_name" placeholder="First name" />
    <Input v-model="form.last_name" placeholder="Last name" />
</div>
```

## Features

### Social Login Buttons

The social login buttons are available on both the login and register pages:

- **Google**: Uses Chrome icon with neutral styling
- **Facebook**: Uses Facebook icon with neutral styling
- **GitHub**: Uses GitHub icon with neutral styling

All buttons maintain consistent design and work in both light and dark modes.

### User Management

- **Smart Linking**: Users with existing email addresses are automatically linked to social providers
- **Name Handling**: Social provider names are intelligently split into first_name and last_name
- **Email Verification**: Social login users are automatically email verified
- **Multiple Providers**: Users can link multiple social accounts to one profile
- **Traditional Auth**: Users can still use email/password authentication

### Avatar Integration

Social login integrates with the avatar system:

- **Profile Pictures**: Social provider avatars are stored as avatar_url
- **Fallback System**: Generated initials use combined first_name + last_name
- **Upload Override**: Users can upload custom avatars that override social pictures

### Security

- All OAuth flows use secure HTTPS redirects
- User data is validated and sanitized
- Random passwords are generated for social login users
- Proper error handling for failed OAuth attempts
- Individual provider ID fields for better database performance

## Usage

### Frontend Components

The social login buttons are implemented as Vue components in `resources/js/components/auth/`:

```vue
<template>
  <SocialLoginButtons
    :show-divider="true"
    :show-email-option="false"
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

### Controller Logic

The `SocialLoginController` handles:

```php
// Individual provider ID storage
User::create([
    'first_name' => $this->extractFirstName($user->getName()),
    'last_name' => $this->extractLastName($user->getName()),
    'email' => $user->getEmail(),
    'google_id' => $user->getId(), // Provider-specific field
    'password' => Hash::make(Str::random(24)),
    'email_verified_at' => now(),
]);
```

## Customization

### Styling

The social login buttons use Tailwind CSS classes and can be customized by modifying the `SocialLoginButtons.vue` component. The current implementation uses neutral styling for consistency.

### Name Processing

To customize how social provider names are split:

```php
// In SocialLoginController
private function splitName(string $fullName): array
{
    $parts = explode(' ', trim($fullName));
    return [
        'first_name' => $parts[0] ?? '',
        'last_name' => implode(' ', array_slice($parts, 1)) ?: ''
    ];
}
```

### Additional Providers

To add more social login providers:

1. Add the provider configuration to `config/services.php`
2. Add the environment variables to `.env`
3. Create the OAuth application with the provider
4. Add provider_id field to users table
5. Add the routes to `routes/auth.php`
6. Add the controller methods to `SocialLoginController.php`
7. Update the `SocialLoginButtons.vue` component

## Troubleshooting

### Common Issues

1. **Redirect URI mismatch**: Ensure the redirect URI in your OAuth app matches exactly
2. **Missing environment variables**: Check that all required environment variables are set
3. **Database errors**: Ensure the migration has been run successfully
4. **Name splitting issues**: Verify that social provider names are being processed correctly

### Debug Mode

Enable debug mode in your `.env` file to see detailed error messages:

```env
APP_DEBUG=true
```

### Testing Social Login

1. **Development**: Use localhost URLs for testing
2. **Production**: Update OAuth app settings with production URLs
3. **HTTPS**: Most providers require HTTPS in production

## Database Schema

### Users Table Structure

```sql
-- Core user fields
id, first_name, last_name, email, email_verified_at, password, remember_token

-- Social login fields (all nullable and indexed)
facebook_id, google_id, github_id

-- Timestamps
created_at, updated_at
```

### Migration Example

```php
Schema::table('users', function (Blueprint $table) {
    $table->string('facebook_id')->nullable()->index()->after('email');
    $table->string('google_id')->nullable()->index()->after('facebook_id');
    $table->string('github_id')->nullable()->index()->after('google_id');
});
```

## Security Notes

- Never commit your OAuth secrets to version control
- Use environment variables for all sensitive configuration
- Regularly rotate your OAuth client secrets
- Monitor OAuth usage for suspicious activity
- Implement rate limiting for OAuth endpoints in production
- Validate and sanitize all user data from social providers

## Recent Updates

### v2.1.0 Changes
- ✅ **Individual Provider Fields**: Separate facebook_id, google_id, github_id columns
- ✅ **Name Structure**: Split into first_name and last_name fields
- ✅ **Neutral Styling**: Consistent button design across all providers
- ✅ **Better Performance**: Direct field lookups instead of compound queries
- ✅ **Avatar Integration**: Seamless integration with avatar upload system
