# Paw-Care

Paw-Care is a pet adoption and rescue platform dedicated to connecting animals in need with loving homes. The system allows users to browse available pets, learn about their profiles, and apply for adoptions. It also supports rescue organizations by providing tools for listing animals, managing applications, and spreading awareness. Paw-Care aims to simplify the adoption process and promote responsible pet ownership while giving every animal a chance at a better life.

## Features

- **Browse Pets**: View a list of available pets for adoption with detailed profiles.
- **User Registration and Authentication**: Secure user accounts for managing adoption applications.
- **Adoption Application**: Apply to adopt a pet through a streamlined process.
- **Rescue Organization Support**: Tools for organizations to list animals and manage adoption processes.
- **Admin Panel**: Manage users, pets, and adoption applications.

## Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/rahahq/paw-care.git
   cd paw-care


2. **Set up the database**:

   - Create a MySQL database named `petcare`.
   - Import the provided SQL file to set up the necessary tables:

     mysql -u your_username -p petcare < petcare.sql


3. **Configure the application**:

   - Update the `config.php` file with your database credentials:

     <?php
      $dbHost = 'localhost';
      $dbUsername = 'your_username';
      $dbPassword = 'your_password';
      $dbName = 'petcare';
      ?>


4. **Deploy the application**:

   - Ensure your server supports PHP and has access to the configured MySQL database.
   - Place the application files in your server's web directory.
   - Access the application through your web browser.

## Usage

- **Home Page**: View featured pets and navigate through the platform.
- **User Registration/Login**: Create an account or log in to apply for adoptions.
- **Pet Listings**: Browse and search for pets available for adoption.
- **Adoption Application**: Submit an application for a pet you're interested in.
- **Admin Panel**: (For administrators) Manage users, pets, and applications.

## Contributing

We welcome contributions to enhance Paw-Care. Please follow these steps:

1. Fork the repository.
2. Create a new branch:

   git checkout -b feature-name


3. Make your changes and commit them with descriptive messages.
4. Push to your forked repository:

   git push origin feature-name


5. Open a pull request detailing your changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

