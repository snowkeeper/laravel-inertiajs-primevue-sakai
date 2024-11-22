

## Installation 
1. Create a repo from the template (or download the zip)

2. Step into the project directory
   ```
   cd ./laravel-inertiajs-primevue-sakai
   ```

3. Install the framework and other packages
   ```
   composer install
   ```

3. Setup `.env` file
   ```
   cp .env.example .env
   ```

4. Generate the app key
   ```
   php artisan key:generate
   ```

5. Adjust .env database settings and Migrate database tables 
   ```
   php artisan migrate
   ```

6. Install npm packages
   ```
   npm install
   ```

7. Start the Vite dev server
   ```
   npm run dev
   ```
8. Run the artisan dev server
   ```
   php artisan serve --host=0.0.0.0
   ```
