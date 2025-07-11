# Voucher System

A Laravel-based voucher system for managing products and product codes.

## Features

- Product management (create, edit, delete, archive)
- Product code management (create, import, export, delete)
- Code status tracking (available, sold, reserved)
- Code masking for security
- Code logs for tracking changes

## Requirements

- PHP 8.1+
- MySQL 5.7+
- Composer
- Laravel 10+

## Installation

1. Clone the repository:
```
git clone <repository-url>
cd voucher_system_complete
```

2. Install dependencies:
```
composer install
```

3. Configure the environment:
```
cp .env.example .env
php artisan key:generate
```

4. Configure the database in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=voucher_system
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations:
```
php artisan migrate
```

6. Create storage link:
```
php artisan storage:link
```

7. Start the development server:
```
php artisan serve
```

The application will be available at http://localhost:8000

## Usage

### Products

- **View Products**: Navigate to `/products` to see all products
- **Create Product**: Click "Add Product" on the products page
- **Edit Product**: Click the edit icon next to a product
- **Archive Product**: Click the archive icon next to a product

### Product Codes

- **View Codes**: Click "View Codes" next to a product
- **Add Code**: Click "Add Code" on the codes page
- **Import Codes**: Click "Import Codes" and upload a CSV/TXT file
- **Export Codes**: Click "Export Codes" to download codes as CSV
- **Delete Code**: Click the delete icon next to a code
- **Reset Status**: Click the reset icon to set a code back to "available"

## Database Structure

- **products**: Stores product information
- **product_codes**: Stores code information linked to products
- **code_logs**: Tracks changes to codes
- **settings**: Stores system settings

## Settings

The system has the following configurable settings:

- **low_stock_threshold**: Number of codes that triggers low stock warning
- **allowed_file_types**: File types allowed for code import
- **code_masking**: Whether to mask codes for security

## License

[MIT License](LICENSE)
