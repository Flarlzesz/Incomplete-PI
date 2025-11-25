# Use the official PHP image
FROM php:8.2-cli

# Set working directory inside the container
WORKDIR /app

# Copy all project files into the container
COPY . /app

# Open the port that Render will use
EXPOSE 10000

# Command to run your PHP app
CMD ["php", "-S", "0.0.0.0:10000", "-t", ".", "router.php"]
