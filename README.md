# Online Library Application

## Description
This application is an online library platform that allows users to search for books using the Google Books API, access book study areas within the library, and manage book borrowing.It is built with Laravel for a robust and scalable backend. 

## Features
- **Online Library Access**: Search and browse books using the Google Books API.
- **Study Area Booking**: Reserve a study area in the library for focused study sessions.
- **Book Management**: Borrow and return books from the library seamlessly.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/NanaDeiJnr/library_php.git
   ```

2. Navigate to the project directory:
   ```bash
   cd <project-directory>
   ```

3. Install dependencies using Composer:
   ```bash
   composer install
   ```

4. Create a `.env` file by copying `.env.example` and configuring your environment settings, including database and Google API key:
   ```bash
   cp .env.example .env
   ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Start the Laravel development server:
   ```bash
   php -S 127.0.0.1:8000 -t public/
   ```

## Usage
After running the Laravel development server, open your browser and navigate to `http://127.0.0.1:8000`.

### Google Books API Setup
1. Sign up for a Google API key at the [Google Cloud Console](https://console.cloud.google.com/).
2. Enable the Google Books API for your project.
3. Add the API key to your `.env` file:
   ```
   GOOGLE_BOOKS_API_KEY='your_api_key_here'
   ```

## Booking a Study Area
1. Navigate to the "Booking" section in the application.
2. Select your preferred date and time for the study area.
3. Confirm your booking.

## Borrowing and Returning Books
1. Go to the "Library" section to browse available books.
2. Click on a book to borrow it. 
3. To return a book, go to your account and select the book from your borrowed list.

## Contributing
We welcome contributions! Please follow these steps:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make and co (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a Pull Request.