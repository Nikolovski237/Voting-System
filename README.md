<a name="readme-top"></a>
<div align="center">
  <h3 align="center">Employee Appreciation Voting System</h3>
  <p align="center">
    A web application for employees to recognize and appreciate one another through voting.
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project

The **Employee Appreciation Voting System** enables employees to recognize their colleagues in specific categories, fostering a culture of appreciation and positivity. Each vote includes a mandatory comment, and employees cannot vote for themselves. The system tracks votes and provides summaries, identifying top contributors and voters.

### Built With

* **PHP**: For server-side scripting and logic.
* **MySQL**: For database management.
* **JavaScript, jQuery, AJAX**: For dynamic interactivity and asynchronous operations.
* **HTML5 and CSS3**: For structure and styling.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

Follow these instructions to set up and run the Employee Appreciation Voting System locally.

### Prerequisites

* PHP 8.0+
* MySQL
* Composer
* A local server (e.g., XAMPP, WAMP, or Laragon)
* Visual Studio Code or any code editor

### Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/Nikolovski237/Voting-System.git
2. Navigate to the project directory:
    ```sh
    cd employee-voting-system
3. Navigate to the project directory:
    ```sh
    composer install
4. Set up the database::
    ```sh
    php artisan migrate
    php artisan db:seed

## Usage

### Admin Features

#### View Results
Navigate to the "Results" page to view voting summaries for each category.

---

### User Features

#### Submit a Vote
1. Navigate to the "Vote" page.
2. Select your name as the voter.
3. Choose a colleague (nominee).
4. Select a recognition category:
   - Makes Work Fun
   - Team Player
   - Culture Champion
   - Difference Maker
5. Add a comment.
6. Submit your vote.

#### View Results
Check category winners on the "Results" page.

---

### Notes
- Employees cannot vote for themselves.

<p align="right">(<a href="#readme-top">back to top</a>)</p>
