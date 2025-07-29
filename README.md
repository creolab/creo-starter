# 🚀 Creo Starter

> A modern, full-stack Laravel + Vue.js starter kit with TypeScript, Tailwind CSS v4, and shadcn-vue components.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green.svg)](https://vuejs.org)
[![TypeScript](https://img.shields.io/badge/TypeScript-5.x-blue.svg)](https://www.typescriptlang.org)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-4.x-38bdf8.svg)](https://tailwindcss.com)
[![Inertia.js](https://img.shields.io/badge/Inertia.js-2.x-9553e9.svg)](https://inertiajs.com)

## ✨ Features

### 🔧 **Tech Stack**
- **Backend**: Laravel 12 with PHP 8.2+
- **Frontend**: Vue.js 3 with TypeScript
- **Styling**: Tailwind CSS v4 with CSS Variables
- **UI Components**: shadcn-vue (New York style)
- **Icons**: Lucide Vue Next
- **Build Tool**: Vite 7 with SSR support
- **Testing**: Pest PHP for backend testing
- **Media Management**: Spatie Laravel MediaLibrary

### 🎨 **UI & Design**
- **Modern Landing Page**: Hero section, features, testimonials, and CTA
- **Dashboard Components**: Stats overview, recent activity, quick actions, system status
- **Avatar Upload**: Instant file upload with image conversions and fallback generation
- **Responsive Design**: Mobile-first approach with adaptive layouts
- **Dark/Light Mode**: System preference detection with manual toggle
- **Component Library**: 40+ shadcn-vue components pre-configured
- **Animation**: tw-animate-css for smooth interactions

### 🔐 **Authentication & Security**
- **Traditional Auth**: Email/password login and registration with first_name/last_name
- **Social Login**: Google, Facebook, and GitHub OAuth integration
- **Email Verification**: Built-in email verification system
- **Password Reset**: Secure password reset functionality
- **Session Management**: Laravel's built-in session handling
- **CSRF Protection**: Automatic CSRF token validation

### 🏗️ **Development Experience**
- **TypeScript**: Full type safety across the stack
- **Code Quality**: ESLint, Prettier, and Laravel Pint
- **Hot Reload**: Instant development feedback with Vite
- **Path Aliases**: Clean imports with `@/` aliases
- **Concurrency**: Multi-process development with one command
- **SSR Ready**: Server-side rendering support

## 🚀 Quick Start

### Prerequisites
- PHP 8.2 or higher
- Node.js 18 or higher
- Composer
- Database (MySQL, PostgreSQL, SQLite)

### Installation

1. **Clone the repository**
   ```bash
   git clone git@github.com:creolab/creo-starter.git
   cd creo-starter
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   # Configure your database in .env, then:
   php artisan migrate --seed
   ```

5. **Start development**
   ```bash
   composer run dev
   ```

This single command starts:
- Laravel development server (port 8000)
- Queue worker
- Log monitoring
- Vite dev server with HMR

## 📱 Social Login Setup

Configure OAuth applications and add credentials to your `.env`:

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

For detailed setup instructions, see `SOCIAL_LOGIN_SETUP.md`.

## 🏗️ Project Structure

```
creo-starter/
├── app/
│   ├── Http/Controllers/Auth/     # Authentication controllers
│   │   ├── SocialLoginController.php
│   │   └── ...
│   ├── Http/Controllers/Settings/ # Settings controllers
│   │   ├── AvatarController.php   # Avatar upload handling
│   │   └── ...
│   └── Models/
│       └── User.php              # User model with MediaLibrary integration
├── resources/
│   ├── js/
│   │   ├── components/
│   │   │   ├── auth/            # Authentication components
│   │   │   ├── dashboard/       # Dashboard components
│   │   │   ├── homepage/        # Landing page components
│   │   │   ├── ui/              # shadcn-vue components
│   │   │   ├── AvatarUpload.vue # Avatar upload component
│   │   │   └── UserAvatar.vue   # User avatar display component
│   │   ├── layouts/             # Layout components
│   │   ├── pages/               # Page components
│   │   └── composables/         # Vue composables
│   └── css/
│       ├── app.css              # Tailwind v4 configuration
│       └── themes/              # Theme definitions
├── routes/
│   ├── web.php                  # Web routes
│   ├── auth.php                 # Authentication routes
│   └── settings.php             # Settings routes
└── tests/                       # Pest PHP tests
```

## 🎨 Components

### Dashboard Components
- **StatsOverview**: Revenue, subscriptions, sales metrics with trend indicators
- **RecentActivity**: User activity feed with avatars and real-time updates
- **QuickActions**: Common admin actions with responsive grid layout
- **SystemStatus**: Real-time system health monitoring with progress bars

### Homepage Components
- **HomepageHeader**: Navigation with theme switcher and dynamic auth links
- **HeroSection**: Landing page hero with gradient backgrounds and CTAs
- **FeaturesSection**: Product feature showcase with hover animations
- **TestimonialsSection**: Customer testimonials with avatar integration
- **CTASection**: Final call-to-action with compelling messaging

### Authentication Components
- **SocialLoginButtons**: Google, Facebook, GitHub login with neutral styling
- **AvatarUpload**: Instant file upload with drag-and-drop support
- **UserAvatar**: Smart avatar display with fallback generation
- Responsive auth forms with validation and error handling
- Password reset flows with email verification

### User Management
- **Profile Settings**: First name, last name, email management
- **Avatar Management**: Upload, crop, and remove profile pictures
- **Password Change**: Secure password update functionality
- **Account Deletion**: Soft delete with confirmation flows

## 📸 Avatar Upload System

### Features
- **Instant Upload**: Files upload immediately when selected
- **Image Conversions**: Automatic thumbnail generation (150x150, 50x50)
- **Format Support**: JPEG, PNG, GIF, WebP up to 2MB
- **Fallback Avatars**: Generated from user initials using UI Avatars
- **Real-time Updates**: Avatar changes reflect immediately across the app

### Usage
```vue
<!-- Avatar Upload Component -->
<AvatarUpload :user="currentUser" />

<!-- Avatar Display Component -->
<UserAvatar :user="user" size="large" show-name />
```

### Backend Integration
```php
// User model with MediaLibrary
class User extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)->height(150);

        $this->addMediaConversion('small')
            ->width(50)->height(50);
    }
}
```

## 🛠️ Development Commands

### Backend (Laravel)
```bash
# Development
composer run dev              # Start all services
php artisan serve            # Laravel server only
php artisan migrate:fresh --seed

# Code quality
./vendor/bin/pint            # Format PHP code
php artisan test             # Run tests

# Media Library
php artisan storage:link     # Link storage for media files

# Production
php artisan optimize         # Optimize for production
```

### Frontend (Vue/TypeScript)
```bash
# Development
npm run dev                  # Vite dev server
npm run build:ssr           # Build with SSR

# Code quality
npm run lint                 # ESLint
npm run format              # Prettier
npm run format:check        # Check formatting
```

## 🧪 Testing

The project uses **Pest PHP** for elegant testing:

```bash
php artisan test                    # Run all tests
php artisan test --coverage       # With coverage
php artisan test --filter Auth    # Specific tests
php artisan test --filter Avatar  # Avatar upload tests
```

Test categories:
- **Feature Tests**: Authentication, dashboard, settings, avatar upload
- **Unit Tests**: Individual component testing

## 🎨 Styling & Theming

### Tailwind CSS v4
The project uses the latest Tailwind CSS v4 with:
- **CSS Variables**: Full theme customization
- **No Config File**: Configuration in `app.css`
- **Design Tokens**: Consistent spacing and colors
- **Dark Mode**: Automatic system detection

### shadcn-vue Components
Pre-configured with:
- **New York Style**: Clean, modern aesthetic
- **TypeScript**: Full type safety
- **Customizable**: Easy theme modifications
- **Accessible**: ARIA compliant components

### Theme Switching
```typescript
// Use the appearance composable
import { useAppearance } from '@/composables/useAppearance'

const { appearance, updateAppearance } = useAppearance()

// Set theme: 'light', 'dark', or 'system'
updateAppearance('dark')
```

## 🔧 Configuration

### Key Files
- `components.json` - shadcn-vue configuration
- `vite.config.ts` - Build configuration
- `tsconfig.json` - TypeScript settings
- `resources/css/app.css` - Tailwind v4 config
- `config/services.php` - OAuth providers

### Environment Variables
```env
APP_NAME=Creo
APP_ENV=local
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=creo_starter

# Storage configuration for media files
FILESYSTEM_DISK=local

# Social login credentials (see setup guide)
GOOGLE_CLIENT_ID=
FACEBOOK_CLIENT_ID=
GITHUB_CLIENT_ID=
```

## 🗄️ Database Schema

### Users Table
```sql
-- Core user fields
id, email, email_verified_at, password, remember_token
first_name, last_name  -- Separate name fields

-- Social login integration
facebook_id, google_id, github_id (nullable, indexed)

-- Timestamps
created_at, updated_at
```

### Media Table (Laravel MediaLibrary)
```sql
-- File storage and metadata
id, model_type, model_id, uuid, collection_name
name, file_name, mime_type, disk, conversions_disk
size, manipulations, custom_properties, generated_conversions
responsive_images, order_column, created_at, updated_at
```

## 🚀 Deployment

### Build for Production
```bash
npm run build:ssr           # Build frontend with SSR
php artisan optimize        # Optimize Laravel
php artisan storage:link    # Link storage directory
```

### Deployment Platforms
- **Vercel**: Optimized for seamless deployment
- **Netlify**: Static site generation support
- **Laravel Forge**: Traditional Laravel hosting with media storage
- **Docker**: Container-ready setup

### Media Storage
For production, configure cloud storage:
```env
# AWS S3 Configuration
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your_key
AWS_SECRET_ACCESS_KEY=your_secret
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=your_bucket
```

## 🔄 Recent Updates

### v2.1.0 - Enhanced User Management
- ✅ **Avatar Upload System**: Instant file upload with MediaLibrary integration
- ✅ **User Name Structure**: Separated into first_name and last_name fields
- ✅ **Enhanced Components**: Improved UserAvatar and AvatarUpload components
- ✅ **Better Registration**: Side-by-side first/last name fields
- ✅ **Type Safety**: Updated TypeScript definitions for new user structure

### v2.0.0 - Social Login Integration
- ✅ **Social Authentication**: Google, Facebook, GitHub OAuth
- ✅ **Smart User Linking**: Existing email accounts automatically linked
- ✅ **Neutral UI**: Consistent social login button styling
- ✅ **Responsive Design**: Mobile-optimized authentication flows

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Code Style
- **PHP**: Laravel Pint (PSR-12)
- **TypeScript/Vue**: ESLint + Prettier
- **Commits**: Conventional commit messages

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🙏 Acknowledgments

Built with these amazing technologies:
- [Laravel](https://laravel.com) - The PHP framework for web artisans
- [Vue.js](https://vuejs.org) - The progressive JavaScript framework
- [Inertia.js](https://inertiajs.com) - The modern monolith
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
- [shadcn-vue](https://shadcn-vue.com) - Beautiful Vue components
- [Lucide](https://lucide.dev) - Beautiful & consistent icons
- [Vite](https://vitejs.dev) - Next generation frontend tooling
- [Spatie MediaLibrary](https://spatie.be/docs/laravel-medialibrary) - File management

---

<div align="center">

**[Documentation](./docs)** • **[Issues](../../issues)** • **[Discussions](../../discussions)**

Made with ❤️ by the Creo team

</div>
