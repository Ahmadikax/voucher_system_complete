# Voucher System - Quick Start Guide

## Accessing the Application

You can access the application in two ways:

### 1. Using Laravel's Built-in Server

The application is currently running on Laravel's built-in server at:
```
http://127.0.0.1:8000
```

This server was started with the command `php artisan serve` and will remain active as long as the terminal is open.

### 2. Using XAMPP (Recommended for Production)

Since you're using XAMPP, you can also access the application through:
```
http://localhost/voucher_system_complete/public/
```

## First Steps

1. **View Products**: Navigate to the products page at `/products`
2. **Create a Product**: 
   - Click "Add Product" on the products page
   - Fill in the product details (name, price, description)
   - Upload an image if desired
   - Click "Save"

3. **Add Codes to a Product**:
   - Click "View Codes" next to a product
   - Click "Add Code" to add a single code
   - Or click "Import Codes" to upload multiple codes from a file

## Database Information

- Database Name: `voucher_system`
- Username: `root`
- Password: `` (empty)

## File Structure

- **Models**: `app/Models/`
- **Controllers**: `app/Http/Controllers/`
- **Views**: `resources/views/`
- **Routes**: `routes/web.php`
- **Migrations**: `database/migrations/`

## Troubleshooting

If you encounter any issues:

1. Check the Laravel logs at `storage/logs/laravel.log`
2. Ensure the database connection is correct in `.env`
3. Make sure all migrations have run with `php artisan migrate:status`
4. Verify that the storage link is created with `php artisan storage:link`

## Next Steps

- Add more products and codes
- Experiment with the code import/export features
- Try archiving products and managing code statuses