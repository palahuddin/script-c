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

# Install PHP 7.4
RUN apt-get update && apt-get install -y apache2 php7.4
RUN apt-get install -y php-pear libapache2-mod-php7.4
RUN apt-get install -y php7.4-common php7.4-cli
RUN apt-get install -y php7.4-bz2 php7.4-zip php7.4-curl php7.4-gd php7.4-mysql php7.4-xml php7.4-dev php7.4-sqlite php7.4-mbstring php7.4-bcmath

COPY run.sh /run.sh
RUN chmod +X /run.sh

EXPOSE 80 443
CMD bash /run.sh
