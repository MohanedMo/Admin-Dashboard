# Real Estate Admin Dashboard

A modern, highly responsive, and premium Admin Dashboard built for managing real estate properties. It features a sleek glassmorphism aesthetic, a dynamic theme configuration, and smooth micro-animations.

## 🚀 Technologies Used

- **Backend Framework**: [Laravel](https://laravel.com/) (Blade Templating)
- **Frontend Styling**: [Tailwind CSS v4](https://tailwindcss.com/)
- **CSS Architecture**: Custom CSS variables integrated directly with Tailwind (`@theme`) for a centralized design system.
- **Icons**: Bootstrap Icons
- **Interactivity**: Vanilla JavaScript

## 📋 Features & Implementation Phases

The project was implemented in incremental phases, focusing on UI/UX excellence and responsive design.

### Phase 1: Foundation & Theme Architecture
- Configured Tailwind CSS and defined custom `@theme` CSS variables in `app.css` to manage global colors, typography, and spacing.
- Implemented the base layout including a responsive Sidebar with sub-navigation and an off-canvas mobile view.
- Built a sticky Top Navbar with a glassmorphism effect and backdrop blurring.

### Phase 2: Dashboard Overview & Statistics
- Created reusable Blade components for dynamic UI elements (e.g., `<x-stat-card>`, `<x-badge>`).
- Developed a dynamic statistics grid mapping data types to tailored gradient backgrounds and icons.
- Built a "Recent Properties" table with hover effects, thumbnail integration, and responsive horizontal scrolling.

### Phase 3: Property Listings Grid
- Implemented a full properties gallery page with a responsive grid layout.
- Added a search bar and status filter buttons with active state highlighting.
- Created premium property cards with:
  - Image scaling on hover.
  - Glassmorphism badge overlays displaying property status and type.
  - Price formatting and "View Details" call-to-action buttons.

### Phase 4: Property Details & Gallery
- Developed a detailed view for individual properties.
- Implemented a dynamic image gallery with a main hero image and clickable thumbnail navigation using Vanilla JavaScript.
- Styled a "Quick Info" sidebar displaying property IDs, types, and status with border subtleties.

### Phase 5: UI/UX Refinement
- Enhanced visual feedback with CSS micro-animations (`animate-in` fade-ups).
- Applied consistent border-radius (`var(--radius-sm/md/lg)`) and shadow variables for a cohesive design language.
- Refactored UI logic to maintain clean Blade templates while keeping complex styling within Tailwind utilities and centralized CSS rules.

## 🛠️ Installation & Setup

1. Clone the repository:
```bash
git clone <repository-url>
```
2. Navigate to the project directory:
```bash
cd Admin-Dashboard
```
3. Install PHP dependencies:
```bash
composer install
```
4. Install NPM dependencies and compile assets:
```bash
npm install
npm run dev
```
5. Set up your environment file:
```bash
cp .env.example .env
php artisan key:generate
```
6. Run the local development server:
```bash
php artisan serve
```

## 🤝 Contributing
Contributions, issues, and feature requests are welcome!

## 📄 License
This project is licensed under the MIT License.
