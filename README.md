# Blog with XSS Vulnerability

This project simulates a blog with an XSS (Cross-Site Scripting) vulnerability. The blog includes a commenting feature that allows storing and displaying unfiltered HTML code. This creates an opportunity for attackers to inject malicious code into comments, which can then be displayed to other users. Within the `./db/comments.json` file, there is already a malicious comment stored, designed to steal users' cookies and send them to a "Hacker Server". The logic for the Hacker Server can be found in the `./XSSHackerServer` directory.

## Project Overview:

The project comprises two main components:

1. **Blog**: The blog displays comments and stores them in a JSON file.
2. **Hacker Server**: The server designed to receive stolen cookies and store them in a file.

## Usage:

To run the project:

1. Clone the repository.
2. Navigate to the project directory.
3. Start the blog page.
4. Interact with the blog by leaving comments and observing the XSS vulnerability.
5. Test the login functionality and observe the stolen cookies in the `./XSSHackerServer/db/cookies.json` file.

## Installation:

1. Clone the repository:
2. Use [Composer](https://getcomposer.org/) or [XAMPP](https://www.apachefriends.org/download.html) to start the blog page.

## License:

This project is licensed under the MIT License. See the [LICENSE](./LICENSE) file for more information.
