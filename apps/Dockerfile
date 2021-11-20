FROM debian:10

WORKDIR /var/www/html
# Install Utilities
RUN apt update -y
RUN apt-get install -y curl unzip build-essential nano wget mcrypt

# Install ppa:ondrej/php PPA
RUN apt install -y lsb-release ca-certificates \ 
    apt-transport-https \ 
    software-properties-common \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list \
    && wget -qO - https://packages.sury.org/php/apt.gpg | apt-key add -
RUN apt-get update

# Install PHP 8
RUN apt-get update && apt-get install -y apache2 php8.0
RUN apt-get install -y php-pear libapache2-mod-php8.0
RUN apt-get install -y php8.0-common php8.0-cli
RUN apt-get install -y php8.0-bz2 php8.0-zip php8.0-curl php8.0-gd php8.0-mysql php8.0-xml php8.0-dev php8.0-sqlite php8.0-mbstring php8.0-bcmath

EXPOSE 80 443
CMD ./run.sh