# ZENTrek

ZENTrek is a tour guide booking system built with HTML/CSS/JavaScript for the frontend and PHP + MySQL for the backend. It is designed for local deployment (XAMPP/Apache) and was developed as an academic project to demonstrate practical full‑stack concepts.

## Summary

- Browse guide profiles and bios
- Check guide availability and make bookings
- Manage bookings (view/cancel)
- Basic payment workflow structure
- Reviews and feedback stored in MySQL

## Tech stack

- Frontend: HTML5, CSS3, JavaScript
- Backend: PHP (PDO recommended)
- Database: MySQL / MariaDB

## Requirements

- PHP 7.4 or newer with PDO extension
- MySQL or MariaDB
- XAMPP or similar Apache + PHP environment

## Quick start

1. Install and run XAMPP (start Apache and MySQL).
2. Copy the project into your web root, for example:

```powershell
Copy-Item -Path . -Destination 'C:\xampp\htdocs\zentrek' -Recurse
```

3. Create a database (e.g., `zentrek`) and import the schema:

```bash
mysql -u root -p zentrek < database/zentrek.sql
```

4. Copy `config.example.php` to `config.php` and update DB credentials.
5. Open the site at: http://localhost/zentrek/

## Configuration

Use `config.example.php` as the template. The example includes PDO connection usage and recommended settings. Do not commit `config.php` with sensitive credentials.

## Contributing

Contributions are welcome. Open an issue to discuss changes, then submit a pull request from a feature branch.

## License

This project is licensed under the MIT License — see `LICENSE`.

## Contact

https://github.com/guruge0622


