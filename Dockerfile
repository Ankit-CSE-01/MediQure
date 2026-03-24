FROM php:8.2-apache

# Use the PORT environment variable in Apache configuration files.
# Render sets this environment variable automatically.
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Enable Apache mod_rewrite in case pretty URLs are needed later
RUN a2enmod rewrite

# Copy project files into the web root
COPY . /var/www/html/
